<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistroBus;
use App\Cooperativa;
use App\Marca;
use App\Persona;
use App\Bus;
use Illuminate\Support\Facades\Auth;

class RegistroBusesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function index(){
        $registrobuses = RegistroBus::all();
        $personas = Persona::all();
        $buses = Bus::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($registrobuses); $i++)
        {
          for($j = 0 ; $j < sizeof($personas); $j++){
            if( $registrobuses[$i]['Id_Persona'] ==  $personas[$j]['Id']){
                $registrobuses[$i] ['Id_Persona'] = $personas [$j]['Ci'];
            }
          }

          for($k = 0 ; $k < sizeof($buses); $k++){
            if( $registrobuses[$i]['Id_Bus'] ==  $buses[$k]['Id']){
                $registrobuses[$i] ['Id_Bus'] = $buses [$k]['Placa'];
            }
          }

        }
		return view('registrobuses.index')->with(['registrobuses' => $registrobuses]);
        
    }

    public function agregar(){
        $personas = Persona::all();
        $buses = Bus::all();

        return view('registrobuses.agregar')->with(['person' => $personas, 'buse' => $buses]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Persona' => 'required',
            'Id_Bus' => 'required',
            'Fecha_Servidor' => 'required'
    	]);

        $articles = new RegistroBus;
        $articles->Id_Persona = $request->input('Id_Persona');
        $articles->Id_Bus = $request->input('Id_Bus');
        $articles->Fecha_Servidor = $request->input('Fecha_Servidor');
    	$articles->save();
    	return redirect('/registrobuses')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
        $registrobuses = RegistroBus::find($id);
        $persona = Persona::where('Id' , $registrobuses['Id_Persona'])->first();
        $personasAll = Persona::all();
        $bus = Bus::where('Id' , $registrobuses['Id_Bus'])->first();
        $busesAll = Bus::all();
        return view('registrobuses.actualizar')->with(['registrobuses' => $registrobuses , 'persona' => $persona , 'personasAll' => $personasAll, 'bus' => $bus , 'busesAll' => $busesAll]);   
        
    }

    public function edit(Request $request, $id){
    	$this->validate($request,[
            'Id_Persona' => 'required',
            'Id_Bus' => 'required',
            'Fecha_Servidor' => 'required'
    	]);
    	$data = array(
            'Id_Persona' => $request->input('Id_Persona'),
			'Id_Bus' => $request->input('Id_Bus'),
            'Fecha_Servidor' => $request->input('Fecha_Servidor')
    	);
    	RegistroBus::where('Id',$id)->update($data);
    	return redirect('/registrobuses')->with('info','El dato fue actualizado correctamente!');
    } 

    public function delete($id){
		RegistroBus::where('Id',$id)
		->delete();
		return redirect('/registrobuses')->with('info','Article Deleted Successfully!');
    } 

}
