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
        // Aquí obtén las recomendaciones de salud desde tu base de datos
        $recomendaciones = [
            "Bebe suficiente agua durante el día.",
            "Realiza ejercicio regularmente.",
            "Come una dieta equilibrada.",
            "Duerme al menos 7-8 horas por noche."

        ];
        $recomendacion = $recomendaciones[array_rand($recomendaciones)];
       
        return view('recomendaciones.index', compact('recomendacion'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recomendaciones.agregarRecomendaciones');
    }

    public function store(Request $request)
    {
        // Valida el formulario
        $request->validate([
            'text' => 'required',
        ]);
    
        // Crea una nueva recomendación en la base de datos
        $nuevaRecomendacion = new Recomendacion();
        $nuevaRecomendacion->text = $request->input('text');
        $nuevaRecomendacion->save();
    
        // También puedes guardar la recomendación dinámica en la base de datos si lo deseas
        $recomendacionDinamica = new Recomendacion();
        $recomendacionDinamica->texto = $request->input('recomendacion_dinamica');
        $recomendacionDinamica->save();
    
        return redirect('/')->with('success', 'Recomendación agregada correctamente.');
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
}
