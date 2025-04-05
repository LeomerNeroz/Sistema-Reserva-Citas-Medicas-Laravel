@extends('layouts.admin')

@section('content')
<div class="row">
  <h1>Modificar Usuario: {{$usuario->name}}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/usuarios', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre del usuario -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre del usuario</label> <b>*</b>
                                <input type="text" id="name" value="{{ $usuario->name }}" name="name" class="form-control" placeholder="Ejemplo: Juan Pérez" required>
                                <small class="text-muted">Ingrese el nombre completo del usuario.</small>
                                @error('name')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Email -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label> <b>*</b>
                                <input type="email" id="email" value="{{ $usuario->email }}" name="email" class="form-control" placeholder="Ejemplo: juan.perez@example.com" required>
                                <small class="text-muted">Ingrese un correo electrónico válido.</small>
                                @error('email')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Contraseña -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Deje en blanco si no desea cambiarla">
                                <small class="text-muted">Ingrese una nueva contraseña (opcional).</small>
                                @error('password')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Confirmar Contraseña -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirme Contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repita la nueva contraseña">
                                <small class="text-muted">Confirme la nueva contraseña (si se cambió).</small>
                                @error('password_confirmation')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Asignar Rol -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rol">Asignar Rol</label>
                                <select id="rol" name="rol" class="form-control">
                                    <option value="" disabled selected>Selecciona Un Rol</option>
                                    <option value="secretaria" {{ $usuario->rol === 'secretaria' ? 'selected' : '' }}>Secretaria</option>
                                    <option value="admin" {{ $usuario->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <small class="text-muted">Seleccione el rol que tendrá el usuario en el sistema.</small>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Botones de Acción -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar usuario</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection