<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Canton;
use App\Provincia;

class CantonesController extends Controller
{
 
    public function index(){
        $cantones = Canton::all();
        $provincias = Provincia::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($cantones); $i++)
        {
          for($j = 0 ; $j < sizeof($provincias); $j++){
            if( $cantones[$i]['Id_Provincia'] ==  $provincias[$j]['Id']){
                $cantones[$i] ['Id_Provincia'] = $provincias [$j]['Nombre'];
            }
          }
        }
		return view('cantones.index')->with(['cantones' => $cantones]);
        
    }

    public function agregar(){
        $provincias = Provincia::all();

        return view('cantones.agregar')->with(['canto' => $provincias]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Provincia' => 'required',
            'Nombre' => 'required'
    	]);

        $articles = new Canton;
        $articles->Id_Provincia = $request->input('Id_Provincia');
        $articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/cantones')->with('info','Article Saved Successfully!');
    } 


    public function delete($id){
		Canton::where('Id',$id)
		->delete();
		return redirect('/cantones')->with('info','Article Deleted Successfully!');
    } 

}