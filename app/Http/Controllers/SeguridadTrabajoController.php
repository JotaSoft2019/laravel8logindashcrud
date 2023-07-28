<?php

namespace App\Http\Controllers;
use App\Models\SeguridadTrabajo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SeguridadTrabajoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seguridads = SeguridadTrabajo::all();
        return view('seguridadYSalud.index')->with('seguridads', $seguridads);
    }

    public function create()
    {
        return view('seguridadYSalud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo' => 'required',
            'parrafo' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:2048', // Allow optional PDF upload
        ]);

        $seguridads = new SeguridadTrabajo();
        $seguridads->titulo = $request->input('titulo');
        $seguridads->parrafo = $request->input('parrafo');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('private/imagen'); // Asegura que las imágenes no sean accesibles públicamente
            $seguridads->imagen = $rutaImagen;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $rutaPDF = $pdf->store('private/pdf'); // Asegura que los archivos PDF no sean accesibles públicamente
            $seguridads->pdf = $rutaPDF;
        }

        $seguridads->save();

        return redirect('/seguridads')->with('success', 'Registro creado exitosamente!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo' => 'required',
            'parrafo' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:2048', // Allow optional PDF upload
        ]);

        $seguridadtrabajos = SeguridadTrabajo::find($id);
        $seguridadtrabajos->titulo = $request->input('titulo');
        $seguridadtrabajos->parrafo = $request->input('parrafo');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('private/imagen'); // Asegura que las imágenes no sean accesibles públicamente

            // Eliminar la imagen anterior si existe
            if ($seguridads->imagen) {
                Storage::delete($seguridads->imagen);
            }

            $seguridads->imagen = $rutaImagen;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $rutaPDF = $pdf->store('private/pdf'); // Asegura que los archivos PDF no sean accesibles públicamente

            // Eliminar el PDF anterior si existe
            if ($seguridads->pdf) {
                Storage::delete($seguridads->pdf);
            }

            $seguridads->pdf = $rutaPDF;
        }

        $seguridads->save();

        return redirect('/seguridads')->with('success', 'Registro actualizado exitosamente!');
    }

    public function edit($id)
    {
        $seguridads = SeguridadTrabajo::find($id);
        return view('seguridadYSalud.edit')->with('seguridads', $seguridads);
    }

    public function destroy($id)
    {
        $seguridads = SeguridadTrabajo::find($id);

        // Eliminar la imagen si existe
        if ($seguridads->imagen) {
            Storage::delete($seguridads->imagen);
        }

        // Eliminar el PDF si existe
        if ($seguridads->pdf) {
            Storage::delete($seguridads->pdf);
        }

        $seguridads->delete();
        return redirect('/seguridads');
    }
} 