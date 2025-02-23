@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de Historiales</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Historiales Registrados</h3>
                <div class="card-tools">
                    <a href="{{url ('admin/historial/create')}}" class="btn btn-primary">
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
                            <td style="text-align: center"><b>CI</b></td>
                            <td style="text-align: center"><b>Fecha De La Cita Medica</b></td>
                            <td style="text-align: center"><b>Detalle</b></td>
                            <td style="text-align: center"><b>Doctor</b></td>
                            
                            <td style="text-align: center"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach ($historiales as $historiale)
                        <tr>
                            <td style="text-align: center">{{ $contador++ }}</td>
                            <td>{{ $historiale->paciente->nombres }} {{$historiale->paciente->apellidos}}</td> 
                            <td>{{$historiale->paciente->ci}}</td>
                            <td style="text-align:center">{{ $historiale->fecha_visita }}</td>
                            <td>{!! Str::limit($historiale->detalle, 100, '...') !!}</td>
                            <td>{{ $historiale->doctor->nombres }}</td>
                            
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ url('admin/historial/' . $historiale->id) }}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <a href="{{ url('admin/historial/pdf/' . $historiale->id) }}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                                    <a href="{{ url('admin/historial/' . $historiale->id . '/edit') }}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ url('admin/historial/' . $historiale->id . '/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Historiales",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Historiales",
                                "infoFiltered": "(Filtrado de _MAX_ total de Historiales)",
                                "lengthMenu": "Mostrar _MENU_ Historiales",
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
@endsection
