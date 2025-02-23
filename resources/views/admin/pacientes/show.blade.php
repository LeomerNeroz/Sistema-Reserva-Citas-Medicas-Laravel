@extends ('layouts.admin')
@section('content')
<div class="row">
  <h1>Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
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
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> 
                           <p>{{$paciente->nombres}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> 
                            <p>{{$paciente->apellidos}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">CI</label>
                            <p>{{$paciente->ci}}</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha De Nacimiento</label>
                            <p>{{$paciente->fecha_nacimiento}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Genero</label>
                            <p>{{ $paciente->genero_completo }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label> 
                            <p>{{$paciente->celular}}</p>
                        </div>
                    </div>                  
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Correo Electronico</label> 
                                <p>{{$paciente->correo}}</p>
                            </div>
                        </div>
                    </div>
                    
                <br>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Direccion</label> 
                                <p>{{$paciente->direccion}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Grupo Sanguineo</label> <b>*</b>
                                <p>{{$paciente->grupo_sanguineo}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Alergias</label>
                                <p>{{$paciente->alergias}}</p>
                            </div>
                        </div>
                      </div>
                    <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Contacto De Emergencia</label> 
                            <p>{{$paciente->contacto_emergencia}}</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Observaciones</label>
                            <p>{{$paciente->observaciones}}</p>
                        </div>
                    </div>
                  </div>
                
                  <br>
                  <hr>
        <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{ url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                        
                    </div>
                </div>
              </div>
        
      </div>
    </div>
 </div>
</div>

@endsection