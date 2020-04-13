<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
@extends('layouts.layout')

@section('titulo')
    Consulta
@endsection

@section('contenido')
    <h1 class="text-center">Consultas Medicas</h1>
    <br><br>
    @if ($message = Session::get('exito'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    
    <h6 class="text-center">Registro de Consultas Medicas:</h6>
    <table class="table table-bordered">
        <thead>
                <th class="text-center">Medico</th>
                <th class="text-center">Paciente</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Acciones</th>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
                <tr>
                    <td class="text-center">{{$consulta->idMedico}}</td>
                    <td class="text-center">{{$consulta->idPaciente}}</td>
                    <td class="text-center">{{$consulta->fechac}}</td>
                    <td class="text-center">
                    <form action="{{route('consulta.destroy',$consulta->id)}}" method="post">  
                    <a href="{{route('consulta.show',$consulta->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('consulta.edit',$consulta->id)}}" class="btn btn-primary">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
<div class="row">
    <a href="{{route('consulta.create')}} "><button class="btn btn-success">Crear Nueva Consulta</button></a>
</div>
@endsection
