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
        <h1>Agregar Nuevo Proveedor</h1>
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
        <label for="nombre_proveedor">Nombre del proveedor:</label><br>
        <input type="text" id="nombre_proveedor" name="nombre_proveedor" required><br><br>

        <label for="direccion">Direccion del proveedor:</label><br>
        <input type="text" id="direccion" name="direccion" required><br>

        <label for="telefono">Telefono del proveedor:</label><br>
        <input type="number" id="telefono" name="telefono" required><br>

        <label for="email">Correo del proveedor:</label><br>
        <input type="email" id="email" name="email" required><br>

        <button type="submit">Crear proveedor</button>
    </form>
</section>
<footer>
    <p>Gafra todos los derechos reservados </p>
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
</body>
</html>
