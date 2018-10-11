<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_login;
use App\Persona;
use App\Canton;
use Illuminate\Support\Facades\Auth;

class ReferenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function vistaAgregar($id){
        $persona=$id;        
    	$personaReferencua = null;
        return view('referencias.agregarReferencia')->with(['persona' => $persona, 'personaReferencua' => $personaReferencua]);   
        
    }

    public function buscarCedula(Request $request, $id){

        $personaReferencua=Persona::where('Ci',$request->input('Buscar'))->first();
        //return $request->input('Buscar');
        $persona=$id;
        return view('referencias.agregarReferencia')->with(['persona' => $persona, 'personaReferencua' => $personaReferencua]);   
        
    }
    
    protected function add(Request $request, $id)
    {
        $this->validate($request,[
            'Nombres' => 'required|string|max:255',
            'Ci' => 'required|string|max:10|min:10',
            'Ruc' => 'string|max:13|min:13',
            'Telefono' => 'required|string|max:10|min:10',            
            'Correo' => 'required|string|email|max:255',
           
        ]);

       if( $this->validarCedula($request->input('Ci')) != 'si'){
        $persona=$id;        
        $personaReferencua = $request;
        return view('referencias.agregarReferencia')->with(['persona' => $persona, 'personaReferencua' => $personaReferencua,'info' => 'Cédula incorrecta.']); 
       
        //return $this->validarCedula($request->input('Ci'));
       }
        
        //Rocoleccion de datos de posible persona existente
        $personaCedula = Persona::where('Ci',$request->input('Ci'))->first();
        
        //Almacena datos de la persona a la que se va a referenciar.
        $personaR = Persona::find($id);

        if(!empty($personaCedula)){

            if($personaCedula['Ci'] == $personaR['Ci']){
                $persona=$id;        
                $personaReferencua = null;
                return view('referencias.agregarReferencia')->with(['persona' => $persona, 'personaReferencua' => $personaReferencua,'info' => 'No se puede realizar una referencia a si mismo.']); 
                //return $personaCedula['Ci']." ".$personaR['Ci'];
            }else{
                    $idPersona=$personaCedula['Id'];
                    
                    $data1 = array();

                    if(empty($personaR['Id_Referencia1'])){
                        $data1 = array(
                            'Id_Referencia1' => $idPersona                  
                        );
                    }else{
                        $data1 = array(
                            'Id_Referencia2' => $idPersona          
                        );
                    }  
                    Persona::where('Id',$id)->update($data1);
                
                    return redirect('/home')->with('info','Referencia agregada correctamente.');
            }
            
            
        }else{
        

        $persona = Persona::create([
            'Nombres' => $request->input('Nombres'),
			'Ci' => $request->input('Ci'),
            'Ruc' => $request->input('Ruc'),
            'Telefono' => $request->input('Telefono'),            
            'Correo' => $request->input('Correo')
        ]);

        //Devuelve el id de la referencia ingresada
        $arrayPersona = Persona::select('Id')->orderby('created_at','DESC')->first();
        $idPersona=$arrayPersona['Id'];

        
        $data1 = array();

        if(empty($personaR['Id_Referencia1'])){
            $data1 = array(
                'Id_Referencia1' => $idPersona                  
            );
        }else{
            $data1 = array(
                'Id_Referencia2' => $idPersona          
            );
        }  
        Persona::where('Id',$id)->update($data1);
     
        return redirect('/home')->with('info','Referencia agregada correctamente.');
    } 
    }  

    public function update($id){
        $persona = Persona::find($id);       
        return view('referencias.actualizarReferencia')->with(['persona' => $persona]);   
        
    }

    public function edit(Request $request, $id){        
       
        $this->validate($request,[
            'Nombres' => 'required|string|max:255',
            'Ci' => 'required|string|max:10',
            'Ruc' => 'required|string|max:13',
            'Telefono' => 'required|string|max:10',           
            'Correo' => 'required|string|email|max:255',
           
        ]);
      
    	$data = array(
            'Nombres' => $request->input('Nombres'),
			'Ci' => $request->input('Ci'),
            'Ruc' => $request->input('Ruc'),
            'Telefono' => $request->input('Telefono'),            
            'Correo' => $request->input('Correo')
        );        
        
        Persona::where('Id',$id)->update($data);        

    	return redirect('/home');
    } 


    public function delete($id_person, $id_referencia, $aux){

        
        $data1 = array();

        if($aux==1){
            $data1 = array(
                'Id_Referencia1' => null                  
            );
        }else{
            $data1 = array(
                'Id_Referencia2' =>  null         
            );
        }  
        Persona::where('Id',$id_person)->update($data1);
         
        //Persona::where('Id',$id)->delete();
         
        return redirect('/home')->with('info','Referencia eliminada correctamente!');
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
