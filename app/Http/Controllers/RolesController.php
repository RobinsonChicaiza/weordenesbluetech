<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Departamento;

class RolesController extends Controller
{
    public function index(){
        $roles = Rol::all();
        $departamentos = Departamento::all();
        $array1 = null;  
     
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

}
