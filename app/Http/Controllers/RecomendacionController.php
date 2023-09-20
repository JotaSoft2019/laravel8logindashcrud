<?php

namespace App\Http\Controllers;
use App\Models\Recomendacion;
use Illuminate\Http\Request;

class RecomendacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recupera todas las recomendaciones de la base de datos
        $recomendaciones = Recomendacion::all();

        // Obtén una recomendación aleatoria
        $recomendacionAleatoria = $recomendaciones->random();

        return view('recomendaciones.index', compact('recomendacionAleatoria'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregaRecomendaciones.index');
    }

    public function store(Request $request)
    {
        // Valida el formulario
        $request->validate([
            'texto' => 'required', // Asegúrate de que 'text' coincida con el nombre del campo de entrada en tu formulario
        ]);

        // Crea una nueva recomendación en la base de datos
        $recomendaciones = new Recomendacion();
        $recomendaciones->texto = $request->input('texto');
        $recomendaciones->save();

        return redirect('recomendaciones')->with('success', 'Recomendación agregada correctamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getRandomRecommendation()
{
    $recomendacionAleatoria = Recomendacion::inRandomOrder()->first();

    return response()->json($recomendacionAleatoria);
}
}
