@extends ('layouts.admin')
@section('content')

<div class="row">
  <h1>Paciente: {{$historial->paciente->nombres." " .$historial->paciente->apellidos}}</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">¿Esta Seguro De Eliminar Este Registro?</h3>
        </div>
        <div class="card-body">
            <form action="{{url ('admin/historial' , $historial->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <p>{{$historial->paciente->nombres." " .$historial->paciente->apellidos}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_visita">Fecha De La Cita Medica</label>
                            <p>{{$historial->fecha_visita}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="detalle">Descripción de la cita</label>
                            <p>{!!$historial->detalle!!}</p>

                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <p>{{$historial->doctor->nombres}}</p>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/historial')}}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>

@endsection
