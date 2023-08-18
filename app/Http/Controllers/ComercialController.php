<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercial;
use Illuminate\Support\Facades\Storage;

class ComercialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comercials = Comercial::all(); // Corregido: Cambiar "$comercial" a "$comerciales"
        return view('comercial.index')->with('comercials', $comercials); // Corregido: Cambiar "$comercial" a "$comerciales"
    }

    public function create()
    {
        return view('comercial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $comercials = new Comercial();
        $comercials->area = $request->get('area');
        $comercials->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $comercials->imagen = $rutaImagen;
        }

        $comercials->save();

        return redirect('/comercials');
    }

    public function show($id)
    {
        
    }

    public function getB64Image($base64_image){  
        // Obtener el String base-64 de los datos         
        $image_service_str = substr($base64_image, strpos($base64_image, ",")+1);
        // Decodificar ese string y devolver los datos de la imagen        
        $image = base64_decode($image_service_str);   
        // Retornamos el string decodificado
        return $image; 
   }

    public function edit($id)
    {
        $comercials = Comercial::find($id);
        return view('comercial.edit')->with('comercials', $comercials);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $comercials = Comercial::find($id);
        $comercials->area = $request->get('area');
        $comercials->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($comercials->imagen) {
                Storage::delete($comercials->imagen);
            }

            $comercials->imagen = $rutaImagen;
        }

        $comercials->save();

        return redirect('/comercials');
    }

    public function destroy($id)
    {
        $comercial = Comercial::find($id);

        // Eliminar la imagen si existe
        if ($comercial->imagen) {
            Storage::delete($comercial->imagen);
        }

        $comercial->delete();

        return redirect('/comercials');
    }
}