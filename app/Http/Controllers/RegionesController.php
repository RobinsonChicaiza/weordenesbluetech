<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Illuminate\Support\Facades\Auth;


class RegionesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
	}
 
    public function index(){
    	$regiones = Region::paginate(5);
        return view('regiones.index')->with(['regiones' => $regiones]);
    	
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Region;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/regiones')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
    	$regiones = Region::find($id);
    	return view('regiones.actualizar')->with(['regiones' => $regiones]);    	
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
    	return redirect('/regiones')->with('info','Article Updated Successfully!');
    } 


    public function delete($id){
		Region::where('Id',$id)
		->delete();
		return redirect('/regiones')->with('info','Article Deleted Successfully!');
    } 
}
