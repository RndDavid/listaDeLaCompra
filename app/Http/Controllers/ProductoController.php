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
        return view('productos.edit',array('id' => $producto->id));
    }
    public function postCreate(Request $request){
        $producto = new Producto();
        $producto->nombre = $request->name;
        $producto->precio = $request->price;
        $producto->imagen = $request->image;
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect(action('ProductoController@getIndex'));
    }
    public function putEdit(Request $request, $id){
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->name;
        $producto->precio = $request->price;
        $producto->imagen = $request->image;
        $producto->descripcion = $request->description;
        $producto->save();
        return redirect(action('ProductoController@getShow', array('id' => $producto->id)));
    }
    public function putComprar($id){
        $producto = Producto::findOrFail($id);
        $producto->pendiente = !$producto->pendiente;
        $producto->save();
        return redirect(action('ProductoController@getShow', array('id' => $producto->id)));
    }
}