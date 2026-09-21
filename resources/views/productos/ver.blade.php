@extends('layouts.app')

@section('title','Productos')

@section('content')
<h1>Editar Producto</h1>
<div id="app">
    <edit-producto
                    :categorias='@json($categorias)'
                    :marcas='@json($marcas)'
                    :producto='@json($producto)'
    >

    </edit-producto>

</div>

@endsection
