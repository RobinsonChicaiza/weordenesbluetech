<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Cooperativa;
use App\Marca;

class BusesController extends Controller
{
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

}
