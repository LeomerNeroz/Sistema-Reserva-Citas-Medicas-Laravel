@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Modificar Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Llenen Los Datos</h3>
        </div>
      
        <div class="card-body">
         <form action="{{ url('/admin/pacientes', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombres">Nombres</label> <b>*</b>
                            <input type="text" id="nombres" value="{{$paciente->nombres}}" name="nombres" class="form-control" placeholder="Ejemplo: Juan Carlos" required>
                            <small class="text-muted">Ingrese los nombres del paciente.</small>
                            @error('nombres')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label> <b>*</b>
                            <input type="text" id="apellidos" value="{{$paciente->apellidos}}" name="apellidos" class="form-control" placeholder="Ejemplo: Pérez López" required>
                            <small class="text-muted">Ingrese los apellidos del paciente.</small>
                            @error('apellidos')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ci">CI</label>
                            <input type="text" id="ci" value="{{$paciente->ci}}" name="ci" class="form-control" placeholder="Ejemplo: V-12345678">
                            <small class="text-muted">Ingrese el número de cédula del paciente.</small>
                            @error('ci')
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
                            <input type="date" id="fecha_nacimiento" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                            <small class="text-muted">Ingrese la fecha de nacimiento del paciente.</small>
                            @error('fecha_nacimiento')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="genero">Genero</label> <b>*</b>
                            <select name="genero" id="genero" class="form-control">
                                <option value="M" {{ $paciente->genero == 'M' ? 'selected' : '' }}>MASCULINO</option>
                                <option value="F" {{ $paciente->genero == 'F' ? 'selected' : '' }}>FEMENINO</option>
                                <option value="O" {{ $paciente->genero == 'O' ? 'selected' : '' }}>OTROS</option>
                            </select>
                            <small class="text-muted">Seleccione el género del paciente.</small>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular">Celular</label> <b>*</b>
                            <input type="number" id="celular" value="{{$paciente->celular}}" name="celular" class="form-control" placeholder="Ejemplo: 04127076999" required>
                            <small class="text-muted">Ingrese un número de celular válido.</small>
                            @error('celular')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>                  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label> <b>*</b>
                            <input type="email" id="correo" value="{{$paciente->correo}}" name="correo" class="form-control" placeholder="Ejemplo: juan.perez@example.com" required>
                            <small class="text-muted">Ingrese un correo electrónico válido.</small>
                            @error('correo')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direccion">Dirección</label> <b>*</b>
                            <input type="text" id="direccion" value="{{$paciente->direccion}}" name="direccion" class="form-control" placeholder="Ejemplo: Calle Principal, Casa #123" required>
                            <small class="text-muted">Ingrese la dirección del paciente.</small>
                            @error('direccion')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="grupo_sanguineo">Grupo Sanguíneo</label> <b>*</b>
                            <select name="grupo_sanguineo" id="grupo_sanguineo" class="form-control" required>
                                <option value="A+" {{ $paciente->grupo_sanguineo == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ $paciente->grupo_sanguineo == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ $paciente->grupo_sanguineo == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ $paciente->grupo_sanguineo == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ $paciente->grupo_sanguineo == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ $paciente->grupo_sanguineo == 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ $paciente->grupo_sanguineo == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ $paciente->grupo_sanguineo == 'O-' ? 'selected' : '' }}>O-</option>
                                <option value="Nulo" {{ $paciente->grupo_sanguineo == 'Nulo' ? 'selected' : '' }}>Nulo</option>
                            </select>
                            <small class="text-muted">Seleccione el grupo sanguíneo del paciente.</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="alergias">Alergias</label>
                            <input type="text" id="alergias" value="{{$paciente->alergias}}" name="alergias" class="form-control" placeholder="Ejemplo: Penicilina, Polvo">
                            <small class="text-muted">Ingrese las alergias del paciente (si existen).</small>
                            @error('alergias')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="contacto_emergencia">Contacto De Emergencia</label> 
                            <input type="number" id="contacto_emergencia" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control" placeholder="Ejemplo: 04127076999">
                            <small class="text-muted">Ingrese un contacto de emergencia (opcional).</small>
                            @error('contacto_emergencia')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <input type="text" id="observaciones" value="{{$paciente->observaciones}}" name="observaciones" class="form-control" placeholder="Ejemplo: Paciente con diabetes controlada">
                            <small class="text-muted">Ingrese observaciones adicionales sobre el paciente (opcional).</small>
                            @error('observaciones')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Paciente</button>
                        </div>
                    </div>
                </div>
         </form>
      </div>
    </div>
 </div>
</div>
@endsection