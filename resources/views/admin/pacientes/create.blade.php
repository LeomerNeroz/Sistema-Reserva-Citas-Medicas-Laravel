@extends ('layouts.admin')
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
         <form action="{{url ('/admin/pacientes/create')}}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Nombres</label> <b>*</b>
                            <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                            @error('nombres')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Apellidos</label> <b>*</b>
                            <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                            @error('apellidos')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">CI</label>
                            <input type="text" value="{{old('ci')}}" name="ci" class="form-control">
                            @error('ci')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha De Nacimiento</label> <b>*</b>
                            <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                            @error('fecha_nacimiento')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Genero</label> <b>*</b>
                            <select name="genero" id="" class="form-control">
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                                <option value="O">OTROS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label> <b>*</b>
                            <input type="number" value="{{old('celular')}}" name="celular" class="form-control" required>
                            @error('celular')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>                  
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Correo Electronico</label> <b>*</b>
                                <input type="email" value="{{old('correo')}}" name="correo" class="form-control" required>
                                @error('correo')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                            </div>
                        </div>
                    </div>
                    
                <br>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Direccion</label> <b>*</b>
                                <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                @error('direccion')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Grupo Sanguineo</label> <b>*</b>
                                <select name="grupo_sanguineo" id="" class="form-control" required>
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
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Alergias</label>
                                <input type="text" value="{{old('alergias')}}" name="alergias" class="form-control">
                                @error('alergias')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                            </div>
                        </div>
                      </div>
                    <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Contacto De Emergencia</label> 
                            <input type="number" value="{{old('contacto_emergencia')}}" name="contacto_emergencia" class="form-control">
                            @error('contacto_emergencia')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Observaciones</label>
                            <input type="text" value="{{old('observaciones')}}" name="observaciones" class="form-control">
                            @error('observaciones')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                  </div>
                
                  <br>
                  <hr>
        <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{ url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
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