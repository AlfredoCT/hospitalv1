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

<form action="{{route('sala.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Hospital:</label>
            <select name="idhospital" class="form-control" id="hospital">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Codigo:</label>
        <input type="text" class="form-control" name="codigo" placeholder="Codigo" id=codigo>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sala:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="sala">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de camas:</label>
        <input type="text" class="form-control" name="ncamas" placeholder="Camas" id="ncamas">
        </div>
    </div>    
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear Hospital</a>
        &nbsp
        <a href="{{route('sala.index')}}" class="btn btn-secondary">Atras</a>
        <!--<button type="submit" class="btn btn-primary">Crear Sala</button>-->
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
                    alert('Sala creado con exito!');
                    $('#hospital').val('');
                    $('#codigo').val('');
                    $('#sala').val('');
                    $('#ncamas').val('');
                }
            });
        });
</script>
@endsection