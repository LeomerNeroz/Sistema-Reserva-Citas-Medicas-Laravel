@extends ('layouts.admin')
@section('content')

<div class="row">
  <h1>Modificar Historial</h1>
</div>

<hr>

<div class="row">
 <div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/historial' ,$historial->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select name="paciente_id" id="paciente_id" class="form-control">
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}" {{$historial->paciente_id == $paciente->id ? 'selected':''}}>{{$paciente->nombres." ".$paciente->apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_visita">Fecha De La Cita Medica</label>
                            <input type="date" name="fecha_visita" value="{{$historial->fecha_visita}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="detalle">Descripción de la cita</label>
                            <textarea name="detalle" id="detalle" rows="3" class="form-control" placeholder="Escriba una breve descripción de la cita" required minlength="10" style="border: 2px solid #4CAF50; border-radius: 5px; padding: 10px; font-size: 16px;">{!!$historial->detalle!!}</textarea>
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select name="doctor_id" id="doctor_id" class="form-control">
                                @foreach($doctores as $doctor)
                                <option value="{{$doctor->id}}" {{$historial->doctor_id == $doctor->id ? 'selected':''}}>{{$doctor->nombres." ".$doctor->apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
      
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/historial')}}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>

@endsection
