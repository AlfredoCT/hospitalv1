<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-paciente'))
        {
            return redirect()->route('paciente.index');
        }
        $salas = App\Sala::orderby('nombre', 'asc')->get();
        return view('paciente.insert', compact('salas'));
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
            'idsala' => 'required',
            'cedula' => 'required',
            'registro' => 'required',
            'cama' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'nacimiento' => 'required',
            'sexo' => 'required'
             
            ]);

            App\Paciente::create($request->all());      
            
            return redirect()->route('paciente.index')
                    ->with('exito', 'paciente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = App\Paciente::join('salas', 'pacientes.idsala', 'salas.id')
        ->select('pacientes.*', 'salas.nombre as salas')
        ->where('pacientes.id', $id)
        ->first();

        return view('paciente.view', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-paciente'))
        {
            return redirect()->route('paciente.index');
        }

        $salas = App\Sala::orderby('nombre', 'asc')->get();
        $paciente = App\Paciente::findorfail($id);

        return view('paciente.edit', compact('paciente', 'salas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idsala' => 'required'  ,
            'cedula' => 'required',
            'registro' => 'required',
            'cama' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'nacimiento' => 'required',
            'sexo' => 'required'           
        ]);
        
        $paciente = App\Paciente::findorfail($id);

        $paciente->update($request->all());

        return redirect()->route('paciente.index')
                ->with('exito', 'se ha modificado el paciente exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-paciente'))
        {
            return redirect()->route('paciente.index');
        }

        $paciente = App\Paciente::findorfail($id);

        $paciente->delete();

        return redirect()->route('paciente.index')
                ->with('exito', 'se elimino el paciente correctamente');
    }
}
