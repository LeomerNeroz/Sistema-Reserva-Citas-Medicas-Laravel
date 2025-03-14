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

                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre del usuario</label> <b>*</b>
                                <input type="text" id="name" value="{{ $usuario->name }}" name="name" class="form-control" required>
                                @error('name')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

             
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label> <b>*</b>
                                <input type="email" id="email" value="{{ $usuario->email }}" name="email" class="form-control" required>
                                @error('email')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                  
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control">
                                @error('password')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                   
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirme Contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                   
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rol">Asignar Rol</label>
                                <select id="rol" name="rol" class="form-control">
                                    <option value="" disabled selected>Selecciona Un Rol</option>
                                    <option value="secretaria" {{ $usuario->rol === 'secretaria' ? 'selected' : '' }}>Secretaria</option>
                                    <option value="admin" {{ $usuario->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                  
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