<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Persona;
use App\Estado;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function index(){
        $categorias = Categoria::all();
        $personas = Persona::all();
        $estados = Estado::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($categorias); $i++)
        {
          for($j = 0 ; $j < sizeof($personas); $j++){
            if( $categorias[$i]['Id_Proveedor'] ==  $personas[$j]['Id']){
                $categorias[$i] ['Id_Proveedor'] = $personas [$j]['Apellidos'].' '.$personas [$j]['Nombres'];
            } 
          }
          

          for($k = 0 ; $k < sizeof($estados); $k++){
            if( $categorias[$i]['Id_Estado'] ==  $estados[$k]['Id']){
                $categorias[$i] ['Id_Estado'] = $estados [$k]['Nombre'];
            }
          }

        }
		return view('categorias.index')->with(['categorias' => $categorias]);
        
    }

    public function agregar(){
        $personas = Persona::all();
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
    	return redirect('/categorias')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
        

        $categorias = Categoria::find($id);
        $persona = Persona::where('Id' , $categorias['Id_Proveedor'])->first();
        $personasAll = Persona::all();
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
    	return redirect('/categorias')->with('info','El dato fue actualizado correctamente!');
    } 


    public function delete($id){
		Categoria::where('Id',$id)
		->delete();
		return redirect('/categorias')->with('info','Article Deleted Successfully!');
    } 

}
