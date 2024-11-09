<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets\css\login.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="/dashboard/gestion%20de%20ambientes/login/login" method="POST" class="sign-in-form">
            <h2 class="title">Iniciar sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type= "text" id="login" name="login" placeholder="Correo" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Clave" required />
            </div>
            <input type="submit" value="Ingresar" class="btn solid" />
          </form>
          <form action="/recuperar_clave" method="POST" id="form-recuperar" class="sign-up-form">
            <h2 class="title">Recuperar Contraseña</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type= "email" id="correo" name="correo" placeholder="Correo" required />
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
              Recuperar
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
          <img src="assets/img/login02.png" class="image1" alt="" />
            <h3>¿Olvidaste tu contraseña?</h3>
            <p>
            Ingrese su correo electrónico para recibir un enlace de recuperación de contraseña.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Volver
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="assets\Js\app.js"></script>
    <script>
    function showPopup() {
        document.getElementById('creditPopup').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('creditPopup').style.display = 'none';
    }
</script>
  </body>
</html>