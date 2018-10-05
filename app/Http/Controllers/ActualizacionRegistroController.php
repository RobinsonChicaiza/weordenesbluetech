<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_login;
use App\Persona;
use App\Canton;
use Illuminate\Support\Facades\Auth;

class ActualizacionRegistroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function update($id){
        $persona = Persona::find($id);
        $canton = Canton::all();

        $referencia1 = Persona::where('Id', $persona['Id_Referencia1'])->first();
        $referencia2 = Persona::where('Id', $persona['Id_Referencia2'])->first();
        $aux=0;
        $aux1=0;
        if(!empty($referencia1)){
            $aux=1;
        }

        //$imgContenido = addslashes(file_get_contents($image));

        if(!empty($referencia2)){
            $aux1=1;
        }
        $auxT = $aux + $aux1;
        //return($aux);
        return view('auth.actualizacionRegistro')->with(['persona' => $persona , 'canton' => $canton ,
                                                         'referencia1' => $referencia1, 'referencia2' => $referencia2, 
                                                         'auxT' => $auxT]);   
        
    }

    public function edit(Request $request, $id){
        
        $image = $request->file('imagen');
        $imgContenido = addslashes(file_get_contents($image));
        // return $imgContenido;
        $this->validate($request,[
            'Nombres' => 'required|string|max:255',
            'Ci' => 'required|string|max:10',
            'Ruc' => 'required|string|max:13',
            'Telefono' => 'required|string|max:10',
            'Id_Canton' => 'required|string|max:255',
            'Correo' => 'required|string|email|max:255',
           
        ]);
        //$imgContenido = addslashes(file_get_contents($image));
    	$data = array(
            'Nombres' => $request->input('Nombres'),
			'Ci' => $request->input('Ci'),
            'Ruc' => $request->input('Ruc'),
            'Telefono' => $request->input('Telefono'),
            'Id_Canton' => $request->input('Id_Canton'),
            'Correo' => $request->input('Correo')
        );
        
        $data1 = array(
            'Nombres' => $request->input('Nombres'),			
            'Correo' => $request->input('Correo'),
            'imagen' => $imgContenido
    	);
        Persona::where('Id',$id)->update($data);
        Perfil_login::where('Id_Persona',$id)->update($data1);

    	return redirect('/home');
    } 


    public function delete($id){
		Bus::where('Id',$id)
		->delete();
		return redirect('/buses')->with('info','Article Deleted Successfully!');
    } 

}
