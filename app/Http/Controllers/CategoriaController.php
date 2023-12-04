<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function registro(Request $request){
        $categoria = new Categoria();
        $categoria->categoria=$request->categoria;
        $categoria->save();
        return back();
    }

    public function index(){
        $categoriass = Categoria::where('estado', true)->get();
        return view('categorias.categoria', compact('categoriass'));
    }
}
