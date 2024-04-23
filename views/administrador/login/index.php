
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro e Inicio de Sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/login.css">

</head>

<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenidos</h2>
                <p>
                    Para unirte a nuestra comunidad por favor inicia sesión con tus datos
                </p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>

    
        <div class="form-information">

        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                    <i class='bx bxl-github' ></i>
                    <i class='bx bxl-linkedin' ></i>
                </div>
                <p>O iniciar sesión con una Cuenta</p>
                <form class="form" method="POST">
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input name="pin" type="password" placeholder="Contraseña">
                    </label>
                    <input name="sing-in" type="submit" value="Iniciar Sesion">
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>
