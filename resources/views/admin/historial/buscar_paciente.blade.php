@extends ('layouts.admin')
@section('content')

<div class="row">
  <h1>Busqueda De Paciente:</h1>
</div>

<hr>

<div class="row ">
 <div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Buscar Al Paciente</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.historial.buscar_paciente')}}" method="get">
                <div class="row justify-content-xl-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ci">Cedula de identidad:</label>
                            <input type="text" name="ci" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div style="height: 32px;"></div>
                            <button type="submit" class="btn btn-primary"> <i class="bi bi-search"></i> Buscar </button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            @if($paciente)
            <div class="text-center">
            <h4>Informacion Del Paciente</h4>
            <div class="row justify-content-center">
                <table>
                    <tr>
                        <td><b>Paciente: </b></td>
                        <td>{{ $paciente->apellidos." ".$paciente->nombres }}</td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Cedula De Identidad: </b></td>
                        <td>{{ $paciente->ci }}</td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>grupo_sanguineo: </b></td>
                        <td>{{ $paciente->grupo_sanguineo }}</td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Fecha de nacimiento: </b></td>
                        <td>{{ $paciente->fecha_nacimiento }}</td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Alergias: </b></td>
                        <td>{{ $paciente->alergias }}</td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Celular: </b></td>
                        <td>{{ $paciente->celular }}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
            <div>
                <br>
                <a href="{{ route('admin.historial.imprimir_historial', $paciente->id) }}" 
                   class="btn btn-primary btn-sm btn-block">
                   Ver Historial
                </a>
            </div>
            
@else
<p>Paciente No Regristrado</p> 
@endif
            
            

        
        
        </div>
    </div>
 </div>
</div>

@endsection
