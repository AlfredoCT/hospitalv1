@extends('layouts.layout')
@section('titulo')
Crear nueva sala
@endsection

@section('contenido')
<h1 class="text-center">Crear Nueva sala</h1>
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

<form action="{{route('sala.store')}}" method="post">
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
        <label>Codigo:</label>
        <input type="text" class="form-control" name="codigo" placeholder="Codigo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sala:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de camas:</label>
        <input type="text" class="form-control" name="ncamas" placeholder="Camas">
        </div>
    </div>    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Sala</button>
    </div>
    </form>
@endsection