<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TiposMarca;
class MarcaController extends Controller
{
    public function todoDepartamentos(){
    	$tipMar = TiposMarca::all();
		return view('marcas.agregar')->with(['tipMar' => $tipMar]);
    	
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
}
