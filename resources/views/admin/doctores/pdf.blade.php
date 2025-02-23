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
      
      
      
    
    
    <h2 style="text-align: center"><u>Listado del personal medico</u></h2>
    <br>

    <style>
        .table {
          width: 100%;
          border-collapse: collapse;
        }
      
        .table th, .table td {
          border: 1px solid #dddddd;
          text-align: center;
          padding: 8px;
        }
      
        .table th {
          background-color: #f2f2f2;
          color: #333;
        }
      
        .table tr:nth-child(even) {
          background-color: #f9f9f9;
        }
      
        .table tr:hover {
          background-color: #f1f1f1;
        }
      </style>
      
      <table class="table table-bordered table-sm table-striped">
        <thead>
          <tr style="background-color: #e7e7e7">
            <th>Nro</th>
            <th>Apellidos y nombres</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Especialidad</th>
          </tr>
        </thead>
        <tbody>
          <?php $contador = 1;?>
          @foreach($doctores as $doctore)
          <tr>
            <td>{{$contador++}}</td>
            <td>{{$doctore->apellidos . " " . $doctore->nombres}}</td>
            <td>{{$doctore->telefono}}</td>
            <td>{{$doctore->email}}</td>
            <td>{{$doctore->especialidad}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
</body>
</html>