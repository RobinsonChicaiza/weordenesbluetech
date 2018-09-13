<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Region;

class ProvinciasController extends Controller
{
 
    public function index(){
        $provincias = Provincia::all();
        $regiones = Region::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($provincias); $i++)
        {
          for($j = 0 ; $j < sizeof($regiones); $j++){
            if( $provincias[$i]['Id_Region'] ==  $regiones[$j]['Id']){
                $provincias[$i] ['Id_Region'] = $regiones [$j]['Nombre'];
            }
          }
        }
		return view('provincias.index')->with(['provincias' => $provincias]);
        
    }

    public function agregar(){
        $regiones = Region::all();

        return view('provincias.agregar')->with(['regi' => $regiones]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Region' => 'required',
            'Nombre' => 'required'
    	]);

        $articles = new Provincia;
        $articles->Id_Region = $request->input('Id_Region');
        $articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/provincias')->with('info','Article Saved Successfully!');
    } 


    public function delete($id){
		Provincia::where('Id',$id)
		->delete();
		return redirect('/provincias')->with('info','Article Deleted Successfully!');
    } 

}
