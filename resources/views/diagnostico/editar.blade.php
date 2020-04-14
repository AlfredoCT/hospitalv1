@extends('layouts.layout')

@section('titulo','Actualizar diagnostico')
 
@section('contenido')

<h1 class="text-center">Editar Diagnostico</h1>
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

<form action="{{route('diagnostico.update', $diagnostico->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Codigo:</label>
            <input type="text" class="form-control" name="codigo" value="{{$diagnostico->codigo}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tipo:</label>
            <input type="text" class="form-control" name="tipo" value="{{$diagnostico->tipo}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Complicaciones:</label>
            <input type="text" class="form-control" name="complicaciones" value="{{$diagnostico->complicaciones}}">
        </div>
    </div>  

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Modificacion</button>
    </div>
    </form>

@endsection