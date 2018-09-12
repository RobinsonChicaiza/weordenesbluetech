<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipomarca;


class TiposmarcasController extends Controller
{
    //
    public function index(){
    	$tiposmarcas = Tipomarca::all();
        return view('tiposmarcas.index')->with(['tiposmarcas' => $tiposmarcas]);
    	
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Tipomarca;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/tiposmarcas')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
    	$tiposmarcas = Tipomarca::find($id);
    	return view('tiposmarcas.actualizar')->with(['tiposmarcas' => $tiposmarcas]);    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);
    	$data = array(
			'Nombre' => $request->input('Nombre')
    	);
    	Tipomarca::where('Id',$id)
    	->update($data);
    	return redirect('/tiposmarcas')->with('info','Article Updated Successfully!');
    } 


    public function delete($id){
		Tipomarca::where('Id',$id)
		->delete();
		return redirect('/tiposmarcas')->with('info','Article Deleted Successfully!');
    } 
}