<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\TipoMarca;
use Illuminate\Support\Facades\Auth;

class MarcasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
	}
 
    public function index(){
        $marcas = Marca::paginate(5);
        $tiposmarcas = TipoMarca::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($marcas); $i++)
        {
          for($j = 0 ; $j < sizeof($tiposmarcas); $j++){
            if( $marcas[$i]['Id_Tipo'] ==  $tiposmarcas[$j]['Id']){
                $marcas[$i] ['Id_Tipo'] = $tiposmarcas [$j]['Nombre'];
            }
          }
        }
		return view('marcas.index')->with(['marcas' => $marcas]);
        
    }

    public function agregar(){
        $tiposmarcas = TipoMarca::all();

        return view('marcas.agregar')->with(['tipmar' => $tiposmarcas]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Tipo' => 'required',
            'Nombre' => 'required'
    	]);

        $articles = new Marca;
        $articles->Id_Tipo = $request->input('Id_Tipo');
        $articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/marcas')->with('info','Registro agregado correctamente!');
    } 

    public function addTipoMarcas(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Tipomarca;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/agregarMa')->with('info','Registro agregado correctamente!');
    } 


    public function update($id){
        $marcas = Marca::find($id);
        $tiposmarcas = TipoMarca::where('Id' , $marcas['Id_Tipo'])->first();
        $tiposmarcasAll = TipoMarca::all();
        return view('marcas.actualizar')->with(['marcas' => $marcas , 'tiposmarcas' => $tiposmarcas , 'tiposmarcasAll' => $tiposmarcasAll]);   
        //return  $departamentos;
    }


    public function edit(Request $request, $id){
    	$this->validate($request,[
            'Id_Tipo' => 'required',
    		'Nombre' => 'required'
    	]);
    	$data = array(
            'Id_Tipo' => $request->input('Id_Tipo'),
			'Nombre' => $request->input('Nombre')
    	);
    	Marca::where('Id',$id)->update($data);
    	return redirect('/marcas')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
        try{

			Marca::where('Id',$id)
		    ->delete();
			return redirect('/marcas')->with('info','Registro borrado correctamente!');
	
			}catch(\Illuminate\Database\QueryException $e){
		  
			return redirect('/marcas')->with('info','Error: No se puede eliminar el registro!');
				
			}
    } 

}
