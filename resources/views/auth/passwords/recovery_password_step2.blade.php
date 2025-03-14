<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recuperación de Contraseña</title>

  

 
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('{{ url('assets/img/heroo.jpg') }}');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    .login-box {
      width: 400px;
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px; 
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center; 
    }
    .card-header, .card-body {
      border-radius: 10px; 
    }
    .card-primary.card-outline {
      border-top: 3px solid #007bff;
      border: 2px solid #007bff; 
      box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); 
    }
    .form-group label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }
    .form-group input {
      padding: 10px;
      font-size: 1rem;
      margin-bottom: 15px;
    }
    .btn-custom {
      background-color: #007bff;
      border-color: #007bff;
      color: white;
      padding: 10px;
      font-size: 1.2rem;
    }
    .btn-custom:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .h1 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #0c0c0c;
    }
    .error-message {
      color: red;
      font-weight: bold;
      margin-top: 10px;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>Recuperación de Contraseña</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Responde las preguntas de seguridad para continuar con la recuperación de tu contraseña.</p>

       
        @if ($errors->has('security_answers'))
          <div class="error-message">
            {{ $errors->first('security_answers') }}
          </div>
        @endif

        <form action="{{ route('verify.security.answers') }}" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{ old('user_id') ?? $user->id }}">
        
          
          <div class="form-group">
            <label for="security_answer_1" class="col-form-label">{{ $securityQuestions[$user->security_question_1_id]->question }}</label>
            <input type="text" name="security_answer_1" id="security_answer_1" class="form-control" required value="{{ old('security_answer_1') }}">
          </div>
        
          <div class="form-group">
            <label for="security_answer_2" class="col-form-label">{{ $securityQuestions[$user->security_question_2_id]->question }}</label>
            <input type="text" name="security_answer_2" id="security_answer_2" class="form-control" required value="{{ old('security_answer_2') }}">
          </div>
        
          <div class="form-group">
            <label for="security_answer_3" class="col-form-label">{{ $securityQuestions[$user->security_question_3_id]->question }}</label>
            <input type="text" name="security_answer_3" id="security_answer_3" class="form-control" required value="{{ old('security_answer_3') }}">
          </div>
        
          <button type="submit" class="btn btn-custom btn-block">Verificar</button>
        </form>

        <br>

        <p class="mb-0">
          <a href="{{ route('recovery.password.step1') }}" class="text-center">¿Regresar al Inicio de Sesión?</a>
        </p>
      </div>
    </div>
  </div>

 
  
</body>
</html>