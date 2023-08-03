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
        
        $calendario = Calendario::all(); // Corregido: Cambiar "$comercial" a "$comerciales"
        return view('calendario.index')->with('calendario', $calendario); // Corregido: Cambiar "$comercial" a "$comerciales"
    }

  

    public function store(Request $request)
    {

        $calendario = new Calendario(); 
   
    $calendario->campo1 = $request->input('campo1');
    $calendario->campo2 = $request->input('campo2');
   
    $calendario->save();

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