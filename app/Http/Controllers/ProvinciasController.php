<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Region;
use Illuminate\Support\Facades\Auth;

class ProvinciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
	}
    
    public function index(){
        $provincias = Provincia::paginate(5);
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
    	return redirect('/provincias')->with('info','Registro agregado correctamente!');
    } 

    public function update($id){
        $provincias = Provincia::find($id);
        $region = Region::where('Id' , $provincias['Id_Region'])->first();
        $regionesAll = Region::all();
        return view('provincias.actualizar')->with(['provincias' => $provincias , 'region' => $region , 'regionesAll' => $regionesAll]);   
        //return  $departamentos;
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
            'Id_Region' => 'required',
    		'Nombre' => 'required'
    	]);
    	$data = array(
            'Id_Region' => $request->input('Id_Region'),
			'Nombre' => $request->input('Nombre')
    	);
    	Provincia::where('Id',$id)->update($data);
    	return redirect('/provincias')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
        try{

			Provincia::where('Id',$id)
			->delete();
			return redirect('/provincias')->with('info','Registro borrado correctamente!');
	
			}catch(\Illuminate\Database\QueryException $e){
		  
			return redirect('/provincias')->with('info','Error: No se puede eliminar el registro!');
				
			}
    } 

}
