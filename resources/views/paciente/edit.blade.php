@extends('layouts.layout')

@section('titulo','Actualizar paciente')
 
@section('contenido')

<h1 class="text-center">Editar paciente</h1>
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

<form action="{{route('paciente.update', $paciente->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Sala:</label>
            <select name="idsala" class="form-control">
                @foreach ($salas as $sala)
                    <option value="{{$sala->id}}"
                    @if ($paciente -> $sala == $sala->id)
                        selected
                    @endif>
                    {{$sala->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Cedula:</label>
        <input type="text" class="form-control" name="cedula" value="{{$paciente->cedula}}">
        </div>
    </div>
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>registro:</label>
            <input type="number" class="form-control" name="registro" value="{{$paciente->registro}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>cama:</label>
        <input type="number" class="form-control" name="cama" value="{{$paciente->cama}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" value="{{$paciente->nombre}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" value="{{$paciente->direccion}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="nacimiento" value="{{$paciente->nacimiento}}">
        </div>
    </div>  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sexo:</label>
        <input type="text" class="form-control" name="sexo" value="{{$paciente->sexo}}">
        </div>
    </div>            

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
    </form>

@endsection