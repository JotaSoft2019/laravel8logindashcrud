<?php

namespace App\Http\Controllers;
use App\Models\Talento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TalentoController extends Controller
{
    public function index()
    {

        $archivos = Talento::all();
        return view('talentoG.index', compact('archivos'));
    }

    public function create()
    {
        $archivos = Talento::all();
        return view('talentoG.create', compact('archivos'));
        
    }
    public function store(Request $request)
{
    
    if ($request->hasFile('urlpdf') && $request->file('urlpdf')->getClientOriginalExtension() === 'pdf') {
        $file = $request->file('urlpdf');

        $nombreArchivo = "pdf_" . time() . "." . $file->getClientOriginalExtension();

        
        $rutaArchivo = $file->storeAs('pdf', $nombreArchivo, 'public');

        
        $archivo = new Talento();
        $archivo->titulo = $request->input('titulo'); 
        $archivo->urlpdf = $rutaArchivo;
        $archivo->text = $request->input('text');

        $archivo->save();

        return redirect()->route('talento.index');
    } else {
        return redirect()->back()->with('error', 'Por favor, sube un archivo PDF válido.');
    }
}
    public function show($id)
    {
        
        $archivo = Talento::find($id);
    
        if ($archivo) {
           
            $rutaArchivo = public_path('pdf/' . $archivo->urlpdf);
    
           
            if (file_exists($rutaArchivo)) {
                
                return response()->file($rutaArchivo);
            } else {
                return "El archivo PDF no se encontró.";
            }
        } else {
            return "No se encontró ningún archivo asociado a ese ID.";
        }
    }

    public function download()
{
    
    $archivo = Talento::latest()->first();

    if ($archivo) {
        
        $rutaArchivo = public_path('pdf/' . $archivo->urlpdf);

        
        if (file_exists($rutaArchivo)) {
            
            return response()->download($rutaArchivo);
        } else {
            return "El archivo PDF no se encontró.";
        }
    } else {
        return "No hay archivos disponibles para descargar.";
    }
}

public function destroy($id)
{
    $archivo = Talento::find($id);
    if ($archivo) {
        Storage::delete('public/' . $archivo->urlpdf);
        $archivo->delete();
        return redirect()->route('seguridadYSalud.index')->with('success', 'Archivo PDF eliminado exitosamente.');
    } else {
        return redirect()->route('seguridadYSalud.index')->with('error', 'No se encontró el archivo PDF.');
    }
}

public function update(Request $request, $id)
{
    $archivo = Talento::find($id);

    if (!$archivo) {
        return redirect()->back()->with('error', 'El archivo no existe.');
    }

    if ($request->hasFile('urlpdf') && $request->file('urlpdf')->getClientOriginalExtension() === 'pdf') {
        $file = $request->file('urlpdf');

        // Genera un nombre único para el archivo
        $nombreArchivo = "pdf_" . time() . "." . $file->getClientOriginalExtension();

        // Guarda el archivo en la carpeta 'pdf' dentro del disco público
        $rutaArchivo = $file->storeAs('pdf', $nombreArchivo, 'public');

        // Actualiza los datos del archivo en la base de datos
        $archivo->titulo = $request->input('titulo'); 
        $archivo->urlpdf = $rutaArchivo;
        $archivo->text = $request->input('text');

        $archivo->save();

        return redirect()->route('talento.index');
    } else {
        return redirect()->back()->with('error', 'Por favor, sube un archivo PDF válido.');
    }
}

public function edit($id)
{
    // Obtén el registro de la base de datos según el ID proporcionado
    $archivo = Talento::find($id);

    if ($archivo) {
        // Muestra el formulario de edición, pasando el registro a la vista
        return view('talentoG.edit', compact('archivo'));
    } else {
        // Redirige de vuelta con un mensaje de error si el registro no se encuentra
        return redirect()->route('talento.index')->with('error', 'El archivo no existe.');
    }
}
}
