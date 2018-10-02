<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Persona;
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

        return view('home')->with(['persona' => $persona]);
        //return $persona;
    }
}
