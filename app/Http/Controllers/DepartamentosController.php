<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use Illuminate\Support\Facades\Auth;


class DepartamentosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
 
    public function index(){
    	$departamentos = Departamento::paginate(5);
        return view('departamentos.index')->with(['departamentos' => $departamentos]);
    	
	}

    public function add(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Departamento;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/departamentos')->with('info','Registro agregado correctamente!');
    } 

    public function update($id){
    	$departamentos = Departamento::find($id);
    	return view('departamentos.actualizar')->with(['departamentos' => $departamentos]);    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);
    	$data = array(
			'Nombre' => $request->input('Nombre')
    	);
    	Departamento::where('Id',$id)
    	->update($data);
    	return redirect('/departamentos')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
		try{

			Departamento::where('Id',$id)
			->delete();
			return redirect('/departamentos')->with('info','Registro borrado correctamente!');
	
			}catch(\Illuminate\Database\QueryException $e){
		  
			return redirect('/departamentos')->with('info','Error: No se puede eliminar el registro!');
				
			}
    } 
}
