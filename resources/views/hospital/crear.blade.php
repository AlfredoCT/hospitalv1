@extends('layouts.layout')
@section('titulo')
Crear nuevo hospital
@endsection

@section('contenido')
<h1 class="text-center">Crear Hospital</h1>
<br><br>

@if($errors->any())
	<div class="alert alert-danger">
	<div class="header"> <strong>Ups.</strong>¡Algo fallo!, intentalo nuevamente...</div>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
	</div>
	
@endif

<form action="{{route('hospital.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Codigo:</label>
        <input type="text" class="form-control" name="codigo" placeholder="Codigo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Hospital:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" placeholder="Direccion#">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="telefono" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de camas:</label>
        <input type="number" class="form-control" name="ncamas" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear hospital</button>
    </div>
    </form>
@endsection