<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Horario;
use Exception;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('index', compact('consultorios'));
    }

    public function cargar_datos_consultorios ($id){

        $consultorio = Consultorio::find($id);

        try{
            $horarios = Horario::with('doctor' , 'consultorio')->where('consultorio_id' , $id)->get();
            return view('cargar_datos_consultorio' ,compact('horarios' , 'consultorio'));
        }catch (\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }  
    }
}

