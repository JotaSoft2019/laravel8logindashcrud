<?php

namespace App\Http\Controllers;
use App\Models\ComprasNacionales;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ComprasNacionalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $compras = ComprasNacionales::all(); 
        return view('compras.index')->with('compras', $compras); 
    }

    public function create()
    {
        return view('compras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $compras = new ComprasNacionales();
        $compras->area = $request->get('area');
        $compras->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $compras->imagen = $rutaImagen;
        }

        $compras->save();

        return redirect('/compras');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $compras = ComprasNacionales::find($id);
        return view('compras.edit')->with('compras', $compras);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $compras = ComprasNacionales::find($id);
        $compras->area = $request->get('area');
        $compras->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($compras->imagen) {
                Storage::delete($compras->imagen);
            }

            $compras->imagen = $rutaImagen;
        }

        $compras->save();

        return redirect('/compras');
    }

    public function destroy($id)
    {
        $compras = ComprasNacionales::find($id);

        // Eliminar la imagen si existe
        if ($compras->imagen) {
            Storage::delete($compras->imagen);
        }

        $compras->delete();
        return redirect('/compras');
    }
}