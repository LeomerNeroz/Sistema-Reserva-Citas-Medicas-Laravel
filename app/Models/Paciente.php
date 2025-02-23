<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{
    use HasRoles, HasFactory;
    protected $guard_name = 'web';

    public function getGeneroCompletoAttribute()
    {
        switch ($this->genero) {
            case 'M':
                return 'Masculino';
            case 'F':
                return 'Femenino';
            case 'O':
                return 'Otros';
            default:
                return 'desconocido';
        }
    }

    public function historial(){
        return $this->belongsTo(Historial::class);

    }
}
