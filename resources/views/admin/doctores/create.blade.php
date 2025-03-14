@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Registro De Un Nuevo Doctor</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llenen Los Datos</h3>
        </div>
      
        <div class="card-body">
         <form action="{{ url('/admin/doctores/create') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombres">Nombres</label> <b>*</b>
                        <input type="text" id="nombres" value="{{ old('nombres') }}" name="nombres" class="form-control" required>
                        @error('nombres')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label> <b>*</b>
                        <input type="text" id="apellidos" value="{{ old('apellidos') }}" name="apellidos" class="form-control" required>
                        @error('apellidos')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label> <b>*</b>
                        <input type="number" id="telefono" value="{{ old('telefono') }}" name="telefono" class="form-control" required>
                        @error('telefono')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">Correo</label> <b>*</b>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control" required>
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
                        <input type="text" id="especialidad" value="{{ old('especialidad') }}" name="especialidad" class="form-control" required>
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
                        <button type="submit" class="btn btn-primary">Registrar Doctor</button>
                    </div>
                </div>
            </div>
         </form>
      </div>
    </div>
 </div>
</div>
@endsection