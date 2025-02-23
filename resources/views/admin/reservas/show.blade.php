@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Datos De La Reserva</h1>
</div>
<hr>
<div class="row">
  <div class="col-md-10">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Datos Registrados</h3>
      </div>

      <div class="card-body">
        <div class="row">
         
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Paciente</label>
              <p>{{ $reserva->paciente?->nombres . " " . $reserva->paciente?->apellidos . " ". $reserva->paciente->ci}}</p>
            </div>
          </div>

          
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Doctor</label>
              <p>{{ $reserva->doctor?->nombres . " " . $reserva->doctor?->apellidos}}</p>
            </div>
          </div>

          
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Consultorio</label>
              <p>{{ $reserva->consultorio?->nombre}}</p>
            </div>
          </div>
        </div>

        <div class="row">
         
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Fecha</label>
              <p>{{ $reserva->fecha }}</p>
            </div>
          </div>

         
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Hora Inicio</label>
              <p>{{ $reserva->hora_inicio }}</p>
            </div>
          </div>

          
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Hora Fin</label>
              <p>{{ $reserva->hora_fin }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<hr>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">Volver</a>
    </div>
  </div>
</div>
@endsection