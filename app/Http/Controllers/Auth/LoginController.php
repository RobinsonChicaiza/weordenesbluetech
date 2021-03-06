<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\Perfil_login;
use App\Persona;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

   
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = Perfil_login::where('Id_Perfil',  $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        $persona = Persona::create([
            'Nombres' => $user->name,            
            'Correo' => $user->email,
        ]);

        $arrayPersona = Persona::select('Id')->orderby('created_at','DESC')->first();
        $idPersona=$arrayPersona['Id'];

        return Perfil_login::create([
            'Nombres'     => $user->name,
            'Correo'    => $user->email,
            'Url_Foto'    => $user->avatar,
            'Id_Persona' => $idPersona,
            'provider' => $provider,
            'Id_Perfil' => $user->id
        ]);
    }
}
