<?php
    // Verificar si la actualización fue exitosa mediante el parámetro GET 'success'
    if(isset($_GET['success']) && $_GET['success'] === 'true'): ?>
        <script>
            alert("Ambiente actualizado exitosamente");
        </script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
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
    <form action="../updateAmbiente/<?php echo $ambiente['Id_ambiente']; ?>" method="POST">
        
        <label for="nombre">Nombre del Ambiente:</label><br>
        <!-- Mostrar el valor del nombre del ambiente si está definido -->
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($ambiente['Nombre']) ? $ambiente['Nombre'] : ''; ?>" required><br><br>

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

        <button type="submit">Guardar Cambios</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>

</body>
</html>
