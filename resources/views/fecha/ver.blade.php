@extends('layouts.layout')

@section('titulo')
Fecha de diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Fecha de diagnostico</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Paciente asignado</th>
                <th>Diagnostico asignado</th>              
                <th>Fecha</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($fechas as $fecha)
            <tr>
                <td>{{$fecha -> idpaciente}}</td
                <td>{{$fecha -> iddiagnostico}}</td>>                
                <td>{{$fecha -> fecha}}</td>                
                <td>
                    <form action="{{route('fecha.destroy', $fecha->id)}}" method="post">
                    <a href="{{route('fecha.show', $fecha->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('fecha.edit', $fecha->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('fecha.create')}} "><button class="btn btn-success">Crear fecha del diagnostico</button></a>
    </div>
@endsection
