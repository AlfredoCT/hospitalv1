@extends('layouts.layout')

@section('titulo','Actualizar consulta')
 
@section('contenido')

<h1 class="text-center">Editar consulta</h1>
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

<form action="{{route('consulta.update', $consulta->id)}}" method="post">
    @csrf
    @method('PUT')                  
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Medico:</label>
            <select name="idmedico" class="form-control">
                @foreach ($medicos as $medico)
                    <option value="{{$medico->id}}"
                    @if ($consulta -> $medico == $medico->id)
                        selected
                    @endif>
                    {{$medico->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Paciente:</label>
            <select name="idpaciente" class="form-control">
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}"
                    @if ($consulta -> $paciente == $paciente->id)
                        selected
                    @endif>
                    {{$paciente->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" value="{{$consulta->fecha}}">
        </div>
    </div> 

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
    </form>



@endsection