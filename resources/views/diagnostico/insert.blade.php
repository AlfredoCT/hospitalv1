@extends('layouts.layout')
@section('titulo')
Crear nuevo diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Crear Diagnostico</h1>
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

<form action="{{route('diagnostico.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Codigo:</label>
            <input type="text" class="form-control" name="codigo" placeholder="Codigo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tipo:</label>
            <input type="text" class="form-control" name="tipo" placeholder="Tipo de diagnostico">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>complicaciones:</label>
            <input type="text" class="form-control" name="complicaciones" placeholder="complicaciones">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear diagnostico</button>
    </div>
    </form>
@endsection