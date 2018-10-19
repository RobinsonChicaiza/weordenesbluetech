<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Orden;
use App\DetalleOrden;
use App\Producto;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use App\Persona;



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
            ->join('personas as p','o.Id_Cliente','=','p.id')
            ->join('detalleOrdenes as do','o.Id','=','do.Id_Orden')
            ->join('estados as e','o.Id_Estado','=','e.Id')
            ->select('o.Id','o.N_Orden','p.Nombres','o.Fecha_Inicio',
                    'o.Fecha_Finalizacion','e.Nombre','o.Precio_Total') 
            ->where('o.N_Orden','LIKE','%'.$query.'%')
            ->orderby('o.Id','desc')
            ->groupBy('o.Id','o.N_Orden','p.Nombres','o.Fecha_Inicio',
                        'o.Fecha_Finalizacion','e.Nombre','o.Precio_Total')
            ->paginate(7);           

            return view('ordenes.index',["ordenes"=>$ordenes, "searchText"=>$query]);
        }
        
    }

    public function create(){
        $productos=DB::table('productos as pr')     
            ->select(DB::raw('CONCAT(pr.Id," ",pr.Nombre) AS Nombre'),'pr.Id') 
            ->where('pr.Id_Estado','=',1)            
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
        $arrayOrden1 = Orden::select('Id')->orderby('created_at','DESC')->first();
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
            $orden=new Orden();
            $orden->N_Orden=$Norden;
            $orden->Id_Cliente=$id;
            $orden->Id_Estado=5;
            $orden->Fecha_Inicio=$miFecha->toDateTimeString();
            $orden->Fecha_Finalizacion=$miFecha->toDateTimeString();           
            $orden->Fecha_Servidor=$miFecha->toDateTimeString();
            //$orden->Precio_Total=$request->input('Precio_Total');
            $idOr = DB::table('ordenes')->insertGetId([
                'N_Orden' => $Norden,
                'Id_Cliente' => $id,
                'Id_Estado' => 5,
                'Fecha_Inicio' => $miFecha->toDateTimeString(),
                'Fecha_Finalizacion' => $miFecha->toDateTimeString(),
                'Fecha_Servidor' => $miFecha->toDateTimeString(),
            ]);
   
            $idProucto=$request->input('idproducto');
            $cantidad=$request->input('cantidad');
            $precio=$request->input('precio');
            //$subTotal=$request->input('SubTotal');

            $cont = 0;

            while($cont < count($idProucto)){
                $detalle=new DetalleOrden();
                $detalle->Id_Producto=$idProucto[$cont];
                $detalle->Id_Orden=$idOr;
                $detalle->Cantidad=$cantidad[$cont];
                $detalle->PVP=$precio[$cont];
                $detalle->SubTotal=$cantidad[$cont]*$precio[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch(\Exeption $e){
            DB::rollback();
        }

        return redirect('ordenes');
    }
   
    public function show(){
        
    }

    
    
}
