@extends('layouts.app')

@section('title','Productos')

@section('content')
<h1>lleja al show</h1>
<div id="app">
    <edit-producto :producto='@json($producto)'
                    :categorias='@json($categorias)'
                    :marcas='@json($marcas)'
    >

    </edit-producto>

</div>

@endsection
