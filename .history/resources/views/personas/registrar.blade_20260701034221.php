@extends('layouts.app')

@section('title','Registrar persona')

@section('content')
<div class="container">
<form action="{{ route('personas.store') }}" method="POST">
    @csrf
   <div class="row">

        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text"
                   class="form-control"
                   id="nombre"
                   placeholder="Ingrese su nombre">
        </div>

        <div class="col-md-6 mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text"
                   class="form-control"
                   id="apellido"
                   placeholder="Ingrese su apellido">
        </div>

    </div>

    <div class="row">
        <div class="mb-3">
            <div class="col-md-6 mb-3">
                <label for="rut" class="form-label">Rut</label>
                <input type="text"
                    class="form-control"
                    id="rut"
                    placeholder="Ingrese su rut">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="formFile">
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
        </div>
    </div>
    </form>
</div>

@endsection
