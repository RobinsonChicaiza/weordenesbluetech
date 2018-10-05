<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Persona;
use App\Perfil_login;
use Cookie;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $correo = Cookie::get('Cookie1');
   
        $persona = Persona::where('Correo', $correo)->first();
        $imagen = Perfil_login::where('Id_Persona', $persona['Id'])->first();

        $referencia1 = Persona::where('Id', $persona['Id_Referencia1'])->first();
        $referencia2 = Persona::where('Id', $persona['Id_Referencia2'])->first();
        
        $image = $imagen['imagen'];
      
        return view('home')->with(['persona' => $persona, 'image'=>$image, 'referencia1' => $referencia1, 'referencia2' => $referencia2]);
        //return $correo;
    }
}
