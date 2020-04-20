@extends('layouts.layout')

@section('titulo')
    Consulta
@endsection

@section('contenido')
<h1 class="text-center">Consulta</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medico</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>
                <td>{{$consulta -> idmedico}}</td>
                <td>{{$consulta -> idpaciente}}</td>
                <td>{{$consulta -> fecha}}</td>
                <td>
                    <form action="{{route('consulta.destroy', $consulta->id)}}" method="post">
                    <a href="{{route('consulta.show', $consulta->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('consulta.edit', $consulta->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('consulta.create')}} "><button class="btn btn-success">Guardar Consulta</button></a>
        &nbsp
        <a href="{{route('home')}} "><button class="btn btn-secondary">Volver</button></a>
    </div>
@endsection
