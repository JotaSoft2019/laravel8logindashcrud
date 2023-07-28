<?php

namespace App\Http\Controllers;
use App\Models\Comex;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ComexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comexs = Comex::all(); 
        return view('comex.index')->with('comexs', $comexs); 
    }

    public function create()
    {
        return view('comex.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $comexs = new Comex();
        $comexs->area = $request->get('area');
        $comexs->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $comexs->imagen = $rutaImagen;
        }

        $comexs->save();

        return redirect('/comex');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $comexs = Comex::find($id);
        return view('comex.edit')->with('comexs', $comexs);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $comexs = Comex::find($id);
        $comexs->area = $request->get('area');
        $comexs->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($comexs->imagen) {
                Storage::delete($comexs->imagen);
            }

            $comexs->imagen = $rutaImagen;
        }

        $comexs->save();

        return redirect('/comex');
    }

    public function destroy($id)
    {
        $comexs = Comex::find($id);

        // Eliminar la imagen si existe
        if ($comexs->imagen) {
            Storage::delete($compras->imagen);
        }

        $comexs->delete();
        return redirect('/comex');
    }
}
