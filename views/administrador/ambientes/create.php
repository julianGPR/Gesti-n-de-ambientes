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
            <h1>Agregar Nuevo Ambiente</h1>
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
</div>
<section class="create-ambiente" id="section-create-ambiente">
    <form action="createAmbiente" method="POST">
        <label for="nombre">Nombre del Ambiente:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="computadores">Computadores:</label><br>
        <input type="number" id="computadores" name="computadores" required><br><br>

        <label for="tv">TV:</label><br>
        <input type="number" id="tv" name="tv" required><br><br>

        <label for="sillas">Sillas:</label><br>
        <input type="number" id="sillas" name="sillas" required><br><br>

        <label for="mesas">Mesas:</label><br>
        <input type="number" id="mesas" name="mesas" required><br><br>

        <label for="tablero">Tablero:</label><br>
        <input type="number" id="tablero" name="tablero" required><br><br>

        <label for="archivador">Archivador:</label><br>
        <input type="number" id="archivador" name="archivador" required><br><br>

        <label for="infraestructura">Infraestructura:</label><br>
        <input type="number" id="infraestructura" name="infraestructura" required><br><br>

        <label for="observacion">Observación:</label><br>
        <textarea id="observacion" name="observacion" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar Ambiente</button>
    </form>
    </section>
<<<<<<< HEAD
    <footer>
        <p>Sena derechos recervados</p>
    </footer>
=======
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
    <div class="regresar">
    <?php
    $url_regresar = 'admin';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
>>>>>>> origin/devjuan
</body>
</html>
