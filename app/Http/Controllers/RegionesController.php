<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;


class RegionesController extends Controller
{
 
    public function index(){
    	$Regiones = Region::all();
        return view('Regiones.index')->with(['Regiones' => $Regiones]);
    	
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Region;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/Regiones')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
    	$Regiones = Region::find($id);
    	return view('Regiones.actualizar')->with(['Regiones' => $Regiones]);    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);
    	$data = array(
			'Nombre' => $request->input('Nombre')
    	);
    	Region::where('Id',$id)
    	->update($data);
    	return redirect('/Regiones')->with('info','Article Updated Successfully!');
    } 


    public function delete($id){
		Region::where('Id',$id)
		->delete();
		return redirect('/Regiones')->with('info','Article Deleted Successfully!');
    } 
}
