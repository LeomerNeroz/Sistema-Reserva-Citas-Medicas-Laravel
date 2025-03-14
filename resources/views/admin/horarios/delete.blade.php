@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Horario: {{ $horario->dia }} - {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">¿Está Seguro De Eliminar Este Registro?</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/horarios', $horario->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="consultorio">Consultorio</label>
                            <p>{{ $horario->consultorio->nombre }} - Especialidad: {{ $horario->consultorio->especialidad }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="doctor">Doctor</label>
                            <p>{{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }} - {{ $horario->doctor->especialidad }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dia">Día</label>
                            <p>{{ $horario->dia }}</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hora_inicio">Hora Inicio</label>
                            <p>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hora_fin">Hora Fin</label>
                            <p>{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar Registro</button>
                        </div>
                    </div>
                </div>
         </form>
      </div>
    </div>
 </div>
</div>
@endsection
``
