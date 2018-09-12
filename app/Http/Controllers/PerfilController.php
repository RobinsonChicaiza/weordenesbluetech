<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;


class PerfilController extends Controller
{
   
    public function index($id)
    {
        //$correo=new AuthenticatesUsers();
        $persona = Persona::find($id);

        return view('perfil')->with(['persona' => $persona]);
    }
}
