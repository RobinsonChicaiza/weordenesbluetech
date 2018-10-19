<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Cooperativa;

class CooperativasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
    public function index(){
    	$cooperativas = Cooperativa::paginate(5);
		return view('cooperativas.index')->with(['cooperativas' => $cooperativas]);
    	
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required',
    		'Ruc' => 'required'
    	]);

    	$articles = new Cooperativa;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->Ruc = $request->input('Ruc');
    	$articles->save();
    	return redirect('/cooperativas')->with('info','Registro agregado correctamente!');
    } 

    public function update($id){
    	$cooperativas = Cooperativa::find($id);
    	return view('cooperativas.actualizar')->with(['cooperativas' => $cooperativas]);    	
	} 
	
	public function pass($id){
    	$cooperativas =  Hash::make($id); ;
    	return $cooperativas;    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'Nombre' => 'required',
    		'Ruc' => 'required'
    	]);
    	$data = array(
			'Nombre' => $request->input('Nombre'),
    		'Ruc' => $request->input('Ruc')
    	);
    	Cooperativa::where('Id',$id)->update($data);
    	return redirect('/cooperativas')->with('info','Registro actualizado correctamente!');
    } 


    public function delete($id){
		Cooperativa::where('Id',$id)
		->delete();
		return redirect('/cooperativas')->with('info','Registro borrado correctamente!');
		
    } 
}
