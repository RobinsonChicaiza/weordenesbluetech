<?php

namespace App\Http\Controllers;

//use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Perfil_login;
use Illuminate\Support\Facades\Hash;

class EncripPassController extends Controller
{
  
    protected function encripPass($id)
    {    
       $datos["clave"]  = Hash::make($id);      
        
        return json_encode($datos);
    }

    protected function validaPass($pas,$id)
    {
        $correo='robinsonstalin94@gmail.com';
        $persona = Perfil_login::where('id', $id)->first();

        $datos["estado"] = false;
        //if(Hash::check($pas, $persona['password'])){
        if (Hash::check($pas, $persona['password'])) {
            $datos["estado"] = true;
        }else{
            $datos["estado"] = false;
        }   
	    return json_encode($datos);
        
        //return $res;
    }



}
