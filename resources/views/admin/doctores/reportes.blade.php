@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Reportes</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-4">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Generar Reporte</h3>
        </div>
      
        <div class="card-body">
            <a href="{{url ('/admin/doctores/pdf')}}" class="btn btn-success"><i class="bi bi-printer"></i> Listado Del Personal Medico</a>
           
        </div>
    </div>
 </div>
</div>
@endsection
