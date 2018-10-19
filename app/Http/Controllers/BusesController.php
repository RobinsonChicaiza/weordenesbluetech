<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Cooperativa;
use App\Marca;
use App\TipoMarca;
use Illuminate\Support\Facades\Auth;

class BusesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function index(){
        $buses = Bus::paginate(5);
        $cooperativas = Cooperativa::all();
        $marcas = Marca::all();
        $tiposmarcas = TipoMarca::all();
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

          for($j = 0 ; $j < sizeof($tiposmarcas); $j++){
            if( $marcas[$i]['Id_Tipo'] ==  $tiposmarcas[$j]['Id']){
                $marcas[$i] ['Id_Tipo'] = $tiposmarcas [$j]['Nombre'];
            }
          }

        }
		return view('buses.index')->with(['buses' => $buses]);
        
    }

    public function agregar(){
        $cooperativas = Cooperativa::all();
        $marcas = Marca::all();
        $tiposmarcas = TipoMarca::all();

        return view('buses.agregar')->with(['cooperativ' => $cooperativas, 'marc' => $marcas, 'tipmar' => $tiposmarcas]);
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
    	return redirect('/buses')->with('info','Registro agregado correctamente!');
    }
    
    
    public function addCooperativaBus(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required',
    		'Ruc' => 'required'
    	]);

    	$articles = new Cooperativa;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->Ruc = $request->input('Ruc');
    	$articles->save();
    	return redirect('/agregarB')->with('info','Registro agregado correctamente!');
    } 

    public function addMarcaBus(Request $request){
    	$this->validate($request,[
            'Id_Tipo' => 'required',
            'Nombre' => 'required'
    	]);

        $articles = new Marca;
        $articles->Id_Tipo = $request->input('Id_Tipo');
        $articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/agregarB')->with('info','Registro agregado correctamente!');
    }

    public function update($id){
        $buses = Bus::find($id);
        $cooperativa = Cooperativa::where('Id' , $buses['Id_Cooperativa'])->first();
        $cooperativasAll = Cooperativa::all();
        $marca = Marca::where('Id' , $buses['Id_Marca'])->first();
        $marcasAll = Marca::all();
        return view('buses.actualizar')->with(['buses' => $buses , 'cooperativa' => $cooperativa , 'cooperativasAll' => $cooperativasAll, 'marca' => $marca , 'marcasAll' => $marcasAll]);   
        
    }

    public function edit(Request $request, $id){
    	$this->validate($request,[
            'Id_Cooperativa' => 'required',
            'Placa' => 'required',
            'Serie_Chasis' => 'required',
            'Anio' => 'required',
            'N_Disco' => 'required',
            'Id_Marca' => 'required'
    	]);
    	$data = array(
            'Id_Cooperativa' => $request->input('Id_Cooperativa'),
			'Placa' => $request->input('Placa'),
            'Serie_Chasis' => $request->input('Serie_Chasis'),
            'Anio' => $request->input('Anio'),
            'N_Disco' => $request->input('N_Disco'),
            'Id_Marca' => $request->input('Id_Marca')
    	);
    	Bus::where('Id',$id)->update($data);
    	return redirect('/buses')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
        try{

			Bus::where('Id',$id)
		    ->delete();
			return redirect('/buses')->with('info','Registro borrado correctamente!');
	
			}catch(\Illuminate\Database\QueryException $e){
		  
			return redirect('/buses')->with('info','Error: No se puede eliminar el registro!');
				
			}
    } 

}
