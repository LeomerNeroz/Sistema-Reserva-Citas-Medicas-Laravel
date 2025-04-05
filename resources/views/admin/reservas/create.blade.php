@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Registro De Una Nueva Reserva</h1>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Llenen Los Datos</h3>
      </div>
      <div class="card-body row">
        <div class="col-md-3">
          <form action="{{ route('admin.reservas.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="paciente_id">Paciente</label> <b>*</b>
              <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="" selected disabled>Seleccionar Paciente</option>
                @foreach ($pacientes as $paciente)
                  <option value="{{ $paciente->id }}">{{ $paciente->nombres . ' ' . $paciente->apellidos . ' - CI: ' . $paciente->ci }}</option>
                @endforeach
              </select>
              <small class="text-muted">Seleccione el paciente asociado a la reserva.</small>
            </div>

            <div class="form-group">
              <label for="doctor_id">Doctor</label> <b>*</b>
              <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="" selected disabled>Seleccionar Doctor</option>
                @foreach ($doctores as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->nombres . ' ' . $doctor->apellidos . ' - Especialidad: ' . $doctor->especialidad }}</option>
                @endforeach
              </select>
              <small class="text-muted">Seleccione el doctor asociado a la reserva.</small>
            </div>

            <div class="form-group">
              <label for="consultorio_select">Consultorio</label> <b>*</b>
              <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                <option value="" selected disabled>Seleccionar Consultorio</option>
                @foreach ($consultorios as $consultorio)
                  <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . ' - Especialidad: ' . $consultorio->especialidad }}</option>
                @endforeach
              </select>
              <small class="text-muted">Seleccione el consultorio donde se realizará la cita.</small>
            </div>

            <div class="form-group">
              <label for="fecha">Fecha</label> <b>*</b>
              <input type="date" id="fecha" name="fecha" class="form-control" required>
              <small class="text-muted">Ingrese la fecha de la cita.</small>
            </div>

            <div class="form-group">
              <label for="hora_inicio">Hora Inicio</label> <b>*</b>
              <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" placeholder="Ejemplo: 08:00 AM" required>
              <small class="text-muted">Ingrese la hora de inicio de la cita.</small>
            </div>

            <div class="form-group">
              <label for="hora_fin">Hora Fin</label> <b>*</b>
              <input type="time" id="hora_fin" name="hora_fin" class="form-control" placeholder="Ejemplo: 09:00 AM" required>
              <small class="text-muted">Ingrese la hora de finalización de la cita.</small>
            </div>

            <div class="form-group">
              <label for="title_preview">Título de la cita</label> <b>*</b>
              <input type="text" id="title_preview" class="form-control" readonly placeholder="Título de la cita">
              <input type="hidden" name="title" id="title" value="">
              <small class="text-muted">Este campo se genera automáticamente al seleccionar los datos anteriores.</small>
            </div>

            <div class="form-group">
              <a href="{{ route('admin.reservas.index') }}" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-primary">Registrar Reserva</button>
            </div>
          </form>
        </div>
        <div class="col-md-9">
          <div id="consultorio_info"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    if (calendarEl) {
      const calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        initialView: 'timeGridWeek',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
          today: 'Hoy',
          month: 'Mes',
          week: 'Semana',
          day: 'Día',
          list: 'Lista'
        },
        allDayText: 'Todo el día',
        events: @json($events)
      });
      calendar.render();
    }

    let paciente = '';
    let doctor = '';
    let consultorio = '';
    let horaInicio = '';
    let horaFin = '';

    function updateTitle() {
      const title = `${paciente} - ${doctor} - ${consultorio} (${horaInicio} a ${horaFin})`;
      document.getElementById('title_preview').value = title;
      document.getElementById('title').value = title;
    }

    document.querySelector('select[name="paciente_id"]')?.addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      paciente = selectedOption.text.split(' - ')[0].trim();
      updateTitle();
    });

    document.querySelector('select[name="doctor_id"]')?.addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      doctor = selectedOption.text.split(' - ')[0].trim();
      updateTitle();
    });

    document.querySelector('select[name="consultorio_id"]')?.addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      consultorio = selectedOption.text.split(' - ')[0].trim();
      updateTitle();
    });

    document.querySelector('input[name="hora_inicio"]')?.addEventListener('change', function () {
      horaInicio = this.value;
      updateTitle();
    });

    document.querySelector('input[name="hora_fin"]')?.addEventListener('change', function () {
      horaFin = this.value;
      updateTitle();
    });
  });
</script>
@endpush