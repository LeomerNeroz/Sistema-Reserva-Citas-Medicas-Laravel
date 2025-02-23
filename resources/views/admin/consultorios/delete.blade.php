@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Consultorio: {{$consultorio->nombre}}</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">¿Esta Seguro De Eliminar Este Consultorio?</h3>
      </div>

      <div class="card-body">
        <form action="{{url ('/admin/consultorios',$consultorio->id)}}" method="POST">
            @csrf
            @method('DELETE')
       
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
                <button type="submit" class="btn btn-danger">Eliminar Consultorio</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
