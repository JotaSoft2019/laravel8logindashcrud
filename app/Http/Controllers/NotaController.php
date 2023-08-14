<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $notas = Nota::all();
        return view('calendario.index', compact('notas'));
    }

    public function create()
    {
        return view('calendario.nota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contenido' => 'required',
            'color'=>'required',
        ]);

        Nota::create([
            'title' => $request->input('title'),
            'contenido' => $request->input('contenido'),
            'color' => $request->input('color'),
        ]);

        return redirect()->route('calendario.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return view('calendario.nota.edit', compact('nota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'contenido' => 'required',
            'color'=>'required',
        ]);

        $nota = Nota::findOrFail($id);
        $nota->update([
            'title' => $request->input('title'),
            'contenido' => $request->input('contenido'),
            'color' => $request->input('color'),
        ]);

        return redirect()->route('calendario.index');
    }

    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();
        return redirect()->back()->with('success', 'La nota se elimino correctamente.');

        return redirect()->route('calendario.index');
    }
}