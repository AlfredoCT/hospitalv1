<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas = App\Fecha::orderby('fecha', 'asc')->get();
        return view('fecha.index', compact('fechas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-fecha'))
        {
            return redirect()->route('fecha.index');
        }
        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        return view('fecha.insert', compact('diagnosticos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idpaciente' => 'required',
            'iddiagnostico' => 'required',
            'fecha' => 'required'       
        ]);

        App\Fecha::create($request->all());      
        
        return redirect()->route('fecha.index')
                ->with('exito', 'se creo la fecha con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = App\Fecha::join('diagnosticos', 'fecha.iddiagnostico', 'diagnosticos.id',
                                       'pacientes', 'fecha.idpaciente', 'pacientes.id')
                                ->select('fecha.*', 'diagnosticos.nombre as diagnostico',
                                         'fecha.*', 'pacientes.nombre as paciente')
                                ->where('fecha.id', $id)
                                ->first();
        
        return view('fecha.view', compact('fecha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-fecha'))
        {
            return redirect()->route('fecha.index');
        }

        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        $fecha = App\Fecha::findorfail($id);

        return view('fecha.edit', compact('fecha', 'diagnosticos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idpaciente' => 'required',
            'iddiagnostico' => 'required',      
            'fecha' => 'required',     
        ]);
        
        $fecha = App\Fecha::findorfail($id);

        $fecha->update($request->all());

        return redirect()->route('fecha.index')
                ->with('exito', 'se modifico la fecha con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fecha  $fecha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-fecha'))
        {
            return redirect()->route('fecha.index');
        }

        $fecha = App\Fecha::findorfail($id);

        $fecha->delete();

        return redirect()->route('fecha.index')
                ->with('exito', 'se elimino la fecha con exito');
    }
}
