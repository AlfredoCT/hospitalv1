@extends('layouts.layout')

@section('titulo','Actualizar Detalle')
 
@section('contenido')

<h1 class="text-center">Editar Detalle</h1>
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

<form action="{{route('detalle.update', $detalle->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Laboratorio:</label>
            <select name="idlaboratorio" class="form-control">
                @foreach ($laboratorios as $laboratorio)
                    <option value="{{$laboratorio->id}}"
                    @if ($detalle -> $laboratorio == $laboratorio->id)
                        selected
                    @endif>
                    {{$laboratorio->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div> 

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Hosptital:</label>
            <select name="idhospital" class="form-control">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}"
                    @if ($detalle -> $hospital == $hospital->id)
                        selected
                    @endif>
                    {{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>       

    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Descripcion:</label>
            <input type="text" class="form-control" name="descripcion" value="{{$detalle->descripcion}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" value="{{$detalle->fecha}}">
        </div>
    </div>            
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
    </form>

@endsection