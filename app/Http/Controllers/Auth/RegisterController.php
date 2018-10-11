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
            'Ci' => 'required|string|max:10|min:10',
            'Ruc' => 'required|string|max:13|min:13',
            'Telefono' => 'required|string|max:10|min:10',
            'Id_Canton' => 'required|string|max:255',
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
            'Id_Canton' => $data['Id_Canton'],
            'Id_Estado' => 1,
            'Correo' => $data['Correo'],
        ]);

        

        $arrayPersona = Persona::select('Id')->orderby('created_at','DESC')->first();
        $idPersona=$arrayPersona['Id'];
        
        return Perfil_login::create([
            'Nombres' => $data['Nombres'],
            'Correo' => $data['Correo'],
            'Id_Persona' => $idPersona,
            'password' => Hash::make($data['password']),            
        ]);
    }  

    //Validacion Cedula**************************************************
    public function validarCedula($numero)
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;
        // borro por si acaso errores de llamadas anteriores.
        $this->setError('');
        // validaciones
        try {
            //$this->validarInicial($numero, '10');
            $m=$this->validarCodigoProvincia(substr($numero, 0, 2));          
            $m=$this->validarTercerDigito($numero[2], 'cedula');
            $m=$this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
            return $m;
        } catch (Exception $e) {
			$this->setError($e->getMessage());
			//return redirect('/home')->with('info','Referencia agregada correctamente.');
           return false;
        }
		return true;
    }

	public function validarRucPersonaNatural($numero)
    {
        // fuerzo parametro de entrada a string
        $numero = (string)$numero;
        // borro por si acaso errores de llamadas anteriores.
        $this->setError('');
        // validaciones
        try {
            $this->validarInicial($numero, '13');
            $this->validarCodigoProvincia(substr($numero, 0, 2));
            $this->validarTercerDigito($numero[2], 'ruc_natural');
            $this->validarCodigoEstablecimiento(substr($numero, 10, 3));
            $this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }
        return true;
    }  	
    
    protected function validarCodigoProvincia($numero)
    {
        $mensaje='si';
        if ($numero < 0 OR $numero > 24) {
            $mensaje='Codigo de Provincia (dos primeros dígitos) no deben ser mayor a 24 ni menores a 0';
        }
        return $mensaje;
	}
	
	protected function validarTercerDigito($numero, $tipo)
    {
        switch ($tipo) {
            case 'cedula':
            break;
            case 'ruc_natural':
                if ($numero < 0 OR $numero > 5) {
                    throw new Exception('Tercer dígito debe ser mayor o igual a 0 y menor a 6 para cédulas y RUC de persona natural');
                }
                break;
            case 'ruc_privada':
                if ($numero != 9) {
                    throw new Exception('Tercer dígito debe ser igual a 9 para sociedades privadas');
                }
                break;
            case 'ruc_publica':
                if ($numero != 6) {
                    throw new Exception('Tercer dígito debe ser igual a 6 para sociedades públicas');
                }
                break;
            default:
                throw new Exception('Tipo de Identificación no existe.');
                break;
        }
        return true;
	}
	
	protected function validarCodigoEstablecimiento($numero)
    {
        if ($numero < 1) {
            throw new Exception('Código de establecimiento no puede ser 0');
        }
        return true;
	}
	
	protected function algoritmoModulo10($digitosIniciales, $digitoVerificador)
    {
        $men ='si';
        $arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);
        $digitoVerificador = (int)$digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }
            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 10;
        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }
        if ($resultado != $digitoVerificador) {
            $men =  'Dígitos iniciales no validan contra Dígito Idenficador';         
            //throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }
        return $men;
	}
	
	protected function algoritmoModulo11($digitosIniciales, $digitoVerificador, $tipo)
    {
        switch ($tipo) {
            case 'ruc_privada':
                $arrayCoeficientes = array(4, 3, 2, 7, 6, 5, 4, 3, 2);
                break;
            case 'ruc_publica':
                $arrayCoeficientes = array(3, 2, 7, 6, 5, 4, 3, 2);
                break;
            default:
                throw new Exception('Tipo de Identificación no existe.');
                break;
        }
        $digitoVerificador = (int)$digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 11;
        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 11 - $residuo;
        }
        if ($resultado != $digitoVerificador) {
            throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }
        return true;
    }
    /**
     * Get error
     *
     * @return string Mensaje de error
     */
    public function getError()
    {
        return $this->error;
    }
    /**
     * Set error
     *
     * @param  string $newError
     * @return object $this
     */
    public function setError($newError)
    {
        $this->error = $newError;
        return $this;
    }

 

}
