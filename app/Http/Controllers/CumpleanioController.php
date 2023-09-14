<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cumpleanio;
use Carbon\Carbon;

class CumpleanioController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now();
        $users = User::whereMonth('date', $currentDate->month)
                    ->whereDay('date', $currentDate->day)
                    ->get();
    
        return view('cumpleaños.index', compact('users'));
    }

    public function create()
    {
        return view('cumpleaños.create');
    }

    public function store(Request $request)
    {
        // Guardar el evento de cumpleaños en la base de datos
        $birthdayEvents->nombre = $request->input('nombre');
        $birthdayEvents->fecha = $request->input('fecha');
        $birthdayEvents = new Cumpleanio();
        $birthdayEvents->save();

        return redirect('/cumpleaños')->with('success', 'Evento de cumpleaños creado correctamente');
    }

    public function show($id)
    {
        $cumpleanio = Cumpleanio::find($id);
        return view('cumpleaños.show', compact('cumpleanio'));
    }

    public function destroy($id)
    {
        $cumpleanio = Cumpleanio::find($id);
        $cumpleanio->delete();

        return redirect('/cumpleaños')->with('success', 'Evento de cumpleaños eliminado correctamente');
    }

    public function update(Request $request, $id)
    {
        // Actualizar el evento de cumpleaños en la base de datos
        $cumpleanio = Cumpleanio::find($id);
        $cumpleanio->nombre = $request->input('nombre');
        $cumpleanio->fecha = $request->input('fecha');
        $cumpleanio->save();

        return redirect('/cumpleaños')->with('success', 'Evento de cumpleaños actualizado correctamente');
    }

    public function edit($id)
    {
        $cumpleanio = Cumpleanio::find($id);
        return view('cumpleaños.edit', compact('cumpleanio'));
    }
}