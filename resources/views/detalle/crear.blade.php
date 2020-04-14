@extends('layouts.layout')
@section('titulo')
Crear Detalle
@endsection

@section('contenido')
<h1 class="text-center">Crear Detalle</h1>
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

<form action="{{route('detalle.store')}}" method="post">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Laboratorio:</label>
            <select name="idlaboratorio" class="form-control">
                @foreach ($laboratorios as $laboratorio)
                    <option value="{{$laboratorio->id}}">{{$laboratorio->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

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
        <label>Descripcion:</label>
        <input type="text" class="form-control" name="descripcion" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" placeholder="">
        </div>
    </div>  
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Detalle</button>
    </div>
    </form>
@endsection