@extends('layouts.admin')

@section('content')

<div class="row">
  <h1>Registro De Un Nuevo Historial</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/historial/create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select name="paciente_id" id="paciente_id" class="form-control">
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->apellidos." ".$paciente->nombres}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_visita">Fecha De La Cita Medica</label>
                            <input type="date" id="fecha_visita" name="fecha_visita" value="{{ date('Y-m-d') }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="detalle">Descripción de la cita</label>
                            <textarea name="detalle" id="detalle" rows="3" class="form-control" placeholder="Escriba una breve descripción de la cita" required minlength="10" style="border: 2px solid #4CAF50; border-radius: 5px; padding: 10px; font-size: 16px;"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select name="doctor_id" id="doctor_id" class="form-control">
                                @foreach($doctores as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->nombres . ' ' . $doctor->apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/historial') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Historial</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>

@endsection