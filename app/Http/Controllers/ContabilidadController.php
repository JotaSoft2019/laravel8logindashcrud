<?php

namespace App\Http\Controllers;
use App\Models\Contabilidad;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ContabilidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contabilidads = Contabilidad::all(); 
        return view('contabilidad.index')->with('contabilidads', $contabilidads); 
    }

    public function create()
    {
        return view('contabilidad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $contabilidads = new Contabilidad();
        $contabilidads->area = $request->get('area');
        $contabilidads->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $contabilidads->imagen = $rutaImagen;
        }

        $contabilidads->save();

        return redirect('/contabilidads');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $contabilidads = Contabilidad::find($id);
        return view('contabilidad.edit')->with('contabilidads', $contabilidads);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $contabilidads = Contabilidad::find($id);
        $contabilidads->area = $request->get('area');
        $contabilidads->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($contabilidads->imagen) {
                Storage::delete($contabilidads->imagen);
            }

            $contabilidads->imagen = $rutaImagen;
        }

        $contabilidads->save();

        return redirect('/contabilidads');
    }

    public function destroy($id)
    {
        $contabilidad = Contabilidad::find($id);

        // Eliminar la imagen si existe
        if ($contabilidad->imagen) {
            Storage::delete($contabilidad->imagen);
        }

        $contabilidad->delete();
        return redirect('/contabilidads');
    }
}
