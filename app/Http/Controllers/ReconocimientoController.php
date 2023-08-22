<?php

namespace App\Http\Controllers;
use App\Models\Reconocimiento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reconocimientos = Reconocimiento::all(); 
        return view('reconocimientos.index')->with('reconocimientos', $reconocimientos); 
    }

    public function create()
    {
        return view('reconocimientos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'descripcion' => 'required',
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $reconocimientos = new Reconocimiento();
        $reconocimientos->nombre = $request->get('nombre');
        $reconocimientos->fecha = $request->get('fecha');
        $reconocimientos->descripcion = $request->get('descripcion');
        $reconocimientos->area = $request->get('area');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $reconocimientos->imagen = $rutaImagen;
        }

        $reconocimientos->save();

        return redirect('/reconocimientos');
    }
    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $reconocimientos = Reconocimiento::find($id);
        return view('reconocimientos.edit')->with('reconocimientos', $reconocimientos);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'descripcion' => 'required',
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $reconocimientos = Reconocimiento::find($id);
        $reconocimientos->nombre = $request->get('nombre');
        $reconocimientos->fecha = $request->get('fecha');
        $reconocimientos->descripcion = $request->get('descripcion');
        $reconocimientos->area = $request->get('area');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($reconocimientos->imagen) {
                Storage::delete($reconocimientos->imagen);
            }

            $reconocimientos->imagen = $rutaImagen;
        }

        $reconocimientos->save();

        return redirect('/reconocimientos');
    }

    public function destroy($id)
    {
        $reconocimiento = Reconocimiento::find($id);

        // Eliminar la imagen si existe
        if ($reconocimiento->imagen) {
            Storage::delete($reconocimiento->imagen);
        }

        $reconocimiento->delete();
        return redirect('/reconocimientos');
    }
}
