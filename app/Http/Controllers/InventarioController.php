<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inventarios = Inventario::all(); 
        return view('sistemas.index')->with('inventarios', $inventarios); 
    }

    public function create()
    {
        return view('sistemas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $inventarios = new Inventario();
        $inventarios->area = $request->get('area');
        $inventarios->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');
            $inventarios->imagen = $rutaImagen;
        }

        $inventarios->save();

        return redirect('/inventario');
    }

    public function show($id)
    {
        // Aquí puedes implementar la lógica para mostrar detalles específicos si lo deseas
    }

    public function edit($id)
    {
        $inventarios = Inventario::find($id);
        return view('sistemas.edit')->with('inventarios', $inventarios);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'lema' => 'required',
        ]);

        $inventarios = Inventario::find($id);
        $inventarios->area = $request->get('area');
        $inventarios->lema = $request->get('lema');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('public/imagen');

            // Eliminar la imagen anterior si existe
            if ($inventarios->imagen) {
                Storage::delete($inventarios->imagen);
            }

            $inventarios->imagen = $rutaImagen;
        }

        $inventarios->save();

        return redirect('/inventario');
    }

    public function destroy($id)
    {
        $inventario = Inventario::find($id);

        // Eliminar la imagen si existe
        if ($inventario->imagen) {
            Storage::delete($inventario->imagen);
        }

        $inventario->delete();
        return redirect('/inventario');
    }
}
