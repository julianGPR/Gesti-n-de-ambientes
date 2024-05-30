<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Agregar Nuevo Usuario</h1>
    </div>
    <div class="datetime">
        <?php
            date_default_timezone_set('America/Bogota');
            $fechaActual = date("d/m/Y");
            $horaActual = date("h:i a");
        ?>
        <div class="datetime">
            <div class="fecha">
                <p>Fecha actual: <?php echo $fechaActual; ?></p>
            </div>
            <div class="hora">
                <p>Hora actual: <?php echo $horaActual; ?></p>
            </div>
        </div>
    </div>
</header>
<section class="create-ambiente" id="section-create-usuario">
    <form action="createAmbiente" method="POST">
        <label for="nombres">Nombre del usuario:</label><br>
        <input type="text" id="nombres" name="nombres" required><br><br>

        <label for="apellidos">Apellidos del usuario:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br>

        <label for="clave">Contraseña:</label><br>
        <input type="text" id="clave" name="clave" readonly><br>
        <button type="button" id="generarClave">Generar Contraseña</button>
        <br><br>

        <label for="rol">Rol:</label><br>
        <select id="rol" name="rol" required>
            <option value="Administrador">Administrador</option>
            <option value="Instructor">Instructor</option>
        </select><br><br>
        <button type="submit">Crear Usuario</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../usuarios';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
<script>
document.getElementById("generarClave").addEventListener("click", function() {
    // Generar una contraseña aleatoria de 4 dígitos
    var claveGenerada = Math.floor(Math.random() * 10000).toString().padStart(4, "0");
    
    // Mostrar la contraseña en el campo de entrada
    document.getElementById("clave").value = claveGenerada;
});
</script>
</body>
</html>
