@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-4">
    
            <img src="https://picsum.photos/200/300/?random" style="height:200px"/>
    
        </div>
        <div class="col-sm-8">
    
            <h1>{{ $producto[0] }}</h1>
            <h3><strong>Categoría: </strong>{{ $producto[1] }}</h3>
            <p><strong>Estado:</strong> Producto actualmente comprado.</p>
            <a class="btn btn-danger">Pendiente de compra</a>
            <a class="btn btn-warning" href = "{{ action('ProductoController@getEdit', array('id'=>$id)) }}">&#x270F Editar producto</a>
            <a class="btn btn-default" href = "{{ action('ProductoController@getIndex') }}">Volver al listado</a>
        </div>
    </div>

@stop