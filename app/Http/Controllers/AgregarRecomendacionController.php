<?php

namespace App\Http\Controllers;
use App\Models\AgregarRecomendacion;
use Illuminate\Http\Request;

class AgregarRecomendacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Aquí puedes obtener las recomendaciones de salud desde tu base de datos
        $recomendaciones = [
            "Bebe suficiente agua durante el día.",
            "Realiza ejercicio regularmente.",
            "Come una dieta equilibrada.",
            "Duerme al menos 7-8 horas por noche."
        ];
        $recomendacion = $recomendaciones[array_rand($recomendaciones)];

        return view('agregaRecomendaciones.index', compact('recomendacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aquí puedes mostrar un formulario para crear una nueva recomendación si lo necesitas
        return view('agregaRecomendaciones.create');
    }

    public function store(Request $request)
    {
        // Valida el formulario
        $request->validate([
            'text' => 'required', // Asegúrate de que 'text' coincida con el nombre del campo de entrada en tu formulario
        ]);

        // Crea una nueva recomendación en la base de datos
        $recomendaciones = new AgregarRecomendacion();
        $recomendaciones->text = $request->input('text');
        $recomendaciones->save();

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
        // Puedes mostrar los detalles de una recomendación específica si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Aquí puedes mostrar un formulario para editar una recomendación si lo necesitas
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
        // Puedes implementar la lógica para actualizar una recomendación si es necesario
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Puedes implementar la lógica para eliminar una recomendación si es necesario
    }
}