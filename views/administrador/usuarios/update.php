<?php
    // Verificar si la actualización fue exitosa mediante el parámetro GET 'success'
    if(isset($_GET['success']) && $_GET['success'] === 'true'): ?>
        <script>
            alert("Ambiente actualizado exitosamente");
        </script>
<?php endif; ?>

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
            <h1>Editar Usuario</h1>
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
<section class="update-ambiente" id="section-update-usuario">
    <form action="../updateUsuario/<?php echo $usuario['Id_usuario']; ?>" method="POST">
        <label for="nombres">Nombre del Instructor:</label><br>
        <input type="text" id="nombres" name="nombres" value="<?php echo isset($usuario['Nombres']) ? $usuario['Nombres'] : ''; ?>" required><br><br>

        <label for="apellidos">Apellidos del Instructor:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo isset($usuario['Apellidos']) ? $usuario['Apellidos'] : ''; ?>" required><br><br>

        <label for="correo">Apellidos del Instructor:</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo isset($usuario['Correo']) ? $usuario['Correo'] : ''; ?>" required><br><br>

        <label for="pin">Pin del Instructor:</label><br>
        <input type="number" id="pin" name="pin" value="<?php echo isset($usuario['Clave']) ? $usuario['Clave'] : ''; ?>" required><br><br>

        <label for="Rol">Rol:</label><br>
        <input type="text" id="Rol" name="Rol" value="<?php echo isset($usuario['Rol']) ? $usuario['Rol'] : ''; ?>" required><br><br>

        <button type="submit">Guardar Cambios</button>
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
</body>
</html>
