<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Impuesto;
use Illuminate\Support\Facades\Auth;


class ImpuestosController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
	}
 
    public function index(){
    	$impuestos = Impuesto::paginate(5);
        return view('impuestos.index')->with(['impuestos' => $impuestos]);
    	
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'IVA' => 'required'
    	]);

    	$articles = new Impuesto;
    	$articles->IVA = $request->input('IVA');
    	$articles->save();
    	return redirect('/impuestos')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
    	$impuestos = Impuesto::find($id);
    	return view('impuestos.actualizar')->with(['impuestos' => $impuestos]);    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'IVA' => 'required'
    	]);
    	$data = array(
			'IVA' => $request->input('IVA')
    	);
    	Impuesto::where('Id',$id)
    	->update($data);
    	return redirect('/impuestos')->with('info','Article Updated Successfully!');
    } 


    public function delete($id){
		Impuesto::where('Id',$id)
		->delete();
		return redirect('/impuestos')->with('info','Article Deleted Successfully!');
    } 
}
