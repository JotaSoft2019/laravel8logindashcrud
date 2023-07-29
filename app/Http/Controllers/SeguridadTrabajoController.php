<?php

namespace App\Http\Controllers;

use App\Models\SeguridadTrabajo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SeguridadTrabajoController extends Controller
{
    public function index()
    {
        return view('seguridadYSalud.index');
    }

    public function create()
    {
        return view('seguridadYSalud.create');
    }

    public function store(Request $request)
    {

          
        if ($request->hasFile('urlpdf') && $request->file('urlpdf')->getClientOriginalExtension() === 'pdf') {
            $file = $request->file('urlpdf');
            $nombre = "pdf_" . time() . "." . $file->getClientOriginalExtension();

            // Store the file in the 'pdf' directory inside the 'public' disk
            $ruta = $file->storeAs('pdf', $nombre, 'public');

            // Save the file path in the database
            SeguridadTrabajo::create([
                'urlpdf' => $ruta,
            ]);

            return "Archivo PDF subido exitosamente.";
        } else {
            return "Por favor, sube un archivo PDF válido.";
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

   
}
