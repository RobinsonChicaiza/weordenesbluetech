<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Cooperativa;
use App\Marca;
use Illuminate\Support\Facades\Auth;

class BusesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function index(){
        $buses = Bus::all();
        $cooperativas = Cooperativa::all();
        $marcas = Marca::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($buses); $i++)
        {
          for($j = 0 ; $j < sizeof($cooperativas); $j++){
            if( $buses[$i]['Id_Cooperativa'] ==  $cooperativas[$j]['Id']){
                $buses[$i] ['Id_Cooperativa'] = $cooperativas [$j]['Nombre'];
            }
          }

          for($k = 0 ; $k < sizeof($marcas); $k++){
            if( $buses[$i]['Id_Marca'] ==  $marcas[$k]['Id']){
                $buses[$i] ['Id_Marca'] = $marcas [$k]['Nombre'];
            }
          }

        }
		return view('buses.index')->with(['buses' => $buses]);
        
    }

    public function agregar(){
        $cooperativas = Cooperativa::all();
        $marcas = Marca::all();

        return view('buses.agregar')->with(['cooperativ' => $cooperativas, 'marc' => $marcas]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Cooperativa' => 'required',
            'Placa' => 'required',
            'Serie_Chasis' => 'required',
            'Anio' => 'required',
            'N_Disco' => 'required',
            'Id_Marca' => 'required'
    	]);

        $articles = new Bus;
        $articles->Id_Cooperativa = $request->input('Id_Cooperativa');
        $articles->Placa = $request->input('Placa');
        $articles->Serie_Chasis = $request->input('Serie_Chasis');
        $articles->Anio = $request->input('Anio');
        $articles->N_Disco = $request->input('N_Disco');
        $articles->Id_Marca = $request->input('Id_Marca');
    	$articles->save();
    	return redirect('/buses')->with('info','Article Saved Successfully!');
    } 


    public function delete($id){
		Bus::where('Id',$id)
		->delete();
		return redirect('/buses')->with('info','Article Deleted Successfully!');
    } 

}
