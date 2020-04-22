<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = App\Consulta::orderby('fecha', 'asc')->get();
        return view('consulta.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-consulta'))
        {
            return redirect()->route('consulta.index');
        }
        $medicos = App\Medico::orderby('nombre', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        return view('consulta.insert', compact('medicos', 'pacientes'));
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
            'idmedico' => 'required',
            'idpaciente' => 'required',
            'fecha' => 'required'
        ]);

        App\Consulta::create($request->all());      
        
        return redirect()->route('consulta.index')
                ->with('exito', 'se creo la consulta exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = App\Consulta::join('medicos', 'consultas.idmedico', 'medicos.id')
                                       -> join('pacientes', 'consultas.idpaciente', 'pacientes.id')
                                ->select('consultas.*', 'medicos.nombre as medico',
                                         'pacientes.nombre as paciente')
                                ->where('consultas.id', $id)
                                ->first();
        
        return view('consulta.view', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-consulta'))
        {
            return redirect()->route('consulta.index');
        }

        $medicos = App\Medico::orderby('nombre', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        $consulta = App\Consulta::findorfail($id);

        return view('consulta.edit', compact('consulta', 'medicos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idmedico' => 'required',
            'idpaciente' => 'required', 
            'fecha' => 'required'           
        ]);
        
        $consulta = App\Consulta::findorfail($id);

        $consulta->update($request->all());

        return redirect()->route('consulta.index')
                ->with('exito', 'se ha modificado la consulta correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-consulta'))
        {
            return redirect()->route('consulta.index');
        }

        $consulta = App\Consulta::findorfail($id);

        $consulta->delete();

        return redirect()->route('consulta.index')
                ->with('exito', 'se ha eliminado la consulta correctamente');
    }
}
