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
<section class="create-ambiente" id="section-create-ambiente">
    <form action="createAmbiente" method="POST">
        <label for="nombre">Nombre del Ambiente:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="torre">Torre:</label><br>
        <select id="torre" name="torre">
            <option value="Oriental">Oriental</option>
            <option value="Occidental">Occidental</option>
        </select><br><br>

        <label for="computadores">Computadores:</label><br>
        <input type="number" id="computadores" name="computadores"><br><br>

        <label for="check_pcs">Check PCs:</label><br>
        <input type="checkbox" id="check_pcs" name="check_pcs" checked><br><br>

        <label for="tvs">TVs:</label><br>
        <input type="number" id="tvs" name="tvs"><br><br>

        <label for="check_tvs">Check TVs:</label><br>
        <input type="checkbox" id="check_tvs" name="check_tvs" checked><br><br>

        <label for="sillas">Sillas:</label><br>
        <input type="number" id="sillas" name="sillas"><br><br>

        <label for="check_sillas">Check Sillas:</label><br>
        <input type="checkbox" id="check_sillas" name="check_sillas" checked><br><br>

        <label for="mesas">Mesas:</label><br>
        <input type="number" id="mesas" name="mesas"><br><br>

        <label for="check_mesas">Check Mesas:</label><br>
        <input type="checkbox" id="check_mesas" name="check_mesas" checked><br><br>

        <label for="tableros">Tableros:</label><br>
        <input type="number" id="tableros" name="tableros"><br><br>

        <label for="check_tableros">Check Tableros:</label><br>
        <input type="checkbox" id="check_tableros" name="check_tableros" checked><br><br>

        <label for="nineras">Niñeras:</label><br>
        <input type="number" id="nineras" name="nineras"><br><br>

        <label for="check_nineras">Check Niñeras:</label><br>
        <input type="checkbox" id="check_nineras" name="check_nineras" checked><br><br>

        <label for="check_infraestructura">Check Infraestructura:</label><br>
        <input type="checkbox" id="check_infraestructura" name="check_infraestructura" checked><br><br>

        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado" value="Habilitado"><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar Ambiente</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../ambientes';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
</body>
</html>
