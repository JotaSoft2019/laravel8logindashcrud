<?php

namespace App\Http\Controllers;

use App\Models\Mercadeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MercadeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mercadeos = Mercadeo::all();
        return view('mercadeo.index', compact('mercadeos'));
    }

    public function create()
    {
        return view('mercadeo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:30720',
            'lema' => 'required',
        ]);

        $mercadeos = new Mercadeo();
        $mercadeos->area = $request->input('area');
        $mercadeos->lema = $request->input('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($mercadeos->imagen) {
                Storage::delete($mercadeos->imagen);
            }

            $mercadeos->imagen = $rutaImagen;
        }

        $mercadeos->save();

        return redirect('/mercadeo')->with('success', 'Registro creado exitosamente.');
    }

    public function show($id)
    {
        $mercadeo = Mercadeo::find($id);
        return view('mercadeo.show', compact('mercadeo'));
    }

    public function edit($id)
    {
        $mercadeo = Mercadeo::find($id);
        return view('mercadeo.edit', compact('mercadeo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:30720',
            'lema' => 'required',
        ]);

        $mercadeo = Mercadeo::find($id);
        $mercadeo->area = $request->input('area');
        $mercadeo->lema = $request->input('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($mercadeo->imagen) {
                Storage::delete($mercadeo->imagen);
            }

            $mercadeo->imagen = $rutaImagen;
        }

        $mercadeo->save();

        return redirect('/mercadeo')->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $mercadeo = Mercadeo::find($id);

        // Eliminar la imagen si existe
        if ($mercadeo->imagen) {
            Storage::delete($mercadeo->imagen);
        }

        $mercadeo->delete();

        return redirect('/mercadeo')->with('success', 'Registro eliminado exitosamente.');
    }
}
