<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class ProductoController extends Controller
{
   
    public function getIndex(){
        $listaProductos = Producto::all();
        return view('productos.index',array('listaProductos' => $listaProductos));
    }
    public function getShow($id){
        $producto = Producto::findOrFail($id);
        return view('productos.show',array('producto'=>$producto));
    }
    public function getCreate(){
        return view('productos.create');
    }
    public function getEdit($id){
        $producto = Producto::findOrFail($id);
        return view('productos.edit',array('id' => $producto));
    }
}