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

<form action="{{route('consulta.store')}}" method="post" id="formulario">
    @csrf 
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Medico:</label>
            <select name="idmedico" class="form-control" id="medico">
                @foreach ($medicos as $medico)
                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Paciente:</label>
            <select name="idpaciente" class="form-control" id="paciente">
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" placeholder="" id="fecha">
        </div>
    </div> 

    <div class="form-row">
    <a href="#" class="btn btn-primary" id="registro">Crear Consulta</a>
    &nbsp
    <a href="{{route('consulta.index')}}" class="btn btn-secondary">Atras</a>
        <!--<button type="submit" class="btn btn-primary">Guardar Consulta</button>-->
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
                    alert('Consulta creada con exito!');
                    $('#medico').val('');
                    $('#paciente').val('');
                    $('#fecha').val('');
                }
            });
        });
    </script>

@endsection