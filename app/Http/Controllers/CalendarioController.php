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
        'descripcion' => $calendario->descripcion,
        'start' =>$calendario->start_date,
        'end' => $calendario->end_date,
        ];
    }

    return view('calendario.index',['events'=>$events]);
}

  
public function store(Request $request)
{
    $request->validate([
        'campo1' => 'required',
        'campo2' => 'required',
        // Agregar otras reglas de validación para otros campos si es necesario
    ]);

    $calendarios = new Calendario();
    $calendarios->campo1 = $request->input('campo1');
    $calendarios->campo2 = $request->input('campo2');
    
    $calendarios->save();

    return redirect('/calendario');
}

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

 


    public function destroy($id)
    {
        $comercial = Comercial::find($id);

        // Eliminar la imagen si existe
        if ($comercial->imagen) {
            Storage::delete($comercial->imagen);
        }

        $comercial->delete();

        return redirect('/comercials');
    }
}