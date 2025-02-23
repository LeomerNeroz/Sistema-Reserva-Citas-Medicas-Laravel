<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
   
    <style>
        .tabla-contenido {
          background-color: #e2dbdb;
          padding: 10px;
          border-radius: 10px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          max-width: 100%;
          width: 100%; 
          box-sizing: border-box;
        }
      </style>
      
      <table border="0" style="font-size: 10pt" class="tabla-contenido">
        <tr>
          <td style="text-align: center">
            Centro de Salud San Judas Tadeo<br>
            Calle Oswaldo Castellano entre calle Garcés y avenida Independencia, Coro, Edo Falcón<br>
            +58 412-5456446<br>
            cesaludsjt@gmail.com<br>
          </td>
          <td width="330px"></td>
        </tr>
      </table>
      
      
      
    
    
    <h3 style="text-align: center"><u>Historial Clinico</u></h3>
    <br>

    <h4>Informacion Del Paciente</h4>
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
    <hr>

<h4>Diagnosticos realizados</h4>

@foreach ($historiales as $historiale)
   
<table>
    <tr>
        <td><b>Fecha: </b></td>
        <td>{{ $historiale->fecha_visita }}</td>
    </tr>
    <br>
    <tr>
        <td><b>Doctor: </b></td>
        <td>{{ $historiale->doctor->apellidos." ".$historiale->doctor->nombres }}</td>
    </tr>
    <br>
    <tr>
        <td><b>Resultado: </b></td>
        <td>{!! $historiale->detalle !!}</td>
    </tr>
</table>
<hr>
@endforeach





    

      
      
</body>
</html>