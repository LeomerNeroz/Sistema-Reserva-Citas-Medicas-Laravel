@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Consultorio: {{$consultorio->nombre}}</h1>
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
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre Del Consultorio</label> <b>*</b>
                <p>{{$consultorio->nombre}}</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="capacidad">Capacidad</label> <b>*</b>
                <p>{{$consultorio->capacidad}}</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <p>{{$consultorio->telefono}}</p>
              </div>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="especialidad">Especialidad</label> <b>*</b>
                <p>{{$consultorio->especialidad}}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="estado">Estado</label>
                <p>{{$consultorio->estado}}</p>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>
                
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
