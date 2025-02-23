<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema De Reserva De Citas Medicas</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
 
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 
  <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition login-page" 
 style="background-image: url('assets/img/heroo.jpg');
 background-repeat:no-repeat;
 background-size: 100vw 100vh;
 background-attachment: fixed">
<div class="login-box">
 
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>San Judas Tadeo</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registro De Usuario</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
          <label for="name" class="col-form-label text-md-end">{{ __('Nombres') }}</label>
          <div class="col-md-12">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="row">
          <label for="email" class="col-form-label text-md-end">{{ __('Correo Electronico') }}</label>
          <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="row">
          <label for="password" class="col-form-label text-md-end">{{ __('Contraseña') }}</label>
          <div class="col-md-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="row">
          <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirmacion De Contraseña') }}</label>
          <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>

       
        <div class="row">
          <label for="security_question_1" class="col-form-label text-md-end">{{ __('Pregunta de Seguridad 1') }}</label>
          <div class="col-md-12">
            <select name="security_question_1_id" class="form-control" id="security_question_1" required>
              <option value="">Seleccione una pregunta</option>
              @foreach($securityQuestions as $question)
                <option value="{{ $question->id }}">{{ $question->question }}</option>
              @endforeach
            </select>
            <input type="text" name="security_answer_1" class="form-control mt-2" placeholder="Respuesta" required>
          </div>
        </div>

        <div class="row">
          <label for="security_question_2" class="col-form-label text-md-end">{{ __('Pregunta de Seguridad 2') }}</label>
          <div class="col-md-12">
            <select name="security_question_2_id" class="form-control" id="security_question_2" required>
              <option value="">Seleccione una pregunta</option>
              @foreach($securityQuestions as $question)
                <option value="{{ $question->id }}">{{ $question->question }}</option>
              @endforeach
            </select>
            <input type="text" name="security_answer_2" class="form-control mt-2" placeholder="Respuesta" required>
          </div>
        </div>

        <div class="row">
          <label for="security_question_3" class="col-form-label text-md-end">{{ __('Pregunta de Seguridad 3') }}</label>
          <div class="col-md-12">
            <select name="security_question_3_id" class="form-control" id="security_question_3" required>
              <option value="">Seleccione una pregunta</option>
              @foreach($securityQuestions as $question)
                <option value="{{ $question->id }}">{{ $question->question }}</option>
              @endforeach
            </select>
            <input type="text" name="security_answer_3" class="form-control mt-2" placeholder="Respuesta" required>
          </div>
        </div>
<hr>
        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">
              Registrar
            </button>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <a href="{{ url('login') }}" class="btn btn-primary btn-block">Volver Al Inicio De Sesión</a>
          </div>
        </div>
      </form>
    </div>
   
  </div>
 
</div>



<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>