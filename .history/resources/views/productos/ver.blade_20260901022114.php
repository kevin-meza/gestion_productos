@extends('layouts.app')

@section('title','Productos')

@section('content')
<h1>lleja al show</h1>
<div id="app">
   <edit-producto producto="{{ json_encode($producto) }}">

</div>

@endsection
