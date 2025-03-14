@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Doctor: {{$doctor->nombres . " " . $doctor->apellidos}}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edite Los Datos</h3>
        </div>
      
        <div class="card-body">
            <form action="{{ url('/admin/doctores', $doctor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nombres">Nombres</label> <b>*</b>
                            <input type="text" id="nombres" value="{{ $doctor->nombres }}" name="nombres" class="form-control" required>
                            @error('nombres')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label> <b>*</b>
                            <input type="text" id="apellidos" value="{{ $doctor->apellidos }}" name="apellidos" class="form-control" required>
                            @error('apellidos')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label> <b>*</b>
                            <input type="number" id="telefono" value="{{ $doctor->telefono }}" name="telefono" class="form-control" required>
                            @error('telefono')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Correo</label> <b>*</b>
                            <input type="email" id="email" value="{{ $doctor->email }}" name="email" class="form-control" required>
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="especialidad">Especialidad</label> <b>*</b>
                            <input type="text" id="especialidad" value="{{ $doctor->especialidad }}" name="especialidad" class="form-control" required>
                            @error('especialidad')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Doctor</button>
                        </div>
                    </div>
                </div>
         </form>
      </div>
    </div>
 </div>
</div>
@endsection