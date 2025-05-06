<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'consultorio_id',
        'event_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
    ];


    
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

  
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

   
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class, 'consultorio_id');
    }

   
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}