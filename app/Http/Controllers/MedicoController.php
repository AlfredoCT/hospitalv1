<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = App\Medico::orderby('nombre', 'asc')->get();
        return view('medico.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-medico'))
        {
            return redirect()->route('medico.index');
        }
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        return view('medico.insert', compact('hospitales'));
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
            'idhospital' => 'required',
            'cedula' => 'required',
            'nombre' => 'required',
            'especialidad' => 'required'                 
        ]);

        App\Medico::create($request->all());      
        
        return redirect()->route('medico.index')
                ->with('exito', 'Se agrego un medico con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = App\Medico::join('hospitals', 'medicos.idhospital', 'hospitals.id')
                            ->select('medicos.*', 'hospitals.nombre as hospital')
                            ->where('medicos.id', $id)
                            ->first();
        
        return view('medico.view', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-medico'))
        {
            return redirect()->route('medico.index');
        }

        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        $medico = App\Medico::findorfail($id);

        return view('medico.edit', compact('medico', 'hospitales'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idhospital' => 'required',   
            'cedula' => 'required',
            'nombre' => 'required',
            'especialidad' => 'required',          
        ]);
        
        $medico = App\Medico::findorfail($id);

        $medico->update($request->all());

        return redirect()->route('medico.index')
                ->with('exito', 'Cambios guardados con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-medico'))
        {
            return redirect()->route('medico.index');
        }

        $medico = App\Medico::findorfail($id);

        $medico->delete();

        return redirect()->route('medico.index')
                ->with('exito', 'Medico eliminado con exito');
    }
}
