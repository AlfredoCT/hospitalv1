@extends('layouts.layout')

@section('titulo')
Hospital
@endsection

@section('contenido')
<h1 class="text-center">Hospital</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Codigo/th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Numero de camas</th>
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($hospitales as $hospital)
            <tr>
                <td>{{$hospital -> codigo}}</td>
                <td>{{$hospital -> nombre}}</td>
                <td>{{$hospital -> direccion}}</td>
                <td>{{$hospital -> telefono}}</td>
                <td>{{$hospital -> ncamas}}</td>
                <td>
                    <form action="{{route('hospital.destroy', $hospital->id)}}" method="post">
                    <a href="{{route('hospital.show', $hospital->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('hospital.edit', $hospital->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('hospital.create')}} "><button class="btn btn-success">Crear hospital</button></a>
        <a href="{{route('medico.index')}}"><button class="btn btn-success">Medicos</button></a>
        <a href="{{route('laboratorio.index')}}"><button class="btn btn-success">Laboratorios</button></a>
    </div>
@endsection

