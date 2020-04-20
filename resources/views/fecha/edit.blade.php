@extends('layouts.layout')

@section('titulo','Actualizar fecha diagnostico')
 
@section('contenido')

<h1 class="text-center">Editar fecha</h1>
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

<form action="{{route('fecha.update', $fecha->id)}}" method="post">
    @csrf
    @method('PUT') 
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Paciente:</label>
            <select name="idpaciente" class="form-control">
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}"
                    @if ($fecha -> $paciente == $paciente->id)
                        selected
                    @endif>
                    {{$paciente->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>                  
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Diagnostico:</label>
            <select name="iddiagnostico" class="form-control">
                @foreach ($diagnosticos as $diagnostico)
                    <option value="{{$diagnostico->id}}"
                    @if ($fecha -> $diagnostico == $diagnostico->id)
                        selected
                    @endif>
                    {{$diagnostico->tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="{{$fecha->fecha}}">
        </div>
    </div> 
        <div class="form-row">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>

@endsection