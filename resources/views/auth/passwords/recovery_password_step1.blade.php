<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recuperar Contraseña</title>

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
 
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 
  <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition login-page" 
 style="background-image: url('{{ url('assets/img/heroo.jpg') }}');
 background-repeat:no-repeat;
 background-size: 100vw 100vh;
 background-attachment: fixed">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>Recuperación de Contraseña</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Introduce tu correo electrónico para continuar.</p>

        <form action="{{ route('recovery.password.step2') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="email" class="col-form-label">Correo Electrónico:</label>
            <div class="">
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
        
        <br>

        <p class="mb-0">
          <a href="{{ url('register') }}" class="text-center">¿No Tienes Cuenta?</a>
        </p>
        
        <p class="mb-0">
          <a href="{{ route('login') }}" class="text-center">Volver al Inicio de Sesión</a>
        </p>
      </div>
    </div>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 
  <script src="dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
