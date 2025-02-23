@extends ('layouts.admin')
@section('content')

<div class="row">
  <h1>Paciente: {{$historial->paciente->nombres." " .$historial->paciente->apellidos}}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>
        <div class="card-body">
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <p>{{$historial->paciente->nombres." " .$historial->paciente->apellidos}}</p>
                        </div>
                    </div>

                   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="paciente_id">Paciente</label>
                                <p>{{$historial->paciente->ci}}</p>
                            </div>
                        </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_visita">Fecha De La Cita Medica</label>
                            <p>{{$historial->fecha_visita}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="detalle">Descripción de la cita</label>
                            <p>{!!$historial->detalle!!}</p>

                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <p>{{$historial->doctor->nombres}}</p>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/historial')}}" class="btn btn-secondary">Volver</a>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
 </div>
</div>

@endsection
