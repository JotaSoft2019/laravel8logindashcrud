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
        'title' => $calendario->title,
        'start' =>$calendario->start_date,
        'end' => $calendario->end_date,
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

    return response()->json($calendario);
    
}

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

 


    public function destroy($id)
    {
        return $id;
    }
}