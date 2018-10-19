<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use Illuminate\Support\Facades\Auth;


class EstadosController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
	}
 
    public function index(){
    	$estados = Estado::paginate(5);
        return view('estados.index')->with(['estados' => $estados]);
    	
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Estado;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/estados')->with('info','Registro agregado correctamente!');
    } 

    public function update($id){
    	$estados = Estado::find($id);
    	return view('estados.actualizar')->with(['estados' => $estados]);    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);
    	$data = array(
			'Nombre' => $request->input('Nombre')
    	);
    	Estado::where('Id',$id)
    	->update($data);
    	return redirect('/estados')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
		try{

			Estado::where('Id',$id)
			->delete();
			return redirect('/estados')->with('info','Registro borrado correctamente!');
	
			}catch(\Illuminate\Database\QueryException $e){
		  
			return redirect('/estados')->with('info','Error: No se puede eliminar el registro!');
				
			}
    } 
}
