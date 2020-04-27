@extends('layouts.layout')
@section('titulo')
Crear nuevo laboratorio
@endsection

@section('contenido')
<h1 class="text-center">Crear Laboratorio</h1>
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

<form action="{{route('laboratorio.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Codigo:</label>
        <input type="text" class="form-control" name="codigo" placeholder="Codigo" id="codigo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Laboratorio:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="laboratorio">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" placeholder="Direccion#" id="direccion">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="telefono" placeholder="0" id="telefono">
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear Labotorio</a>
        &nbsp
        <a href="{{route('laboratorio.index')}}" class="btn btn-secondary">Atras</a>
        <!--<button type="submit" class="btn btn-primary">Crear laboratorio</button>-->
    </div>
</form>

<script>
        $('#registro').click(function(){
            var datos = $('#formulario').serialize();
            var ruta = 'guardar';

            $.ajax({
                data: datos,
                url: ruta,
                type: 'POST',
                dataType: 'json',
                success: function(){
                    alert('Laboratorio creado con exito!');
                    $('#codigo').val('');
                    $('#laboratorio').val('');
                    $('#direccion').val('');
                    $('#telefono').val('');
                }
            });
        });
    </script>


@endsection