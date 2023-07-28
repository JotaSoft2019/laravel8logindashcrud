<?php

namespace App\Http\Controllers;
use App\Models\Gerencia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gerencias = Gerencia::all(); 
        return view('gerencia.index')->with('gerencias', $gerencias); 
    }

    public function create()
    {
        return view('gerencia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $gerencias = new Gerencia();
        $gerencias->area = $request->get('area');
        $gerencias->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $gerencias->imagen = $rutaImagen;
        }

        $gerencias->save();

        return redirect('/gerencia');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $gerencias = Gerencia::find($id);
        return view('gerencia.edit')->with('gerencias', $gerencias);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $gerencias = Gerencia::find($id);
        $gerencias->area = $request->get('area');
        $gerencias->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($gerencias->imagen) {
                Storage::delete($gerencias->imagen);
            }

            $gerencias->imagen = $rutaImagen;
        }

        $gerencias->save();

        return redirect('/gerencia');
    }

    public function destroy($id)
    {
        $gerencias = Gerencia::find($id);

        // Eliminar la imagen si existe
        if ($gerencias->imagen) {
            Storage::delete($gerencias->imagen);
        }

        $gerencias->delete();
        return redirect('/gerencias');
    }
}
