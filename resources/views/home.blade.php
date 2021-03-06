@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <br>
                    <div class="row">
                        <a href="{{route('hospital.index')}}"><button class="btn btn-primary">Hospital</button>
                    </div>

                    <br>
                    <div class="row">
                        <a href="{{route('sala.index')}}"><button class="btn btn-primary">Sala</button>
                    </div>

                    <br>
                    <div class="row">
                        <a href="{{route('medico.index')}}"><button class="btn btn-primary">Medico</button>
                    </div>

                    <br>
                    <div class="row">
                        <a href="{{route('paciente.index')}}"><button class="btn btn-primary">Pacientes</button>
                    </div>

                    <br>
                    <div class="row">
                        <a href="{{route('consulta.index')}}"><button class="btn btn-primary">Consultas</button>
                    </div>

                    <br>
                    <div class="row">
                        <a href="{{route('detalle.index')}}"><button class="btn btn-primary">Detalle</button>
                    </div>

                    <br>
                    <div class="row">
                        <a href="{{route('fecha.index')}}"><button class="btn btn-primary">Fecha</button>
                    </div>
                    
                    <br>
                    <div class="row">
                        <a href="{{route('laboratorio.index')}}"><button class="btn btn-primary">Laboratorio</button>
                    </div>
                    
                    <br>
                    <div class="row">
                        <a href="{{route('diagnostico.index')}}"><button class="btn btn-primary">Diagnostico</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
