<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="assets/img/login02.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/login.css" />
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="/gafra/login/login" method="POST" class="sign-in-form">
          <h2 class="title"> Iniciar sesión</h2>
          <?php
          session_start();
          if (isset($_SESSION['error_message'])) {
            echo '<div class="error-message">';
            echo '<i class="fas fa-exclamation-circle"></i> ' . $_SESSION['error_message'];
            echo '</div>';
            unset($_SESSION['error_message']); // Limpiar el mensaje después de mostrarlo
          }
          ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" id="login" name="login" placeholder="Correo" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Clave" required />
          </div>
          <input type="submit" value="Ingresar" class="btn solid" />
        </form>

        <form action="/recuperar_clave" method="POST" id="form-recuperar" class="sign-up-form">
          <h2 class="title"> Recuperar Contraseña</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" id="correo" name="correo" placeholder="Correo" required />
          </div>
          <input type="submit" class="btn" value="Enviar" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <img src="assets/img/login0.png" class="image" alt="" />
          <button class="btn transparent" id="sign-up-btn">
            <i class="fas fa-undo"></i> Recuperar
          </button>
        </div>
      </div>
      <div class="panel right-panel">
        <div class="content">
          <img src="assets/img/login02.png" class="image1" alt="" />
          <h3><i class="fas fa-question-circle"></i> ¿Olvidaste tu contraseña?</h3>
          <p>
            Ingrese su correo electrónico para recibir un enlace de recuperación de contraseña.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            <i class="fas fa-arrow-left"></i> Volver
          </button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script src="assets\Js\app.js"></script>
</body>

</html>