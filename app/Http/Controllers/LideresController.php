<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lideres;
use Illuminate\Support\Facades\Storage; // Importa la clase Storage

class LideresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lideres = Lideres::all();
        return view('lideres.index')->with('lideres', $lideres);
    }

    public function create()
    {
        return view('lideres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $lideres = new Lideres();
        $lideres->nombre = $request->get('nombre');
        $lideres->apellido = $request->get('apellido');
        $lideres->area = $request->get('area');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $lideres->imagen = $rutaImagen;
        }

        $lideres->save();

        return redirect('/lideres');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lideres = Lideres::find($id);
        return view('lideres.edit')->with('lideres', $lideres);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $lideres = Lideres::find($id);
        $lideres->nombre = $request->get('nombre');
        $lideres->apellido = $request->get('apellido');
        $lideres->area = $request->get('area');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

           
            if ($lideres->imagen) {
                Storage::delete($lideres->imagen);
            }

            $lideres->imagen = $rutaImagen;
        }

        $lideres->save();

        return redirect('/lideres');
    }

    public function destroy($id)
    {
        $lideres = Lideres::find($id);

        // Eliminar la imagen si existe
        if ($lideres->imagen) {
            Storage::delete($lideres->imagen);
        }

        $lideres->delete();
        return redirect('/lideres');
    }
}