<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="public/css/login.css">
    <style>
        body, html {
            background-image: url(assets/1371030.png);
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets\style.css">
    <title>Login</title>
</head>

<body>
    <header class="header-container">
        <a href="#" class="header-logo">Gafra</a>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icons">
            <i class='bx bx-menu' id="open-menu-icon"></i>
            <i class='bx bx-x' id="close-menu-icon"></i>
        </label>
        <nav class="nav-links">
            <a href="#" style="--i:0;">Inicio</a>
            <a href="#" style="--i:1;">Servicios</a>
            <a href="#" style="--i:2;">Contáctanos</a>
            <a href="#" style="--i:3;">Acerca de</a>
        </nav>
    </header>

    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <img src="assets\Logo-Sena.jpg" alt="Logo de la empresa">
                <p>Te damos la bienvenida a nuestra plataforma, donde podrás explorar todos los detalles de nuestra
                    empresa. Descubre nuestra visión y misión para conocer más sobre nosotros.</p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>GAFRA</h2>
                <div class="vision">
                    <h3>Visión</h3>
                    <p>Ser la marca líder global en la fabricación de productos innovadores y de alta calidad para
                        bebés, reconocidos por nuestra excelencia en diseño, seguridad y cuidado del medio ambiente.</p>
                </div>
                <div class="mission">
                    <h3>Misión</h3>
                    <p>Comprometernos a diseñar y fabricar productos seguros, cómodos y funcionales que mejoren la vida
                        de los bebés y sus familias, manteniendo altos estándares de calidad, seguridad y
                        sostenibilidad, mientras inspiramos confianza en nuestros clientes y facilitamos el desarrollo
                        saludable de los más pequeños.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-form login hide">
        <div class="information">
            <div class="info-childs">
                <img src="assets\Logo-Sena.jpg" alt="Logo de la empresa">
                <p> Bienvenido a nuestra plataforma de gestión de inventario. Optimiza tu almacenamiento y control de
                    productos hoy mismo.</p>
                <input type="button" value="Conocer más" id="sign-up">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxs-book-bookmark'></i>
                </div>
                <p>¿Necesitas ayuda?</p>
                <form action="/dashboard/gestion%20de%20ambientes/login/login" method="POST" class="form">
                    <div>
                        <label>
                            <i class='bx bx-envelope'></i>
                            <input type="text" id="login" name="login" placeholder="Correo" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" id="password" name="password" placeholder="Clave" required>
                        </label>
                    </div>
                    <input type="submit" value="Iniciar Sesión">
                    <div class="alerta-error">Todos los campos son obligatorios</div>
                    <div class="alerta-exito">Te registraste correctamente</div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/register.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</body>
</html>

