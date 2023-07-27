<?php

namespace App\Http\Controllers;
use App\Models\TalentoHumano;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TalentoHumanoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $talentosHumanos = TalentoHumano::all(); 
        return view('talento.index')->with('talentosHumanos', $talentosHumanos); 
    }

    public function create()
    {
        return view('talento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $talentosHumanos = new TalentoHumano();
        $talentosHumanos->area = $request->get('area');
        $talentosHumanos->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $talentosHumanos->imagen = $rutaImagen;
        }

        $talentosHumanos->save();

        return redirect('/talentoHumano');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $talentosHumanos = TalentoHumano::find($id);
        return view('talento.edit')->with('talentosHumanos', $talentosHumanos);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $talentosHumanos = TalentoHumano::find($id);
        $talentosHumanos->area = $request->get('area');
        $talentosHumanos->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($talentosHumanos->imagen) {
                Storage::delete($talentosHumanos->imagen);
            }

            $talentosHumanos->imagen = $rutaImagen;
        }

        $talentosHumanos->save();

        return redirect('/talentoHumano');
    }

    public function destroy($id)
    {
        $talentoHumano = TalentoHumano::find($id);

        // Eliminar la imagen si existe
        if ($talentoHumano->imagen) {
            Storage::delete($talentoHumano->imagen);
        }

        $talentoHumano->delete();
        return redirect('/talentoHumano');
    }
}
