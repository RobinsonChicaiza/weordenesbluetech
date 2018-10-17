<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Persona;
use App\Cooperativa;


class FacturaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
    public function index(){
        $id=Auth::user()->Id_Persona;
		$persona=Persona::find($id);
		
		$cooperativas = Cooperativa::all();
		return view('invoices.factura')->with(['persona' => $persona,'cooperativas' => $cooperativas]);
    	 
    }

    public function indexModalCoop(){

        // $cooperativas = Cooperativa::all();
        // return json_encode($cooperativas);
        // if($request->ajax()){            
            $cooperativas = Cooperativa::all();
            // $product->delete();
            // $products_total = \App\Product::all()->count();
            // return response()->json([$cooperativas]);
            return json_encode($cooperativas);
        // }else {
		// 	return 'nada';
		// }
    	 
    }

	public function getProducto(Request $request, $id)
    {
		//return $request->ajax();
        if($request->ajax()){            
            $product = Cooperativa::find($id);
            // $product->delete();
            // $products_total = \App\Product::all()->count();
            return response()->json([
                'Id' => $product->Id,
				'Nombre' =>  $product->Nombre,
				'Ruc' =>  $product->Ruc
            ]);
           
        }else {
			return 'nada';
		}
    }
}
