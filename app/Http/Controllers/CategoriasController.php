<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Persona;
use App\Estado;
use Illuminate\Support\Facades\Auth;
use DB;

class CategoriasController extends Controller
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

            $categorias=DB::table('categorias as c')
            ->join('personas as p','c.Id_Proveedor','=','p.Id')
            ->join('estados as e','c.Id_Estado','=','e.Id')
            ->select('c.Id','c.Nombre as Categoria','c.Descripcion','p.Nombres',
                    'e.Nombre') 
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->Where('c.Id_Estado', '<>',2)
            ->orderby('c.Id','asc')
            ->groupBy('c.Id','c.Nombre','c.Descripcion','p.Nombres',
                    'e.Nombre')
            ->paginate(7);           
            // return $categorias;
            return view('categorias.index',["categorias"=>$categorias, "searchText"=>$query]);
        }
    }

    public function agregar(){

        $personas=DB::table('personas as p')   
            ->select('p.Nombres','p.Id') 
            ->where('p.Id_Rol','=',4)  
            ->get();
        $estados = Estado::all();

        return view('categorias.agregar')->with(['person' => $personas, 'estad' => $estados]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Id_Proveedor' => 'required',
            'Id_Estado' => 'required'
    	]);

        $articles = new Categoria;
        
        $articles->Nombre = $request->input('Nombre');
        $articles->Descripcion = $request->input('Descripcion');
        $articles->Id_Proveedor = $request->input('Id_Proveedor');
        $articles->Id_Estado = $request->input('Id_Estado');
    	$articles->save();
    	return redirect('/categorias')->with('info','Registro agregado correctamente!');
    } 

    public function update($id){
        

        $categorias = Categoria::find($id);
        $persona = Persona::where('Id' , $categorias['Id_Proveedor'])->first();
        $personasAll=DB::table('personas as p')   
        ->select('p.Nombres','p.Id') 
        ->where('p.Id_Rol','=',4)  
        ->get();
        $estado = Estado::where('Id' , $categorias['Id_Estado'])->first();
        $estadosAll = Estado::all();
        return view('categorias.actualizar')->with(['categorias' => $categorias , 'persona' => $persona , 'personasAll' => $personasAll, 'estado' => $estado , 'estadosAll' => $estadosAll]);   
        
    }

    public function edit(Request $request, $id){
    	$this->validate($request,[
            
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Id_Proveedor' => 'required',
            'Id_Estado' => 'required'
    	]);
    	$data = array(
            
			'Nombre' => $request->input('Nombre'),
            'Descripcion' => $request->input('Descripcion'),
            'Id_Proveedor' => $request->input('Id_Proveedor'),
            'Id_Estado' => $request->input('Id_Estado')
    	);
    	Categoria::where('Id',$id)->update($data);
    	return redirect('/categorias')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
        try{

			Categoria::where('Id',$id)
		    ->delete();
			return redirect('/categorias')->with('info','Registro borrado correctamente!');
	
			}catch(\Illuminate\Database\QueryException $e){
		  
			return redirect('/categorias')->with('info','Error: No se puede eliminar el registro!');
				
			}
    } 

}
