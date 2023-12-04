<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function Agregar(Request $request){
        $producto = new Producto();
        $producto->nombreproducto=$request->nombre;
        $producto->fechavencimiento=$request->fecha;
        $producto->precio= $request->precio;
        $producto->cantidadStock= $request->cantidad;
        $producto->categoria_id = $request->categoria;
        $producto->save();
        return back();
    }

    public function index(){
        $productoss = Producto::where('estado', true)->get();
        return view('Productos.producto', compact('productoss'));
    }

    public function eliminar($id){
        $producto =Producto::find($id);
        if ($producto) {
            $producto->estado=false;
            $producto->save();
            return back();
        }
    }
}
