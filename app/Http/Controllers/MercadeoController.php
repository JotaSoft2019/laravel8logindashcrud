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
        return view('mercadeo.index')->with('mercadeos', $mercadeos);
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
            $mercadeos->imagen = $rutaImagen;
        }

        $mercadeos->save();

        return redirect('/mercadeo');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $mercadeos = Mercadeo::find($id);
        return view('mercadeo.edit')->with('mercadeos', $mercadeos);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:30720',
            'lema' => 'required',
        ]);

        $mercadeos = Mercadeo::find($id);
        $mercadeos->area = $request->input('area');
        $mercadeos->lema = $request->input('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            if ($mercadeos->imagen) {
                Storage::delete($mercadeos->imagen);
            }

            $mercadeos->imagen = $rutaImagen;
        }

        $mercadeos->save();

        return redirect('/mercadeo');
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
