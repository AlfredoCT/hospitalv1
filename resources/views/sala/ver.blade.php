extends('layouts.layout')

@section('titulo')
Sala
@endsection

@section('contenido')
<h1 class="text-center">Sala</h1>
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
                <th>Codigo</th>
                <th>Sala</th>
                <th>Numero de camas</th>
                <th>Acciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($salas as $sala)
            <tr>
                <td>{{$sala -> idhospital}}</td>
                <td>{{$sala -> codigo}}</td>
                <td>{{$sala -> nombre}}</td>
                <td>{{$sala -> ncamas}}</td>                
                <td>
                    <form action="{{route('sala.destroy', $sala->id)}}" method="post">
                    <a href="{{route('sala.show', $sala->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('sala.edit', $sala->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('sala.create')}} "><button class="btn btn-success">Guardar Sala</button></a>
        <a href="{{route('paciente.index')}}"><button class="btn btn-success">Pacientes</button></a>
    </div>
@endsection