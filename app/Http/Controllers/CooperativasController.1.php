<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cooperativa;

class CooperativasController extends Controller
{
    public function index(){
    	$cooperativas = Cooperativa::all();
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
    	return redirect('/cooperativas')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
    	$cooperativas = Cooperativa::find($id);
    	return view('cooperativas.actualizar')->with(['cooperativas' => $cooperativas]);    	
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
    	Cooperativa::where('Id',$id)
    	->update($data);
    	return redirect('/cooperativas')->with('info','Article Updated Successfully!');
    } 


    public function delete($id){
		Cooperativa::where('Id',$id)
		->delete();
		return redirect('/cooperativas')->with('info','Article Deleted Successfully!');
    } 
}
