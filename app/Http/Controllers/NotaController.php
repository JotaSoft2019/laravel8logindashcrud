<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $events = array();
    $notas = Nota::all();
    $notas = $request->session()->get('notas', []);
    return view('calendario.index', compact('notas'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendario.nota.create');
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
        'title' => 'required',
        'descripcion' => 'required',
        'color' => 'required',
    ]);

    $nota = Nota::create([
        'title' => $request->input('title'),
        'descripcion' => $request->input('descripcion'),
        'color' => $request->input('color'),
    ]);

    $notas = $request->session()->get('notas', []);
    $notas[] = $nota; 
    $request->session()->put('notas', $notas);
    return redirect()->route('calendario.index');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return view('calendario.nota.edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'descripcion' => 'required',
            'color' => 'required',
        ]);

        $nota = Nota::findOrFail($id);
        $nota->update([
            'title' => $request->input('title'),
            'descripcion' => $request->input('descripcion'),
            'color' => $request->input('color'),
        ]);

        return redirect()->route('calendario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::find($id);
        if(! $nota) {
            return response()->json([
                'error' => 'No se pudo eliminar la nota'
            ], 404);
        }
        $nota->delete();
        return $id;
    }
}
