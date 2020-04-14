<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = App\Detalle::orderby('descripcion', 'asc')->get();
        return view('detalle.ver', compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-detalle'))
        {
            return redirect()->route('detalle.ver');
        }
        $laboratorios = App\Laboratorio::orderby('nombre', 'asc')->get();
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        return view('detalle.crear', compact('hospitales', 'laboratorios'));
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
            'idlaboratorio' => 'required',
            'idhospital' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required'

        ]);

        App\Detalle::create($request->all());      
        
        return redirect()->route('detalle.ver')
                ->with('exito', 'se creo el detalle exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = App\Detalle::join('laboratorios', 'hospitals', 'detalles.idlaboratorio', 'detalles.idhospital', 'laboratorios.id', 'hospitals.id')
                                ->select('detalles.*', 'laboratorios.nombre as laboratorio', 'hospitals.nombre as hospital')
                                ->where('detalles.id', $id)
                                ->first();                             
        
        return view('detalle.detalle', compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-detalle'))
        {
            return redirect()->route('detalle.ver');
        }

        $laboratorios = App\Laboratorio::orderby('nombre', 'asc')->get();
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        $detalle = App\Detalle::findorfail($id);

        return view('detalle.editar', compact('detalle', 'laboratorios', 'hospitales'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idlaboratorio' => 'required',
            'idhospital' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required'      
        ]);
        
        $detalle = App\Detalle::findorfail($id);

        $detalle->update($request->all());

        return redirect()->route('detalle.ver')
                ->with('exito', 'se modifico el detalle exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-detalle'))
        {
            return redirect()->route('detalle.ver');
        }

        $detalle = App\Detalle::findorfail($id);

        $detalle->delete();

        return redirect()->route('detalle.ver')
                ->with('exito', 'se elimino el detalle con exito');
    }
}
