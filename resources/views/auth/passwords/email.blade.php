<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>recuperar contraseña</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition login-page" 
 style="background-image: url('{{ url('assets/img/hero-bg.jpg') }}');
 background-repeat:no-repeat;
 background-size: 100vw 100vh;
 background-attachment: fixed">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>San Judas Tadeo</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">recuperar contraseña</p>

        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="email" class="col-form-label">correo electrónico:</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">enviar enlace</button>
          </div>
        </div>
      </form>
      
      <br>
      <p class="mb-0">
        <a href="{{ url('login') }}" class="text-center">volver al inicio de sesión</a>
      </p>

    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
