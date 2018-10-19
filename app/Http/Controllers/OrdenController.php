<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Orden;
use App\DetalleOrden;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class OrdenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
	}
 
    public function index(Request $request){
        
        if($request){
            //Borar espacios tanto al inicio como al final
            $query=trim($request->get('searchText')); 

            // Consulta a la base de datos y uso de join para el detalle de la orden

            $ordenes=DB::table('ordenes as o')
            ->join('personas as p','o.Id_Cliente','=','p.Id')
            ->join('detalleOrdenes as do','o.Id','=','do.Id_Orden')
            ->join('estados as e','o.Id_Estado','=','e.Id')
            ->select('o.Id','o.N_Orden','p.Nombres','o.Fecha_Inicio',
                    'o.Fecha_Finalizacion','e.Nombre','o.Precio_Total') 
            ->where('o.N_Orden','LIKE','%'.$query.'%')
            ->Where('o.Id_Estado', '<>',2)
            ->orderby('o.Id','asc')
            ->groupBy('o.Id','o.N_Orden','p.Nombres','o.Fecha_Inicio',
                        'o.Fecha_Finalizacion','e.Nombre','o.Precio_Total')
            ->paginate(7);           

            return view('ordenes.index',["ordenes"=>$ordenes, "searchText"=>$query]);
        }
        
    }

    public function create(){
        $productos=DB::table('productos as pr')   
            ->join('impuestos as i','pr.Id_Impuestos','=','i.Id')  
            ->select(DB::raw('CONCAT(pr.Id," ",pr.Nombre) AS Nombre'),'pr.Id','pr.Precio','i.IVA') 
            ->where('pr.Id_Estado','=',1)  
            ->groupBy('Nombre','pr.Id','pr.Precio','i.IVA')          
            ->get();
            
            $id=Auth::user()->Id_Persona;  
            $libros = DB::table('personas')
            ->select(['Id','Nombres','Ci','Telefono'])
            ->where('Id','=',$id)
            ->get();
            $persona=json_decode( json_encode( $libros ), true );
           
            return view('ordenes.create',["productos"=>$productos, "persona"=>$persona]);
    }

    public function store(Request $request){
        
        $Norden=null;
        $arrayOrden1 = Orden::select('Id')->orderby('Id','DESC')->first();
        $idOrden1=$arrayOrden1['Id'];
        if(empty($idOrden1)){            
            $Norden='000-1';
        }else{
        $Norden='000-'.($idOrden1+1);
        }
        $id=Auth::user()->Id_Persona;

        try{     
            $miFecha=Carbon::now('America/Guayaquil');
            DB::beginTransaction();           
            
            $idOr = DB::table('ordenes')->insertGetId([
                'N_Orden' => $Norden,
                'Id_Cliente' => $id,
                'Id_Estado' => 5,
                'Fecha_Inicio' => $miFecha->toDateTimeString(),
                'Fecha_Finalizacion' => $miFecha->toDateTimeString(),
                'Fecha_Servidor' => $miFecha->toDateTimeString(),
                'Precio_Total' => $request->input('totalEn'),
                'IVA' => $request->input('ivaT'),
            ]);
   
            $idProucto=$request->input('idproducto');
            $cantidad=$request->input('cantidad');
            $precio=$request->input('precio');
            $iva=$request->input('iva');           


            $cont = 0;

            while($cont < count($idProucto)){
                $detalle=new DetalleOrden();
                $detalle->Id_Producto=$idProucto[$cont];
                $detalle->Id_Orden=$idOr;
                $detalle->Cantidad=$cantidad[$cont];
                $detalle->PVP=$precio[$cont];
                $detalle->SubTotal=$cantidad[$cont]*$precio[$cont];
                $detalle->ValorIva=$iva[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch(\Exeption $e){
            DB::rollback();
        }

        return redirect('ordenes');
    }
   
    public function show($id){

        $ordenes=DB::table('ordenes as o')
        ->join('personas as p','o.Id_Cliente','=','p.Id')               
        ->select('p.Nombres','p.Ci','p.Telefono','o.Precio_Total','o.IVA') 
        ->where('o.Id','=',$id)        
        // ->groupBy('p.Nombres','p.Ci','p.Telefono','o.Precio_Total','o.IVA')
        ->first(); 
        
        $detalle=DB::table('detalleordenes as de')
        ->join('productos as p','de.Id_Producto','=','p.Id')               
        ->select('p.Nombre','de.Cantidad','de.PVP','de.ValorIva','de.SubTotal') 
        ->where('de.Id_Orden','=',$id)              
        // ->groupBy('p.Nombre','de.Cantidad','de.Precio','de.ValorIva','de.SubTotal')
        ->get(); 
        $subT=null;       
        foreach($detalle->all() as $dato){
          $subT=$subT+$dato->SubTotal;
        }
        return view('ordenes.show',["ordenes"=>$ordenes, "detalle"=>$detalle, "subT"=>$subT]);

    }

    public function destroy($id){
      
        $data = array(
			'Id_Estado' => 2    		
    	);
        Orden::where('Id',$id)->update($data);

        return redirect('ordenes');
    }

    
    
}