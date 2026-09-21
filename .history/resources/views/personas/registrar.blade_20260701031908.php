@extends('layouts.app')

@section('title','Registrar persona')

@section('content')
<div class="container">
    <div class="mb-12">
        <label for="nombre" class="form-label">Nombre</label>
        {{-- <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"> --}}
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">

    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Apellido</label>
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
    </div>
</div>

@endsection
