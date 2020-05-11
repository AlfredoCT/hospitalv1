<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = App\Sala::orderby('nombre', 'asc')->get();
        return view('sala.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-sala'))
        {
            return redirect()->route('sala.index');
        }
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        return view('sala.create', compact('hospitales'));
        //return view('sala.insert', compact('hospitales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax())
        {
            App\Sala::create($request->all());
            return response()->json([
                'mensaje' => 'creado'
            ]);
        }

        /*$request->validate([
            'idhospital' => 'required',
            'codigo' => 'required',
            'nombre' => 'required',
            'ncamas' => 'required',
        ]);

        App\Sala::create($request->all());

        return redirect()->route('sala.index')
                ->with('exito', 'Sala creada con exito');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = App\Sala::join('hospitals', 'salas.idhospital', 'hospitals.id')
                            ->select('salas.*', 'hospitals.nombre as hospital')
                            ->where('salas.id', $id)
                            ->first();

        return view('sala.view', compact('sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-sala'))
        {
            return redirect()->route('sala.index');
        }

        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        $sala = App\Sala::findorfail($id);

        return view('sala.edit', compact('sala', 'hospitales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idhospital' => 'required',
            'codigo' => 'required',
            'nombre' => 'required',
            'ncamas' => 'required',
        ]);

        $sala = App\Sala::findorfail($id);

        $sala->update($request->all());

        return redirect()->route('sala.index')
                ->with('exito', 'Cambios guardados con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-sala'))
        {
            return redirect()->route('sala.index');
        }

        $sala = App\Sala::findorfail($id);

        $sala->delete();

        return redirect()->route('sala.index')
                ->with('exito', 'Sala eliminada');
    }
}
