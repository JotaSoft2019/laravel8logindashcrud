<?php

namespace App\Http\Controllers;
use App\Models\Logistica;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LogisticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logisticas = Logistica::all(); 
        return view('logistica.index')->with('logisticas', $logisticas); 
    }

    public function create()
    {
        return view('logistica.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $logisticas = new Logistica();
        $logisticas->area = $request->get('area');
        $logisticas->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $logisticas->imagen = $rutaImagen;
        }

        $logisticas->save();

        return redirect('/logistica');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $logisticas = Logistica::find($id);
        return view('logistica.edit')->with('logisticas', $logisticas);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $logisticas = Logistica::find($id);
        $logisticas->area = $request->get('area');
        $logisticas->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($logisticas->imagen) {
                Storage::delete($logisticas->imagen);
            }

            $logisticas->imagen = $rutaImagen;
        }

        $logisticas->save();

        return redirect('/logistica');
    }

    public function destroy($id)
    {
        $logistica = Logistica::find($id);

        // Eliminar la imagen si existe
        if ($logistica->imagen) {
            Storage::delete($logistica->imagen);
        }

        $logistica->delete();
        return redirect('/logistica');
    }
}
