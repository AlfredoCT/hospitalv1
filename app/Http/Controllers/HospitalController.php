<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        return view('hospital.index', compact('hospitales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-hospital'))
        {
            return redirect()->route('hospital.index');
        }
        return view('hospital.insert');
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
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ncamas' => 'required'
        ]);

        App\Hospital::create($request->all());      
        
        return redirect()->route('hospital.index')
                ->with('exito', 'se creo un hospital con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = App\Hospital::findorfail($id);
        
        return view('hospital.view', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-hospital'))
        {
            return redirect()->route('hospital.index');
        }
        $hospital = App\Hospital::findorfail($id);

        return view('hospital.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ncamas' => 'required'
        ]);
        
        $hospital = App\Hospital::findorfail($id);

        $hospital->update($request->all());

        return redirect()->route('hospital.index')
                ->with('exito', 'Los cambios se realizaron con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-hospital'))
        {
            return redirect()->route('hospital.index');
        }

        $hospital = App\Hospital::findorfail($id);

        $hospital->delete();

        return redirect()->route('hospital.index')
                ->with('exito', 'Hospital Eliminado');
    }
}
