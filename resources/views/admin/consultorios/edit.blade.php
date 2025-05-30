@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Actualizacion Del Consultorio: {{$consultorio->nombre}}</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Llenen Los Datos</h3>
      </div>

      <div class="card-body">
        <form action="{{ url('/admin/consultorios', $consultorio->id) }}" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre Del Consultorio</label> <b>*</b>
                <input type="text" value="{{ $consultorio->nombre }}" name="nombre" id="nombre" class="form-control" placeholder="Ejemplo: Consultorio A" required>
                <small class="text-muted">Ingrese el nombre del consultorio (máximo 50 caracteres).</small>
                @error('nombre')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="capacidad">Capacidad</label> <b>*</b>
                <input type="text" value="{{ $consultorio->capacidad }}" name="capacidad" id="capacidad" class="form-control" placeholder="Ejemplo: 10 personas" required>
                <small class="text-muted">Ingrese la capacidad máxima del consultorio (Personas o Horas).</small>
                @error('capacidad')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="number" value="{{ $consultorio->telefono }}" name="telefono" id="telefono" class="form-control" placeholder="Ejemplo: 04127076999">
                <small class="text-muted">Ingrese un número de teléfono de contacto (opcional).</small>
              </div>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label for="especialidad">Especialidad</label> <b>*</b>
                <input type="text" value="{{ $consultorio->especialidad }}" name="especialidad" id="especialidad" class="form-control" placeholder="Ejemplo: Cardiología" required>
                <small class="text-muted">Ingrese la especialidad principal del consultorio.</small>
                @error('especialidad')
                  <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    @if($consultorio->estado == "ACTIVO")
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    @else
                        <option value="INACTIVO">INACTIVO</option>
                        <option value="ACTIVO">ACTIVO</option>
                    @endif
                </select>
                <small class="text-muted">Seleccione el estado actual del consultorio.</small>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Actualizar Consultorio</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection