@extends ('layouts.admin')

@section('content')
<div class="row">
  <h3><b>Bienvenido: </b>{{ Auth::user()->email }} / <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first() }} </h3>
</div>
<hr>

<div class="row">
  @can('admin.usuarios.index')
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $total_usuarios }}</h3>
          <p>Usuarios</p>
        </div>
        <div class="icon">
          <i class="fas bi bi-people-fill"></i>
        </div>
        <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Mas Información <i class="fas bi bi-people-fill"></i></a>
      </div>
    </div>
  @endcan

  @can('admin.secretarias.index')
    <div class="col-lg-3 col-6">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $total_secretarias }}</h3>
          <p>Secretarias</p>
        </div>
        <div class="icon">
          <i class="fas bi bi-person-circle"></i>
        </div>
        <a href="{{ url('admin/secretarias') }}" class="small-box-footer">Mas Información <i class="fas bi bi-person-circle"></i></a>
      </div>
    </div>
  @endcan

  @can('admin.pacientes.index')
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $total_pacientes }}</h3>
          <p>Pacientes</p>
        </div>
        <div class="icon">
          <i class="fas bi bi-person-vcard"></i>
        </div>
        <a href="{{ url('admin/pacientes') }}" class="small-box-footer">Mas Información <i class="fas bi bi-person-vcard"></i></a>
      </div>
    </div>
  @endcan

  @can('admin.consultorios.index')
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $total_consultorios }}</h3>
          <p>Consultorios</p>
        </div>
        <div class="icon">
          <i class="fas bi bi-hospital"></i>
        </div>
        <a href="{{ url('admin/consultorios') }}" class="small-box-footer">Mas Información <i class="fas bi bi-hospital"></i></a>
      </div>
    </div>
  @endcan

  @can('admin.doctores.index')
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $total_doctores }}</h3>
          <p>Doctores</p>
        </div>
        <div class="icon">
          <i class="fas bi bi-person-heart"></i>
        </div>
        <a href="{{ url('admin/doctores') }}" class="small-box-footer">Mas Información <i class="fas bi bi-person-heart"></i></a>
      </div>
    </div>
  @endcan

  @can('admin.horarios.index')
    <div class="col-lg-3 col-6">
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>{{ $total_horarios }}</h3>
          <p>Horarios</p>
        </div>
        <div class="icon">
          <i class="fas bi bi-calendar2-heart-fill"></i>
        </div>
        <a href="{{ url('admin/horarios') }}" class="small-box-footer">Mas Información <i class="fas bi bi-calendar2-heart-fill"></i></a>
      </div>
    </div>
  @endcan


  @can('admin.reservas.index')
  <div class="col-lg-3 col-6">
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>{{ $total_reservas }}</h3>
        <p>Reservas</p>
      </div>
      <div class="icon">
        <i class="fas bi bi-building-add"></i>
      </div>
      <a href="{{ url('admin/reservas') }}" class="small-box-footer">Mas Información <i class="fas bi bi-building-add"></i></a>
    </div>
  </div>
@endcan


@can('admin.historial.index')
<div class="col-lg-3 col-6">
  <div class="small-box bg-maroon">
    <div class="inner">
      <h3>{{ $total_historiales }}</h3>
      <p>Historial Clinico</p>
    </div>
    <div class="icon">
      <i class="fas bi bi-file-earmark-medical"></i>
    </div>
    <a href="{{ url('admin/historial') }}" class="small-box-footer">Mas Información <i class="fas bi bi-file-earmark-medical"></i></a>
  </div>
</div>
@endcan



</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <h3 class="card-title">Calendario de atención de doctores</h3>
          </div>
          <div class="col-md-4">
            <div style="float: right">
              <label for="consultorio_select_1">Consultorios</label>
            </div>
          </div>
          <div class="col-md-4">
            <select name="consultorio_id" id="consultorio_select_1" class="form-control">
              <option value="">Seleccionar Consultorio</option>
              @foreach ($consultorios as $consultorio)
                <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . " - Especialidad: " . $consultorio->especialidad }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="card-body">
        <script>
          $('#consultorio_select_1').on('change', function() {
            var consultorio_id = $('#consultorio_select_1').val();
            var url = "{{ route('cargar_datos_consultorios', ':id') }}";
            url = url.replace(':id', consultorio_id);
            if (consultorio_id) {
              $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                  $('#consultorio_info').html(data);
                },
                error: function() {
                  alert('Error al obtener los datos del consultorio');
                }
              });
            } else {
              $('#consultorio_info').html('');
            }
          });
        </script>
        <hr>
        <div id="consultorio_info"></div>
      </div>
    </div>
    </div>
  </div>
@endsection
