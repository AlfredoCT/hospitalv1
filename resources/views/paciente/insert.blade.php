@extends('layouts.layout')
@section('titulo')
Crear nuevo paciente
@endsection

@section('contenido')
<h1 class="text-center">Crear paciente</h1>
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

<form action="{{route('paciente.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sala:</label>
            <select name="idsala" class="form-control">
                @foreach ($salas as $sala)
                    <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>cedula:</label>
        <input type="text" class="form-control" name="cedula" placeholder="Cedula">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>registro:</label>
        <input type="number" class="form-control" name="registro" placeholder="Registro">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>cama:</label>
        <input type="number" class="form-control" name="cama" placeholder="Cama">
        </div>
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" placeholder="Direccion">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="nacimiento" placeholder="Nacimiento">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sexo:</label>
        <input type="text" class="form-control" name="sexo" placeholder="Sexo">
        </div>
    </div>    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar paciente</button>
    </div>
    </form>
@endsection