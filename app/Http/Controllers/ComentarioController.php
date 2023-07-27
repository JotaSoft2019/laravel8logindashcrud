<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $comentarios = Comentario::all();
        return view('comercial.comentario.index', compact('comentarios'));
    }

    public function create()
    {
        return view('comercial.comentario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required',
        ]);

        Comentario::create([
            'contenido' => $request->input('contenido'),
        ]);

        return redirect()->route('comercials.index');
    }

    public function show($id)
    {
        // Implement logic to show specific details if needed
    }

    public function edit($id)
    {
        $comentario = Comentario::findOrFail($id);
        return view('comercial.comentario.edit', compact('comentario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contenido' => 'required',
        ]);

        $comentario = Comentario::findOrFail($id);
        $comentario->update([
            'contenido' => $request->input('contenido'),
        ]);

        return redirect()->route('comercials.index');
    }

    public function destroy($id)
    {

        
         
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');

        return redirect()->route('comercials.index');
    }
}