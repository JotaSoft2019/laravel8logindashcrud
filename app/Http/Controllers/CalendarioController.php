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
        $color = null;
        if ($calendario->title == 'Test'){
            $color = '##AED6F1';
           
        }
        $events[] = [
        'id' => $calendario->id,  
        'title' => $calendario->title,
        'start' =>$calendario->start_date,
        'end' => $calendario->end_date,
        'color' => $color
        ];
    }

    return view('calendario.index',['events'=>$events]);
}

  
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string'
    ]);

    $calendario = Calendario::create([
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    $color = null;

    if ($calendario->title == 'Test'){
        $color = '#FB1CEF';
       
    }

    return response()->json([
        'id' => $calendario->id,  
        'title' => $calendario->title,
        'start' =>$calendario->start_date,
        'end' => $calendario->end_date,
        'color' => $color ? $color: '',

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