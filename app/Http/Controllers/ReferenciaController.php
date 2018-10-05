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
    return view('referencias.agregarReferencia')->with(['persona' => $persona]);   
        
    }

    protected function add(Request $request, $id)
    {
        $this->validate($request,[
            'Nombres' => 'required|string|max:255',
            'Ci' => 'required|string|max:10',
            'Ruc' => 'required|string|max:13',
            'Telefono' => 'required|string|max:10',            
            'Correo' => 'required|string|email|max:255',
           
        ]);    
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

        $personaR = Persona::find($id);
        
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
     
        return redirect('/home')->with('info','Se ingreso');
       
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


    public function delete($id){
		Persona::where('Id',$id)
		->delete();
		return redirect('/home')->with('info','Referencia eliminada correctamente!');
    } 

}
