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

<form action="{{route('diagnostico.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Codigo:</label>
            <input type="text" class="form-control" name="codigo" placeholder="Codigo" id="codigo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tipo:</label>
            <input type="text" class="form-control" name="tipo" placeholder="Tipo de diagnostico" id="tipo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>complicaciones:</label>
            <input type="text" class="form-control" name="complicaciones" placeholder="complicaciones" id="complicacion">
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear Diagnostico</a>
        &nbsp
        <a href="{{route('diagnostico.index')}}" class="btn btn-secondary">Atras</a>
        <!--<button type="submit" class="btn btn-primary">Crear diagnostico</button>-->
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
                    alert('Hospital creado con exito!');
                    $('#codigo').val('');
                    $('#tipo').val('');
                    $('#complicacion').val('');
                }
            });
        });
    </script>
@endsection