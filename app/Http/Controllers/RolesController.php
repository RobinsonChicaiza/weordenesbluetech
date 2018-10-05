<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Departamento;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function index(){
        $roles = Rol::all();
        $departamentos = Departamento::all();
       
        for($i = 0 ; $i < sizeof($roles); $i++)
        {
          for($j = 0 ; $j < sizeof($departamentos); $j++){
            if( $roles[$i]['Id_Departamento'] ==  $departamentos[$j]['Id']){
                $roles[$i] ['Id_Departamento'] = $departamentos [$j]['Nombre'];
            }
          }
        }
		return view('roles.index')->with(['roles' => $roles]);

        //return $roles;
        
    }

    public function agregar(){
        $departamentos = Departamento::all();

        return view('roles.agregar')->with(['departament' => $departamentos]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Departamento' => 'required',
            'Nombre' => 'required',
            'Sueldo' => 'required'
    	]);

        $articles = new Rol;
        $articles->Id_Departamento = $request->input('Id_Departamento');
        $articles->Nombre = $request->input('Nombre');
        $articles->Sueldo = $request->input('Sueldo');
    	$articles->save();
    	return redirect('/roles')->with('info','Article Saved Successfully!');
    } 

    public function addD(Request $request){
    	$this->validate($request,[
    		'Nombre' => 'required'
    	]);

    	$articles = new Departamento;
    	$articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/departamentos')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
        $roles = Rol::find($id);
        $departamento = Departamento::where('Id' , $roles['Id_Departamento'])->first();
        $departamentosAll = Departamento::all();
        return view('roles.actualizar')->with(['roles' => $roles , 'departamento' => $departamento , 'departamentosAll' => $departamentosAll]);   
        //return  $departamentos;
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
            'Id_Departamento' => 'required',
    		'Nombre' => 'required',
    		'Sueldo' => 'required'
    	]);
    	$data = array(
            'Id_Departamento' => $request->input('Id_Departamento'),
			'Nombre' => $request->input('Nombre'),
    		'Sueldo' => $request->input('Sueldo')
    	);
    	Rol::where('Id',$id)->update($data);
    	return redirect('/roles')->with('info','El dato fue actualizado correctamente!');
    } 

    public function delete($id){
		Rol::where('Id',$id)
		->delete();
		return redirect('/roles')->with('info','Article Deleted Successfully!');
    } 

}
