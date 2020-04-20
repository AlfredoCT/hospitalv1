@extends('layouts.layout')
@section('titulo')
Crear nuevo medico
@endsection

@section('contenido')
<h1 class="text-center">Crear Medico</h1>
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

<form action="{{route('medico.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Hospital:</label>
            <select name="idhospital" class="form-control">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Cedula:</label>
        <input type="text" class="form-control" name="cedula" placeholder="Cedula">
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
        <label>Especialidad:</label>
        <input type="text" class="form-control" name="especialidad" placeholder="Especialidad">
        </div>
    </div>    
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Medico</button>
    </div>
    </form>
@endsection