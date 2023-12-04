<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function Agregar(Request $request){
        $producto = new Producto();
        $producto->nombreproducto=$request->nombre;
        $producto->fechavencimiento=$request->fecha;
        $producto->precio= $request->precio;
        $producto->cantidadStock= $request->cantidad;
        $producto->categoria_id= $request->categoria;
        $producto->save();
        return back();
    }

    public function index(){
        $categoriass = Categoria::where('estado', true)->get();

        $productoss = DB::table('productos')
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->select('productos.id','productos.nombreproducto','productos.fechavencimiento','productos.precio','productos.cantidadStock','categorias.categoria')
        ->where('productos.estado', true)
        ->get();
        return view('productos.producto', compact('productoss', 'categoriass'));
    }

    public function eliminar($id){
        $producto =Producto::find($id);
        if ($producto) {
            $producto->estado=false;
            $producto->save();
            return back();
        }
    }

    public function filtrar($id){
        $categoria = Categoria::findOrFail($id);
        $productos = Producto::where('categoria_id', $id)->get();
        return view('productos.categoria', ['categoria' => $categoria, 'productos' => $productos]);
    }

    public function venderProducto($id, $cantidad)
    {
        $producto = Producto::findOrFail($id);

        if ($cantidad <= $producto->cantidad_stock) {
            $producto->cantidad+= $cantidad;
            $producto->cantidad-= $cantidad;
            $producto->save();

            return redirect()->back()->with('success', 'Venta realizada con éxito.');
        } else {
            return redirect()->back()->with('error', 'No hay suficiente stock para realizar esta venta.');
        }
    }

}
