<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Calendario;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
{
    $events = array();
    $calendarios = Calendario::all();

foreach ($calendarios as $calendario) {
    $events[] = [
        'id' => $calendario->id,
        'title' => $calendario->title,
        'start' => $calendario->start_date,
        'end' => $calendario->end_date,
        'color' => $calendario->color 
    ];
}

return view('calendario.index', ['events' => $events]);
}

  
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'color' => 'required|string' ,
    ]);
    
    $calendario = Calendario::create([
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'color' => $request->color, 
    ]);
    
    return response()->json([
        'id' => $calendario->id,  
        'title' => $calendario->title,
        'start' => $calendario->start_date,
        'end' => $calendario->end_date,
        'color' => $calendario->color,

    ]);
}

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function update(Request $request, $id)
    {
        $calendario = Calendario::find($id);
        if (! $calendario) {
            return response()->json([
                'error' => 'No se puede localizar el evento'
            ],404);
        }

        $calendario->update([
            'start_date' => $request->start_date,
            'end_date'=>$request->end_date,
        ]);

        return response()->json('Evento Actualizado');
    }

    public function destroy($id)
    {
        $calendario = Calendario::find($id);
        if(! $calendario) {
            return response()->json([
                'error' => 'No se pudo eliminar el evento'
            ], 404);
        }
        $calendario->delete();
        return $id;
    }
}