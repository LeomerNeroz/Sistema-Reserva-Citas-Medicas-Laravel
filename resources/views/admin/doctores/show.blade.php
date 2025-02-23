@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Doctor: {{$doctor->nombres . " " . $doctor->apellidos}}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Datos Registrados</h3>
        </div>
      
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <p>{{ $doctor->nombres }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <p>{{ $doctor->apellidos }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <p>{{ $doctor->telefono }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <p>{{ $doctor->email }}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="especialidad">Especialidad</label>
                        <p>{{ $doctor->especialidad }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
@endsection
