@extends('layouts.layout')
@section('titulo')
Crear nuevo paciente
@endsection

@section('contenido')
<h1 class="text-center">Crear paciente</h1>
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

<form action="{{route('paciente.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sala:</label>
            <select name="idsala" class="form-control" id="sala">
                @foreach ($salas as $sala)
                    <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>cedula:</label>
        <input type="text" class="form-control" name="cedula" placeholder="Cedula" id="cedula">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>registro:</label>
        <input type="number" class="form-control" name="registro" placeholder="Registro" id="registro">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>cama:</label>
        <input type="number" class="form-control" name="cama" placeholder="Cama" id="cama">
        </div>
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" placeholder="Direccion" id="direccion">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="nacimiento" placeholder="Nacimiento" id="naciemiento">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sexo:</label>
        <input type="text" class="form-control" name="sexo" placeholder="Sexo" id="sexo">
        </div>
    </div>    
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear Hospital</a>
        &nbsp
        <a href="{{route('paciente.index')}}" class="btn btn-secondary">Atras</a>
        <!--<button type="submit" class="btn btn-primary">Crear paciente</button>-->
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
                    alert('Paciente creado con exito!');
                    $('#sala').val('');
                    $('#cedula').val('');
                    $('#registro').val('');
                    $('#cama').val('');
                    $('#nombre').val('');
                    $('#direccion').val('');
                    $('#nacimiento').val('');
                    $('#sexo').val('');
                }
            });
        });
</script>
@endsection