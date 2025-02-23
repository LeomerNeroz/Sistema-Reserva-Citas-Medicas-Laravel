@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Registro De Un Nuevo Consultorio</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Llenen Los Datos</h3>
      </div>

      <div class="card-body">
        <form action="{{ route('admin.consultorios.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre Del Consultorio</label> <b>*</b>
                <input type="text" value="{{ old('nombre') }}" name="nombre" id="nombre" class="form-control" required>
                @error('nombre')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="capacidad">Capacidad</label> <b>*</b>
                <input type="text" value="{{ old('capacidad') }}" name="capacidad" id="capacidad" class="form-control" required>
                @error('capacidad')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" value="{{ old('telefono') }}" name="telefono" id="telefono" class="form-control">
              </div>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label for="especialidad">Especialidad</label> <b>*</b>
                <input type="text" value="{{ old('especialidad') }}" name="especialidad" id="especialidad" class="form-control" required>
                @error('especialidad')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                  <option value="ACTIVO" {{ old('estado') == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                  <option value="INACTIVO" {{ old('estado') == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                </select>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Registrar Consultorio</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
