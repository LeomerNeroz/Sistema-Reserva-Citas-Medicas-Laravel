<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reiniciar Contraseña</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

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
      color: #0b0c0c;
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
        <a href="" class="h1"><b>Reiniciar Contraseña</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Introduce tu nueva contraseña para completar el proceso de recuperación.</p>

        <form id="resetPasswordForm" action="{{ route('reset.password') }}" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{ $user->id }}">

          <div class="form-group">
            <label for="password" class="col-form-label">Nueva Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="8">
          </div>

          <div class="form-group">
            <label for="password_confirmation" class="col-form-label">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
          </div>

          <!-- Mensajes de error -->
          <div id="passwordError" class="error-message" style="display: none;">
            Las contraseñas no coinciden.
          </div>
          <div id="lengthError" class="error-message" style="display: none;">
            La contraseña debe tener al menos 8 caracteres.
          </div>

          <button type="submit" class="btn btn-custom btn-block">Actualizar</button>
        </form>

        <br>

        <p class="mb-0">
          <a href="{{ route('login') }}" class="text-center">¿Ya tienes una cuenta? Inicia sesión</a>
        </p>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password_confirmation').value;
      const passwordError = document.getElementById('passwordError');
      const lengthError = document.getElementById('lengthError');

      // Validar longitud mínima de la contraseña
      if (password.length < 8) {
        event.preventDefault(); // Evitar envío del formulario
        lengthError.style.display = 'block'; // Mostrar mensaje de longitud
      } else {
        lengthError.style.display = 'none'; // Ocultar mensaje si es válido
      }

      // Validar coincidencia de contraseñas
      if (password !== confirmPassword) {
        event.preventDefault(); // Evitar envío del formulario
        passwordError.style.display = 'block'; // Mostrar mensaje de coincidencia
      } else {
        passwordError.style.display = 'none'; // Ocultar mensaje si coinciden
      }
    });

    // Limpiar mensajes de error cuando el usuario escriba
    document.getElementById('password').addEventListener('input', function() {
      const lengthError = document.getElementById('lengthError');
      if (this.value.length >= 8) {
        lengthError.style.display = 'none'; // Ocultar mensaje si la longitud es válida
      }
    });

    document.getElementById('password_confirmation').addEventListener('input', function() {
      const passwordError = document.getElementById('passwordError');
      const password = document.getElementById('password').value;
      const confirmPassword = this.value;

      if (password === confirmPassword) {
        passwordError.style.display = 'none'; // Ocultar mensaje si coinciden
      }
    });
  </script>
</body>
</html>