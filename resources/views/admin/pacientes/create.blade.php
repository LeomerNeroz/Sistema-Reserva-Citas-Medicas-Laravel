@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Registro De Un Nuevo Paciente</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llenen Los Datos</h3>
        </div>
      
        <div class="card-body">
         <form action="{{ url('/admin/pacientes/create') }}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombres">Nombres</label> <b>*</b>
                            <input type="text" id="nombres" value="{{ old('nombres') }}" name="nombres" class="form-control" placeholder="Ejemplo: Juan Carlos" required>
                            <small class="text-muted">Ingrese los nombres del paciente.</small>
                            @error('nombres')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label> <b>*</b>
                            <input type="text" id="apellidos" value="{{ old('apellidos') }}" name="apellidos" class="form-control" placeholder="Ejemplo: Pérez López" required>
                            <small class="text-muted">Ingrese los apellidos del paciente.</small>
                            @error('apellidos')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ci">CI</label>
                            <input type="text" id="ci" value="{{ old('ci') }}" name="ci" class="form-control" placeholder="Ejemplo: V-12345678">
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
                            <input type="date" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento" class="form-control" required>
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
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                                <option value="O">OTROS</option>
                            </select>
                            <small class="text-muted">Seleccione el género del paciente.</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="celular">Celular</label> <b>*</b>
                            <input type="number" id="celular" value="{{ old('celular') }}" name="celular" class="form-control" placeholder="Ejemplo: 04127076999" required>
                            <small class="text-muted">Ingrese un número de celular válido.</small>
                            @error('celular')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>                  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label> <b>*</b>
                            <input type="email" id="correo" value="{{ old('correo') }}" name="correo" class="form-control" placeholder="Ejemplo: juan.perez@example.com" required>
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
                            <input type="text" id="direccion" value="{{ old('direccion') }}" name="direccion" class="form-control" placeholder="Ejemplo: Calle Principal, Casa #123" required>
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
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="Nulo">Nulo</option>
                            </select>
                            <small class="text-muted">Seleccione el grupo sanguíneo del paciente.</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="alergias">Alergias</label>
                            <input type="text" id="alergias" value="{{ old('alergias') }}" name="alergias" class="form-control" placeholder="Ejemplo: Penicilina, Polvo">
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
                            <input type="number" id="contacto_emergencia" value="{{ old('contacto_emergencia') }}" name="contacto_emergencia" class="form-control" placeholder="Ejemplo: 04127076999">
                            <small class="text-muted">Ingrese un contacto de emergencia (opcional).</small>
                            @error('contacto_emergencia')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <input type="text" id="observaciones" value="{{ old('observaciones') }}" name="observaciones" class="form-control" placeholder="Ejemplo: Paciente con diabetes controlada">
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
                            <button type="submit" class="btn btn-primary">Registrar Paciente</button>
                        </div>
                    </div>
                </div>
         </form>
      </div>
    </div>
 </div>
</div>
@endsection