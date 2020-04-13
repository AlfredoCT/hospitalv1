@extends('layouts.layout')
@section('titulo')
Crear nueva consulta
@endsection

@section('contenido')
<h1 class="text-center">Crear consulta</h1>
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

<form action="{{route('consulta.store')}}" method="post">
    @csrf 
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Medico:</label>
            <select name="idmedico" class="form-control">
                @foreach ($medicos as $medico)
                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Paciente:</label>
            <select name="idpaciente" class="form-control">
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" placeholder="">
        </div>
    </div> 

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Consulta</button>
    </div>
    </form>

<div class="row">
    <a href="{{route('consulta.index')}}"><button class="btn btn-primary">Regresar</button>
</div>
@endsection