<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Perfil_login;
use App\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nombres' => 'required|string|max:255',
            'Ci' => 'required|string|max:10',
            'Ruc' => 'required|string|max:13',
            'Telefono' => 'required|string|max:10',
            'Correo' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {    
        $persona = Persona::create([
            'Nombres' => $data['Nombres'],
            'Ci' => $data['Ci'],
            'Ruc' => $data['Ruc'],
            'Telefono' => $data['Telefono'],
            'Correo' => $data['Correo'],
        ]);

        $arrayPersona = Persona::select('Id')->orderby('created_at','DESC')->first();
        $idPersona=$arrayPersona['Id'];
        
        return Perfil_login::create([
            'Nombres' => $data['Nombres'],
            'Correo' => $data['Correo'],
            'Id_Persona' => $idPersona,
            'password' => Hash::make($data['password']),
            //'password' => md5(sha1($data['password'])),
        ]);
    }  


}
