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
        $pass = Hash::make($id);      
        
        return $pass;
    }

    protected function validaPass($id)
    {    
        //$pasEncr='$2y$10$aqO3b5Jh4VGWqcs64lc2XuYUpToy8IqNtxaCge2rLisY3uiWoe6fy';
        $correo='robinsonstalin94@gmail.com';
        $persona = Perfil_login::where('Correo', $correo)->first();

        $res=false;
        if(Hash::check($id,$persona['password'])){
            $res=true;
        }else{
            $res=false;
        }
                
        return $res;
    }


}
