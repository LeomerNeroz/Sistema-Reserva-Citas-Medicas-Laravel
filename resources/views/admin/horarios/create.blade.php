@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Registro De Un Nuevo Horario</h1>
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
          <form action="{{ url('/admin/horarios/create') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="consultorio_select">Consultorios</label> <b>*</b>
                  <select name="consultorio_id" id="consultorio_select" class="form-control">
                    <option value="">Seleccionar Consultorio</option>
                    @foreach ($consultorios as $consultorio)
                      <option value="{{$consultorio->id}}">{{$consultorio->nombre." - Especialidad: ".$consultorio->especialidad}}</option>
                    @endforeach
                  </select>
                  <small class="text-muted">Seleccione el consultorio asociado al horario.</small>

                  <script>
                    $('#consultorio_select').on('change', function(){
                      var consultorio_id = $('#consultorio_select').val();
                      var url = "{{route ('admin.horarios.cargar_datos_consultorios', ':id')}}";
                      url = url.replace(':id', consultorio_id);
                      if (consultorio_id){
                        $.ajax({
                          url: url,
                          type: 'GET',
                          success: function (data) {
                            $('#consultorio_info').html(data);
                          }, 
                          error: function (){
                            alert('Error al obtener los datos del consultorio');
                          }
                        });
                      } else{
                        $('#consultorio_info').html('');
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="doctor_id">Doctores</label> <b>*</b>
                  <select name="doctor_id" id="doctor_id" class="form-control">
                    <option value="">Seleccionar Doctor</option>
                    @foreach ($doctores as $doctore)
                      <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos." - ".$doctore->especialidad}}</option>
                    @endforeach
                  </select>
                  <small class="text-muted">Seleccione el doctor asociado al horario.</small>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="dia">Día</label> <b>*</b>
                  <select name="dia" id="dia" class="form-control">
                    <option value="LUNES">LUNES</option>
                    <option value="MARTES">MARTES</option>
                    <option value="MIERCOLES">MIÉRCOLES</option>
                    <option value="JUEVES">JUEVES</option>
                    <option value="VIERNES">VIERNES</option>
                    <option value="SABADO">SÁBADO</option>
                    <option value="DOMINGO">DOMINGO</option>
                  </select>
                  <small class="text-muted">Seleccione el día de la semana para el horario.</small>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="fecha">Fecha</label> <b>*</b>
                  <input type="date" id="fecha" name="fecha" class="form-control" required>
                  <small class="text-muted">Ingrese la fecha específica para el horario.</small>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="hora_inicio">Hora Inicio</label> <b>*</b>
                  <input type="time" id="hora_inicio" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                  <small class="text-muted">Ingrese la hora de inicio del horario.</small>
                  @error('hora_inicio')
                    <small style="color: red">{{$message}}</small>
                  @enderror
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="hora_fin">Hora Fin</label> <b>*</b>
                  <input type="time" id="hora_fin" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                  <small class="text-muted">Ingrese la hora de finalización del horario.</small>
                  @error('hora_fin')
                    <small style="color: red">{{$message}}</small>
                  @enderror
                </div>
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Registrar Horario</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-9">
          <div id="consultorio_info"></div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">{{ __('Calendario') }}</div>
                  <div class="card-body">
                      <div id='calendar'></div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  
</div>
@endsection

@push('scripts')
<br>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

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
  });
</script>
@endpush