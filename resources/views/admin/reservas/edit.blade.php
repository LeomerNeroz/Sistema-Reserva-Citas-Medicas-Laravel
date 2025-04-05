@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Editar Reserva</h1>
</div>
<hr>
<div class="row">
  <div class="col-md-10">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Editar Datos</h3>
      </div>

      <div class="card-body">
        <form action="{{ route('admin.reservas.update', $reserva->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="paciente_id">Paciente</label> <b>*</b>
                <select name="paciente_id" id="paciente_id" class="form-control" required>
                  <option value="" selected disabled>Seleccionar Paciente</option>
                  @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $reserva->paciente_id == $paciente->id ? 'selected' : '' }}>
                      {{ $paciente->nombres . ' ' . $paciente->apellidos }}
                    </option>
                  @endforeach
                </select>
                <small class="text-muted">Seleccione el paciente asociado a la reserva.</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="doctor_id">Doctor</label> <b>*</b>
                <select name="doctor_id" id="doctor_id" class="form-control" required>
                  <option value="" selected disabled>Seleccionar Doctor</option>
                  @foreach ($doctores as $doctor)
                    <option value="{{ $doctor->id }}" {{ $reserva->doctor_id == $doctor->id ? 'selected' : '' }}>
                      {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                    </option>
                  @endforeach
                </select>
                <small class="text-muted">Seleccione el doctor asociado a la reserva.</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="consultorio_id">Consultorio</label> <b>*</b>
                <select name="consultorio_id" id="consultorio_id" class="form-control" required>
                  <option value="" selected disabled>Seleccionar Consultorio</option>
                  @foreach ($consultorios as $consultorio)
                    <option value="{{ $consultorio->id }}" {{ $reserva->consultorio_id == $consultorio->id ? 'selected' : '' }}>
                      {{ $consultorio->nombre . ' - Especialidad: ' . $consultorio->especialidad }}
                    </option>
                  @endforeach
                </select>
                <small class="text-muted">Seleccione el consultorio donde se realizará la cita.</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="fecha">Fecha</label> <b>*</b>
                <input type="date" id="fecha" name="fecha" class="form-control" value="{{ $reserva->fecha }}" required>
                <small class="text-muted">Ingrese la fecha de la cita.</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="hora_inicio">Hora Inicio</label> <b>*</b>
                <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" value="{{ $reserva->hora_inicio }}" placeholder="Ejemplo: 08:00 AM" required>
                <small class="text-muted">Ingrese la hora de inicio de la cita.</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="hora_fin">Hora Fin</label> <b>*</b>
                <input type="time" id="hora_fin" name="hora_fin" class="form-control" value="{{ $reserva->hora_fin }}" placeholder="Ejemplo: 09:00 AM" required>
                <small class="text-muted">Ingrese la hora de finalización de la cita.</small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection