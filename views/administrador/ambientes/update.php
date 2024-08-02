<<<<<<< HEAD

<!DOCTYPE html>
<html lang="es">
=======
<?php
    // Verificar si la actualización fue exitosa mediante el parámetro GET 'success'
    if(isset($_GET['success']) && $_GET['success'] === 'true'): ?>
        <script>
            alert("Ambiente actualizado exitosamente");
        </script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ambiente</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Editar Ambiente</h1>
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
<section class="update-ambiente" id="section-update-ambiente">
<<<<<<< HEAD
<form action="../updateAmbiente/<?php echo $ambiente['Id_ambiente']; ?>" method="POST">
=======
    <form action="../updateAmbiente/<?php echo $ambiente['Id_ambiente']; ?>" method="POST">
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
        
        <label for="nombre">Nombre del Ambiente:</label><br>
        <!-- Mostrar el valor del nombre del ambiente si está definido -->
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($ambiente['Nombre']) ? $ambiente['Nombre'] : ''; ?>" required><br><br>

<<<<<<< HEAD
        <label for="torre">Torre:</label><br>
        <select id="torre" name="torre" required>
            <option value="Oriental" <?php if(isset($ambiente['Torre']) && $ambiente['Torre'] === 'Oriental') echo 'selected'; ?>>Oriental</option>
            <option value="Occidental" <?php if(isset($ambiente['Torre']) && $ambiente['Torre'] === 'Occidental') echo 'selected'; ?>>Occidental</option>
        </select><br><br>
        
        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"><?php echo isset($ambiente['Observaciones']) ? $ambiente['Observaciones'] : ''; ?></textarea><br><br>
=======
        <label for="computadores">Computadores:</label><br>
        <input type="number" id="computadores" name="computadores" value="<?php echo isset($ambiente['Computadores']) ? $ambiente['Computadores'] : ''; ?>" required><br><br>

        <label for="tv">TV:</label><br>
        <input type="number" id="tv" name="tv" value="<?php echo isset($ambiente['Tv']) ? $ambiente['Tv'] : ''; ?>" required><br><br>

        <label for="sillas">Sillas:</label><br>
        <input type="number" id="sillas" name="sillas" value="<?php echo isset($ambiente['Sillas']) ? $ambiente['Sillas'] : ''; ?>" required><br><br>

        <label for="mesas">Mesas:</label><br>
        <input type="number" id="mesas" name="mesas" value="<?php echo isset($ambiente['Mesas']) ? $ambiente['Mesas'] : ''; ?>" required><br><br>

        <label for="tablero">Tablero:</label><br>
        <input type="number" id="tablero" name="tablero" value="<?php echo isset($ambiente['Tablero']) ? $ambiente['Tablero'] : ''; ?>" required><br><br>

        <label for="archivador">Archivador:</label><br>
        <input type="number" id="archivador" name="archivador" value="<?php echo isset($ambiente['Archivador']) ? $ambiente['Archivador'] : ''; ?>" required><br><br>

        <label for="infraestructura">Infraestructura:</label><br>
        <input type="number" id="infraestructura" name="infraestructura" value="<?php echo isset($ambiente['Infraestructura']) ? $ambiente['Infraestructura'] : ''; ?>" required><br><br>

        <label for="observacion">Observación:</label><br>
        <textarea id="observacion" name="observacion" rows="4" cols="50"><?php echo isset($ambiente['Observacion']) ? $ambiente['Observacion'] : ''; ?></textarea><br><br>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128

        <button type="submit">Guardar Cambios</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
<<<<<<< HEAD
<div class="regresar">
    <?php
    $url_regresar = '../ambientes';
=======

<div class="regresar">
    <?php
    $url_regresar = 'admin';
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
