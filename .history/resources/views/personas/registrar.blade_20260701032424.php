@extends('layouts.app')

@section('title','Registrar persona')

@section('content')
<div class="container">
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

@endsection
