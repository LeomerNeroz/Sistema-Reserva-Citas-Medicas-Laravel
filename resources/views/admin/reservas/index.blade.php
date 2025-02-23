@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Listado De Reservas</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Reservas Registradas</h3>
                <div class="card-tools">
                    <a href="{{url ('admin/reservas/create')}}" class="btn btn-primary">
                       Registrar Nuevo
                    </a>
                </div>
</div>
<hr>
<div class="card-body">
  <table id="example1" class="table table-striped table-bordered table-hover table-sm">
    <thead style="background-color: #c0c0c0">
      <tr>
        <td style="text-align: center"><b>Nro</b></td>
        <td style="text-align: center"><b>Paciente</b></td>
        <td style="text-align: center"><b>Doctor</b></td>
        <td style="text-align: center"><b>Consultorio</b></td>
        <td style="text-align: center"><b>Fecha</b></td>
        <td style="text-align: center"><b>Hora Inicio</b></td>
        <td style="text-align: center"><b>Hora Fin</b></td>
        <td style="text-align: center"><b>Acciones</b></td>
      </tr>
    </thead>
    <tbody>
      <?php $contador = 1; ?>
      @foreach ($reservas as $reserva)
      <tr>
        <td style="text-align: center">{{ $contador++ }}</td>
        <td>{{ $reserva->paciente->nombres . " " . $reserva->paciente->apellidos }}</td>
        <td>{{ $reserva->doctor->nombres . " " . $reserva->doctor->apellidos }}</td>
        <td>{{ $reserva->consultorio->nombre . " Especialidad: " . $reserva->consultorio->especialidad }}</td>
        <td>{{ $reserva->fecha }}</td>
        <td>{{ $reserva->hora_inicio }}</td>
        <td>{{ $reserva->hora_fin }}</td>
        <td style="text-align: center">
         
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ url('admin/reservas/' . $reserva->id) }}" type="button" class="btn btn-info btn-sm">
              <i class="bi bi-eye"></i>
            </a>
            <a href="{{ url('admin/reservas/' . $reserva->id . '/edit') }}" type="button" class="btn btn-success btn-sm">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="{{ url('admin/reservas/' . $reserva->id . '/confirm-delete') }}" type="button" class="btn btn-danger btn-sm">
              <i class="bi bi-trash"></i>
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
    $(function () {
      $("#example1").DataTable({
        "pageLength": 10,
        "language": {
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
          "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
          "infoFiltered": "(Filtrado de _MAX_ total de Reservas)",
          "lengthMenu": "Mostrar _MENU_ Reservas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscador:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        },
       "responsive": true,
"lengthChange": true,
"autoWidth": false,
buttons: [{
    extend: 'collection',
    text: 'Reportes',
    orientation: 'landscape',
    buttons: [{
        text: '<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>',
        extend: 'pdf'
    },
    {
        text: '<button class="btn btn-info btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
        extend: 'csv'
    },
    {
        text: '<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL</button>',
        extend: 'excel'
    },
    {
        text: '<button class="btn btn-warning btn-sm btn-block"><i class="bi bi-printer-fill"></i> IMPRIMIR</button>',
        extend: 'print'
    }]
}, {
    extend: 'colvis',
    text: 'Visor de columnas',
    collectionLayout: 'fixed three-column'
}],
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

  </script>
</div>
</div>
</div>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    
    <div class="card-header">
      <div class="row">
        <div class="col-md-4">
          <h3 class="card-title">Calendario de atención de doctores</h3>
        </div>
        <div class="col-md-4">
          <div style="float: right">
            <label for="">Consultorios</label>
          </div>  
        </div>
        <div class="col-md-4">
          <select name="consultorio_id" id="consultorio_select" class="form-control">
            <option value="">Seleccionar Consultorio</option>
            @foreach ($consultorios as $consultorio)
            <option value="{{$consultorio->id}}">{{$consultorio->nombre." -Capacidad: ".$consultorio->capacidad}}</option>
            @endforeach
           </select>
        </div>
      </div>
      
    </div>
    <div class="card-body">
      
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
      <hr>
      <div id="consultorio_info">

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
