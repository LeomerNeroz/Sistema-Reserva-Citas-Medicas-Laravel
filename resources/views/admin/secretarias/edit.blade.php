@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Modificar Secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Llenen Los Datos</h3>
        </div>
      
        <div class="card-body">
         <form action="{{ url('/admin/secretarias', $secretaria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nombres">Nombres</label> <b>*</b>
                            <input type="text" id="nombres" value="{{$secretaria->nombres}}" name="nombres" class="form-control" required>
                            @error('nombres')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label> <b>*</b>
                            <input type="text" id="apellidos" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control" required>
                            @error('apellidos')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ci">CI</label> <b>*</b>
                            <input type="text" id="ci" value="{{$secretaria->ci}}" name="ci" class="form-control" required>
                            @error('ci')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular">Celular</label> <b>*</b>
                            <input type="text" id="celular" value="{{$secretaria->celular}}" name="celular" class="form-control" required>
                            @error('celular')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row"> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha De Nacimiento</label> <b>*</b>
                            <input type="date" id="fecha_nacimiento" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                            @error('fecha_nacimiento')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="direccion">Dirección</label> <b>*</b>
                            <input type="text" id="direccion" value="{{$secretaria->direccion}}" name="direccion" class="form-control" required>
                            @error('direccion')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Email</label> 
                            <input type="email" id="email" value="{{$secretaria->user->email}}" name="email" class="form-control" required>
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" value="{{old('password')}}" name="password" class="form-control">
                            @error('password')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="password_confirmation">Confirme Contraseña</label>
                            <input type="password" id="password_confirmation" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Registro</button>
                        </div>
                    </div>
                </div>
         </form>
      </div>
    </div>
 </div>
</div>
@endsection