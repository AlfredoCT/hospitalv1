@extends('layouts.layout')

@section('titulo')
Medico
@endsection

@section('contenido')
<h1 class="text-center">Medico</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hospital</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Acciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
            <tr>
                <td>{{$medico -> idhospital}}</td>
                <td>{{$medico -> cedula}}</td>
                <td>{{$medico -> nombre}}</td>
                <td>{{$medico -> especialidad}}</td>                
                <td>
                    <form action="{{route('medico.destroy', $medico->id)}}" method="post">
                    <a href="{{route('medico.show', $medico->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('medico.edit', $medico->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            <tr>  
            @endforeach
        </tbody>
    </table>
    <br><br>

    <div class="row">
        <a href="{{route('medico.create')}} "><button class="btn btn-success">Crear Medico</button></a>
    </div>
@endsection