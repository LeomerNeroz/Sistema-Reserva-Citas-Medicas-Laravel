<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;

use Illuminate\Http\Request;

class HorarioController extends Controller
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
        $events = Event::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.index', compact('horarios', 'consultorios', 'pacientes', 'events'));
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
        $events = Event::all();
       
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.create', compact('doctores', 'consultorios', 'horarios', 'pacientes', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
$request->validate([
    'dia' => 'required',
    'hora_inicio' => 'required|date_format:H:i',
    'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
    'consultorio_id' => 'required|exists:consultorios,id', 
]);


$horarioExistente = Horario::where('dia', $request->dia)
    ->where('consultorio_id', $request->consultorio_id) 
    ->where(function ($query) use ($request) {
        $query->where(function ($query) use ($request) {
            $query->where('hora_inicio', '<', $request->hora_fin)
                  ->where('hora_inicio', '>', $request->hora_inicio);
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('hora_fin', '>', $request->hora_inicio)
                  ->where('hora_fin', '<', $request->hora_fin);
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('hora_inicio', '<', $request->hora_inicio)
                  ->where('hora_fin', '>', $request->hora_fin);
        });
    })
    ->exists();

if ($horarioExistente) {
    return redirect()->back()
        ->withInput()
        ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para este consultorio')
        ->with('icono', 'error');
}

    
        
        Horario::create($request->all());
    
        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se registró el horario correctamente')
            ->with('icono', 'success');
    }
    
    public function cargar_datos_consultorios($id){
        try {
            $horarios = Horario::with(['doctor', 'consultorio'])->where('consultorio_id', $id)->get();
            
            return view('admin.horarios.cargar_datos_consultorios' ,compact('horarios'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario =Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $pacientes = Paciente::all();
        return view('admin.horarios.edit', compact('horario', 'consultorios', 'doctores', 'pacientes'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);
    
        
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id)
            ->where('id', '!=', $id) 
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_fin)
                          ->where('hora_inicio', '>=', $request->hora_inicio);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_fin', '>', $request->hora_inicio)
                          ->where('hora_fin', '<=', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '<=', $request->hora_inicio)
                          ->where('hora_fin', '>=', $request->hora_fin);
                });
            })
            ->exists();
    
        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado para este consultorio')
                ->with('icono', 'error');
        }
    
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());
    
        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se actualizó el horario de la manera correcta')
            ->with('icono', 'success');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete ($id){
        $horario =Horario:: findOrFail($id);
        return view('admin.horarios.delete', compact('horario'));

     }
    public function destroy($id)
    {
        
        $consultorio =Horario:: find($id);
        $consultorio->delete();
        
        return redirect()->route('admin.horarios.index')
        ->with('mensaje', 'Se elimino el horario de la manera correcta')
        ->with('icono', 'success');
    }
}