<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Obtén los mensajes de cumpleaños (ajusta esto según tu lógica)
        
        $mensajes = Mensaje::with('user')->orderBy('id', 'desc')->get();

        // Pasa la variable $mensajes a la vista
        return view('cumpleaños.index', compact('mensajes'));
    }

    public function create()
    {
        return view('cumpleaños.mensaje.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required',
        ]);

        Mensaje::create([
            'contenido' => $request->input('contenido'),
        ]);

        return redirect()->route('cumpleaños.index')->with('success', 'Mensaje de cumpleaños guardado correctamente.');
    }

    public function edit($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        return view('cumpleaños.mensaje.edit', compact('mensaje'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contenido' => 'required',
        ]);

        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update([
            'contenido' => $request->input('contenido'),
        ]);

        return redirect()->route('cumpleaños.index');
    }

    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();
        return redirect()->back()->with('success', 'Mensaje eliminado correctamente.');
    }

    public function enviarFelicitacion(Request $request, $id) {
        $mensaje = $request->input('mensaje');
        // Aquí puedes guardar el mensaje de felicitación en la base de datos si lo deseas
        return response()->json(['success' => true]);
    }


    public function obtenerMensajes($id) {
        $mensajes = Mensaje::where('user_id', $id)->get();
        return view('cumpleaños.mensaje', compact('mensajes'));
    }
    public function vaciar()
    {
        Mensaje::truncate(); // Esto eliminará todos los registros de la tabla 'mensajes'
        return redirect()->route('cumpleaños.index')->with('success', 'Todos los mensajes de cumpleaños han sido eliminados.');
    }
}
