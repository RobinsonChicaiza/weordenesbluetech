<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\TipoMarca;

class MarcasController extends Controller
{
 
    public function index(){
        $marcas = Marca::all();
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
    	return redirect('/marcas')->with('info','Article Saved Successfully!');
    } 


    public function delete($id){
		Marca::where('Id',$id)
		->delete();
		return redirect('/marcas')->with('info','Article Deleted Successfully!');
    } 

}
