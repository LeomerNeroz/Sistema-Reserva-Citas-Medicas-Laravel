@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1>Registro De Un Nuevo Usuario</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llenen Los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/usuarios/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre Del Usuario <b>*</b></label>
                        <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control" required>
                        @error('name')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico <b>*</b></label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control" required>
                        @error('email')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña <b>*</b></label>
                        <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control" required>
                        @error('password')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirme Contraseña <b>*</b></label>
                        <input type="password" id="password_confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" required>
                        @error('password_confirmation')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rol">Asignar Rol</label>
                        <select name="rol" id="rol" class="form-control">
                            <option value="" disabled selected>Selecciona Un Rol</option>
                            <option value="secretaria">Secretaria</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection