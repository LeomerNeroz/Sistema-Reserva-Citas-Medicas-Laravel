<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema De Reserva De Citas Medicas - Respuestas Incorrectas</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
 
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
 
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
</head>
<body class="hold-transition login-page" 
 style="background-image: url('{{ url('assets/img/heroo.jpg') }}');
 background-repeat:no-repeat;
 background-size: 100vw 100vh;
 background-attachment: fixed">
<div class="login-box">
  
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>San Judas Tadeo</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Respuestas Incorrectas</p>

      <p class="error-box-msg">Las respuestas proporcionadas a las preguntas de seguridad son incorrectas. Por favor, inténtalo de nuevo.</p>
        
      <a href="{{ route('recovery.password.step1') }}" class="btn btn-primary btn-block">Volver a Intentar</a>

    </div>
   
  </div>

</div>



<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>
</html>