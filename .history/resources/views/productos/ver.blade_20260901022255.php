@extends('layouts.app')

@section('title','Productos')

@section('content')
<h1>lleja al show</h1>
<div id="app">
<edit-producto :producto='{{ Js::from($producto) }}'></edit-producto>

</div>

@endsection
