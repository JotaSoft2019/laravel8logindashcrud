<?php

namespace App\Http\Controllers;
use App\Models\SeguridadTrabajo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SeguridadTrabajoController extends Controller
{
    public function index()
    {

        $archivo = SeguridadTrabajo::latest()->first();
        return view('seguridadYSalud.index', compact('archivo'));
    }

    public function create()
    {
        $archivo = SeguridadTrabajo::latest()->first();
        return view('seguridadYSalud.create', compact('archivo'));
        
    }

    public function store(Request $request)
{
    if ($request->hasFile('urlpdf') && $request->file('urlpdf')->getClientOriginalExtension() === 'pdf') {
        $file = $request->file('urlpdf');

        $nombreArchivo = "pdf_" . time() . "." . $file->getClientOriginalExtension();

        $rutaArchivo = $file->storeAs('pdf', $nombreArchivo, 'public');

        $archivo = new SeguridadTrabajo();
        $archivo->urlpdf = $rutaArchivo;
        $archivo->save();

        return redirect()->route('seguridadYSalud.index', $archivo->id);
    } else {
        return redirect()->back()->with('error', 'Por favor, sube un archivo PDF válido.');
    }
}
    public function show($id)
    {
        
        $archivo = SeguridadTrabajo::find($id);
    
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
    
    $archivo = SeguridadTrabajo::latest()->first();

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
}