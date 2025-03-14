@extends('layouts.admin')

@section('content')

<div class="row">
  <h1>Busqueda De Paciente:</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Buscar Al Paciente</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.historial.buscar_paciente') }}" method="get">
                <div class="row justify-content-xl-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ci">Cedula de identidad:</label>
                            <input type="text" id="ci" name="ci" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div style="height: 32px;"></div>
                            <button type="submit" class="btn btn-primary"> <i class="bi bi-search"></i> Buscar </button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            @if($paciente)
            <div class="text-center">
                <h4>Información Del Paciente</h4>
                <div class="row justify-content-center">
                    <table>
                        <tr>
                            <td><b>Paciente: </b></td>
                            <td>{{ $paciente->apellidos }} {{ $paciente->nombres }}</td>
                        </tr>
                        <tr>
                            <td><b>Cédula De Identidad: </b></td>
                            <td>{{ $paciente->ci ?? 'N/A' }}</td> <!-- Muestra "N/A" si no hay cédula -->
                        </tr>
                        <tr>
                            <td><b>Grupo sanguíneo: </b></td>
                            <td>{{ $paciente->grupo_sanguineo ?? 'N/A' }}</td> <!-- Maneja valores nulos -->
                        </tr>
                        <tr>
                            <td><b>Fecha de nacimiento: </b></td>
                            <td>{{ $paciente->fecha_nacimiento ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td><b>Alergias: </b></td>
                            <td>{{ $paciente->alergias ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td><b>Celular: </b></td>
                            <td>{{ $paciente->celular ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <br>
                <a href="{{ route('admin.historial.imprimir_historial', $paciente->id) }}" 
                   class="btn btn-primary btn-sm btn-block">
                   Ver Historial
                </a>
            </div>
        @else
            <p>Paciente No Registrado</p>
        @endif
            
            
<br>
<br>
<hr>
<hr>
<h2 style="text-align: center">Pacientes Sin Cedula</h2>
<div class="card-body">
<table id="example1" class="table table-striped table-bordered table-hover table-sm">
<thead style="background-color: #c0c0c0">
<tr>
<td style="text-align: center"><b>Nro</b></td>
<td style="text-align: center"><b>Nombres Y Apellidos</b></td>
<td style="text-align: center"><b>CI</b></td>
<td style="text-align: center"><b>Fecha De Nacimiento</b></td>
<td style="text-align: center"><b>Genero</b></td>
<td style="text-align: center"><b>Celular</b></td>
<td style="text-align: center"><b>Dirección</b></td>
<td style="text-align: center"><b>Acciones</b></td>
</tr>
</thead>
<tbody>
<?php $contador = 1; ?>
@foreach ($pacientesSinCedula as $paciente)
<tr>
    <td style="text-align: center">{{ $contador++ }}</td>
    <td>{{ $paciente->nombres }} {{ $paciente->apellidos }}</td>
    <td>{{ $paciente->ci ?? 'N/A' }}</td>
    <td>{{ $paciente->fecha_nacimiento }}</td>
    <td>{{ $paciente->genero }}</td>
    <td>{{ $paciente->celular }}</td>
    <td>{{ $paciente->direccion }}</td>
    <td style="text-align: center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('admin.historial.imprimir_historial', $paciente->id) }}" 
                class="btn btn-primary btn-sm btn-block">
                Ver Historial
            </a>
        </div>
    </td>
</tr>
@endforeach
</tbody>
</table>

<script>
    $(function () {
      $("#example1").DataTable({
        "pageLength": 10,
        "language": {
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
          "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
          "infoFiltered": "(Filtrado de _MAX_ total de Pacientes)",
          "lengthMenu": "Mostrar _MENU_ Pacientes",
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
 </div>
</div>

@endsection