@extends('layouts.app')

@section('title','Registrar persona')

@section('content')
<div class="container">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        {{-- <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"> --}}
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
</div>

@endsection
