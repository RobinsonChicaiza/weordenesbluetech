<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Impuesto;
use App\Marca;
use App\Estado;
use App\Categoria;
use App\TipoMarca;
use App\Persona;
use DB;


use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}

    public function index(){
        $productos = Producto::paginate(5);
        $impuestos = Impuesto::all();
        $marcas = Marca::all();
        $estados = Estado::all();
        $categorias = Categoria::all();
        $tiposmarcas = TipoMarca::all();
        $personas = Persona::all();
        $array1 = null;  
     
        for($i = 0 ; $i < sizeof($productos); $i++)
        {
          for($j = 0 ; $j < sizeof($impuestos); $j++){
            if( $productos[$i]['Id_Impuestos'] ==  $impuestos[$j]['Id']){
                $productos[$i] ['Id_Impuestos'] = $impuestos [$j]['IVA'];
            }
          }

          for($k = 0 ; $k < sizeof($marcas); $k++){
            if( $productos[$i]['Id_Marca'] ==  $marcas[$k]['Id']){
                $productos[$i] ['Id_Marca'] = $marcas [$k]['Nombre'];
            }
          }

          for($k = 0 ; $k < sizeof($estados); $k++){
            if( $productos[$i]['Id_Estado'] ==  $estados[$k]['Id']){
                $productos[$i] ['Id_Estado'] = $estados [$k]['Nombre'];
            }
          }

          for($k = 0 ; $k < sizeof($categorias); $k++){
            if( $productos[$i]['Id_Categoria'] ==  $categorias[$k]['Id']){
                $productos[$i] ['Id_Categoria'] = $categorias [$k]['Nombre'];
            }
          }

          for($j = 0 ; $j < sizeof($tiposmarcas); $j++){
            if( $marcas[$i]['Id_Tipo'] ==  $tiposmarcas[$j]['Id']){
                $marcas[$i] ['Id_Tipo'] = $tiposmarcas [$j]['Nombre'];
            }
          }

          for($j = 0 ; $j < sizeof($personas); $j++){
            if( $categorias[$i]['Id_Proveedor'] ==  $personas[$j]['Id']){
                $categorias[$i] ['Id_Proveedor'] = $personas [$j]['Apellidos'].' '.$personas [$j]['Nombres'];
            } 
          }


        }
		return view('productos.index')->with(['productos' => $productos]);
        
    }

    public function agregar(){
        $impuestos = Impuesto::all();
        $marcas = Marca::all();
        $estados = Estado::all();
        $categorias = Categoria::all();
        $tiposmarcas = TipoMarca::all();
        $personas = DB::table('personas as p')   
        ->select('p.Nombres','p.Id') 
        ->where('p.Id_Rol','=',4)  
        ->get();
       
        return view('productos.agregar')->with(['impuest' => $impuestos, 'marc' => $marcas, 'estad' => $estados, 'categ' => $categorias, 'tipmar' => $tiposmarcas, 'pers' => $personas]);
    }


    public function add(Request $request){
    	$this->validate($request,[
            'Id_Impuestos' => 'required',
            'Id_Marca' => 'required',
            'Id_Estado' => 'required',
            'Nombre' => 'required',
            'Precio' => 'required',
            'PrecioCompra' => 'required',
            'Stock' => 'required',
            'Descripcion' => 'required',
            'Id_Categoria' => 'required'
    	]);

        $articles = new Producto;
        $articles->Id_Impuestos = $request->input('Id_Impuestos');
        $articles->Id_Marca = $request->input('Id_Marca');
        $articles->Id_Estado = $request->input('Id_Estado');
        $articles->Nombre = $request->input('Nombre');
        $articles->Precio = $request->input('Precio');
        $articles->PrecioCompra = $request->input('PrecioCompra');
        $articles->Stock = $request->input('Stock');
        $articles->Descripcion = $request->input('Descripcion');
        $articles->Id_Categoria = $request->input('Id_Categoria');
    	$articles->save();
    	return redirect('/productos')->with('info','El registro fue agregado correctamente');
    }
    
    
    public function addImpuestoProducto(Request $request){
    	$this->validate($request,[
    		'IVA' => 'required'
    	]);

        $articles = new Impuesto;
        $articles->IVA = $request->input('IVA');
    	$articles->save();
    	return redirect('/agregarProd')->with('info','El registro fue agregado correctamente!');
    } 

   
    public function addMarcaProducto(Request $request){
    	$this->validate($request,[
            'Id_Tipo' => 'required',
            'Nombre' => 'required'
    	]);

        $articles = new Marca;
        $articles->Id_Tipo = $request->input('Id_Tipo');
        $articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/agregarProd')->with('info','El registro fue agregado correctamente');
    }

    public function addEstadoProducto(Request $request){
    	$this->validate($request,[
            'Nombre' => 'required'
    	]);

        $articles = new Estado;
        $articles->Nombre = $request->input('Nombre');
    	$articles->save();
    	return redirect('/agregarProd')->with('info','El dato fue agregado correctamente!');
    } 

    public function addCategoriaProducto(Request $request){
    	$this->validate($request,[
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Id_Proveedor' => 'required',
            'Id_Estado' => 'required'
    	]);

        $articles = new Categoria;
        $articles->Nombre = $request->input('Nombre');
        $articles->Descripcion = $request->input('Descripcion');
        $articles->Id_Proveedor = $request->input('Id_Proveedor');
        $articles->Id_Estado = $request->input('Id_Estado');
    	$articles->save();
    	return redirect('/agregarProd')->with('info','El dato fue agregado correctamente!');
    }

    public function update($id){
        $productos = Producto::find($id);
        $impuesto = Impuesto::where('Id' , $productos['Id_Impuestos'])->first();
        $impuestosAll = Impuesto::all();
        $marca = Marca::where('Id' , $productos['Id_Marca'])->first();
        $marcasAll = Marca::all();
        $estado = Estado::where('Id' , $productos['Id_Estado'])->first();
        $estadosAll = Estado::all();
        $categoria = Categoria::where('Id' , $productos['Id_Categoria'])->first();
        $categoriasAll = Categoria::all();
        return view('productos.actualizar')->with(['productos' => $productos , 'impuesto' => $impuesto , 'impuestosAll' => $impuestosAll, 'marca' => $marca , 'marcasAll' => $marcasAll, 'estado' => $estado , 'estadosAll' => $estadosAll, 'categoria' => $categoria , 'categoriasAll' => $categoriasAll]);   
        
    }

    public function edit(Request $request, $id){
    	$this->validate($request,[
            'Id_Impuestos' => 'required',
            'Id_Marca' => 'required',
            'Id_Estado' => 'required',
            'Nombre' => 'required',
            'Precio' => 'required',
            'PrecioCompra' => 'required',
            'Stock' => 'required',
            'Descripcion' => 'required',
            'Id_Categoria' => 'required'
    	]);
    	$data = array(
            'Id_Impuestos' => $request->input('Id_Impuestos'),
			'Id_Marca' => $request->input('Id_Marca'),
            'Id_Estado' => $request->input('Id_Estado'),
            'Nombre' => $request->input('Nombre'),
            'Precio' => $request->input('Precio'),
            'PrecioCompra' => $request->input('PrecioCompra'),
            'Stock' => $request->input('Stock'),
            'Descripcion' => $request->input('Descripcion'),
            'Id_Categoria' => $request->input('Id_Categoria')
    	);
    	Producto::where('Id',$id)->update($data);
    	return redirect('/productos')->with('info','El dato fue actualizado correctamente!');
    } 


    public function delete($id){
        try{

        Producto::where('Id',$id)
		->delete();
		return redirect('/productos')->with('info','Registro agregado correctamente!');

        }catch(\Illuminate\Database\QueryException $e){
      
		return redirect('/productos')->with('info','Error: No se puede eliminar el registro!');
            
        }
		
    } 

}
