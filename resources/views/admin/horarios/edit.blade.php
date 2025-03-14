@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Actualización Del Horario</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Llenen Los Datos</h3>
      </div>

      <div class="card-body">
        <form action="{{url ('/admin/horarios', $horario->id)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="consultorio_select">Consultorio</label> <b>*</b>
                <select name="consultorio_id" id="consultorio_select" class="form-control">
                  <option value="">Seleccionar Consultorio</option>
                  @foreach ($consultorios as $consultorio)
                    <option value="{{$consultorio->id}}" {{ $horario->consultorio_id == $consultorio->id ? 'selected' : '' }}>
                      {{$consultorio->nombre." -Especialidad: ".$consultorio->especialidad}}
                    </option>
                  @endforeach
                </select>
                @error('consultorio_id')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="doctor_select">Doctor</label> <b>*</b>
                <select name="doctor_id" id="doctor_select" class="form-control">
                  <option value="">Seleccionar Doctor</option>
                  @foreach ($doctores as $doctor)
                    <option value="{{$doctor->id}}" {{ $horario->doctor_id == $doctor->id ? 'selected' : '' }}>
                      {{$doctor->nombres." ".$doctor->apellidos." - ".$doctor->especialidad}}
                    </option>
                  @endforeach
                </select>
                @error('doctor_id')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="dia_select">Día</label> <b>*</b>
                <select name="dia" id="dia_select" class="form-control">
                  <option value="LUNES" {{ $horario->dia == 'LUNES' ? 'selected' : '' }}>LUNES</option>
                  <option value="MARTES" {{ $horario->dia == 'MARTES' ? 'selected' : '' }}>MARTES</option>
                  <option value="MIERCOLES" {{ $horario->dia == 'MIERCOLES' ? 'selected' : '' }}>MIERCOLES</option>
                  <option value="JUEVES" {{ $horario->dia == 'JUEVES' ? 'selected' : '' }}>JUEVES</option>
                  <option value="VIERNES" {{ $horario->dia == 'VIERNES' ? 'selected' : '' }}>VIERNES</option>
                  <option value="SABADO" {{ $horario->dia == 'SABADO' ? 'selected' : '' }}>SABADO</option>
                  <option value="DOMINGO" {{ $horario->dia == 'DOMINGO' ? 'selected' : '' }}>DOMINGO</option>
                </select>
                @error('dia')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="hora_inicio">Hora Inicio</label> <b>*</b>
                <input type="time" value="{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}" name="hora_inicio" id="hora_inicio" class="form-control" required>
                @error('hora_inicio')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="hora_fin">Hora Fin</label> <b>*</b>
                <input type="time" value="{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}" name="hora_fin" id="hora_fin" class="form-control" required>
                @error('hora_fin')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Actualizar Horario</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
