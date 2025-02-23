<?php

namespace App\Http\Controllers;

use App\Models\Reserva; 
use Illuminate\Http\Request;
use App\Models\Consultorio;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Event;

class ReservaController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $consultorios = Consultorio::all();
    $pacientes = Paciente::all();
    $doctores = Doctor::all();

    
    $reservas = Reserva::with(['paciente', 'doctor', 'consultorio', 'event'])->get();

   
    $events = $reservas->map(function ($reserva) {
        return [
            'id' => $reserva->id,
            'title' => $reserva->event->title,
            'start' => $reserva->event->start,
            'end' => $reserva->event->end,
            'allDay' => false,
        ];
    });

    return view('admin.reservas.index', compact('reservas', 'consultorios', 'pacientes', 'doctores', 'events'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctores = Doctor::all();
        $pacientes = Paciente::all();
        $consultorios = Consultorio::all();
        $events = Event::all();

        return view('admin.reservas.create', compact('doctores', 'consultorios', 'pacientes', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctors,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'title' => 'required|string',
        ]);
    
        
        $event = Event::create([
            'title' => $validated['title'],
            'start' => $validated['fecha'] . ' ' . $validated['hora_inicio'],
            'end' => $validated['fecha'] . ' ' . $validated['hora_fin'],
            'all_day' => false,
        ]);
    
        
        Reserva::create([
            'paciente_id' => $validated['paciente_id'],
            'doctor_id' => $validated['doctor_id'],
            'consultorio_id' => $validated['consultorio_id'],
            'event_id' => $event->id,
            'fecha' => $validated['fecha'],
            'hora_inicio' => $validated['hora_inicio'],
            'hora_fin' => $validated['hora_fin'],
        ]);
    
        
        return redirect()->route('admin.reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
   
    $reserva = Reserva::with(['paciente', 'doctor', 'consultorio'])->findOrFail($id);

   
    return view('admin.reservas.show', compact('reserva'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    
    $reserva = Reserva::findOrFail($id);

    
    $pacientes = Paciente::all();
    $doctores = Doctor::all();
    $consultorios = Consultorio::all();

    return view('admin.reservas.edit', compact('reserva', 'pacientes', 'doctores', 'consultorios'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
   
    $validated = $request->validate([
        'paciente_id' => 'required|exists:pacientes,id',
        'doctor_id' => 'required|exists:doctors,id',
        'consultorio_id' => 'required|exists:consultorios,id',
        'fecha' => 'required|date',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
    ]);

    
    $reserva = Reserva::findOrFail($id);

    
    $reserva->update([
        'paciente_id' => $validated['paciente_id'],
        'doctor_id' => $validated['doctor_id'],
        'consultorio_id' => $validated['consultorio_id'],
        'fecha' => $validated['fecha'],
        'hora_inicio' => $validated['hora_inicio'],
        'hora_fin' => $validated['hora_fin'],
    ]);

    
    if ($reserva->event) {
        $reserva->event->update([
            'title' => $reserva->paciente->nombres . ' - ' . $reserva->doctor->nombres . ' (' . $reserva->consultorio->nombre . ')',
            'start' => $validated['fecha'] . ' ' . $validated['hora_inicio'],
            'end' => $validated['fecha'] . ' ' . $validated['hora_fin'],
        ]);
    }

    
    return redirect()->route('admin.reservas.index')->with('success', 'Reserva actualizada exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */


     public function confirmDelete($id)
     {
         
         $reserva = Reserva::findOrFail($id);
     
        
         return view('admin.reservas.delete', compact('reserva'));
     }



     public function destroy($id)
     {
         
         $reserva = Reserva::findOrFail($id);
     
        
         if ($reserva->event) {
             $reserva->event->delete();
         }
     
        
         $reserva->delete();
     
         
         return redirect()->route('admin.reservas.index')->with('success', 'Reserva eliminada exitosamente.');
     }
}