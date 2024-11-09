<?php
// Verificar si la actualización fue exitosa mediante el parámetro GET 'success'
if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
    <script>
        alert("Usuario actualizado exitosamente");
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
            <h1>Editar Proveedor</h1>
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

    <section class="update-ambiente" id="section-update-usuario">
        <form action="../updateUsuario/<?php echo $usuario['Id_usuario']; ?>" method="POST">
            <label for="nombre_proveedor">Nombres del proveedor:</label><br>
            <input type="text" id="nombre_proveedor" name="nombre_proveedor" value="<?php echo isset($usuario['nombre_proveedor']) ? $usuario['nombre_proveedor'] : ''; ?>" required><br><br>

            <label for="direccion">Direccion del proveedor:</label><br>
            <input type="text" id="direccion" name="direccion" value="<?php echo isset($usuario['direccion']) ? $usuario['direccion'] : ''; ?>" required><br><br>

            <label for="telefono">Telefono del proveedor:</label><br>
            <input type="number" id="telefono" name="telefono" value="<?php echo isset($usuario['telefono']) ? $usuario['telefono'] : ''; ?>" required><br><br>

            <label for="email">Correo del proveedor:</label><br>
            <input type="email" id="email" name="email" value="<?php echo isset($usuario['email']) ? $usuario['email'] : ''; ?>" required><br><br>

            <button type="submit">Guardar Cambios</button>
        </form>
    </section>
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>

    <div class="regresar">
        <?php
        $url_regresar = '../proveedores';
        ?>
        <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
    </div>

    <div class="salir">
        <button id="btn_salir">Salir</button>
    </div>
</body>
</html>
