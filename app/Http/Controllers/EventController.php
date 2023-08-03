<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        return view('calendario.eventos.index', compact('events'));
    }

    public function create()
    {
        return view('calendario.eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        
        Event::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
            
        ]);

        return redirect()->route('calendario.index')->with('success', 'Evento creado correctamente');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('calendario.eventos.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
           
        ]);

        return redirect()->route('calendario.index')->with('success', 'Evento actualizado correctamente');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('calendario.index')->with('success', 'Evento eliminado correctamente');
    }
}