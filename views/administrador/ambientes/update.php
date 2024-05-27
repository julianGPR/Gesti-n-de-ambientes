
<!DOCTYPE html>
<html lang="es">
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

        <label for="torre">Torre:</label><br>
        <select id="torre" name="torre" required>
            <option value="Oriental" <?php if(isset($ambiente['Torre']) && $ambiente['Torre'] === 'Oriental') echo 'selected'; ?>>Oriental</option>
            <option value="Occidental" <?php if(isset($ambiente['Torre']) && $ambiente['Torre'] === 'Occidental') echo 'selected'; ?>>Occidental</option>
        </select><br><br>

        <label for="computadores">Computadores:</label><br>
        <input type="number" id="computadores" name="computadores" value="<?php echo isset($ambiente['Computadores']) ? $ambiente['Computadores'] : ''; ?>"><br><br>

        <label for="tvs">Tvs:</label><br>
        <input type="number" id="tvs" name="tvs" value="<?php echo isset($ambiente['Tvs']) ? $ambiente['Tvs'] : ''; ?>"><br><br>

        <label for="sillas">Sillas:</label><br>
        <input type="number" id="sillas" name="sillas" value="<?php echo isset($ambiente['Sillas']) ? $ambiente['Sillas'] : ''; ?>"><br><br>

        <label for="mesas">Mesas:</label><br>
        <input type="number" id="mesas" name="mesas" value="<?php echo isset($ambiente['Mesas']) ? $ambiente['Mesas'] : ''; ?>"><br><br>

        <label for="tableros">Tableros:</label><br>
        <input type="number" id="tableros" name="tableros" value="<?php echo isset($ambiente['Tableros']) ? $ambiente['Tableros'] : ''; ?>"><br><br>

        <label for="nineras">Nineras:</label><br>
        <input type="number" id="nineras" name="nineras" value="<?php echo isset($ambiente['Nineras']) ? $ambiente['Nineras'] : ''; ?>"><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"><?php echo isset($ambiente['Observaciones']) ? $ambiente['Observaciones'] : ''; ?></textarea><br><br>

        <button type="submit">Guardar Cambios</button>
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
