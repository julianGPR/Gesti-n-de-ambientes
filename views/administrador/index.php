<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>

    <header>
        <div class="logo-container">
            <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
        </div>
        <div class="title">
            <h1>Gestion de Ambientes de formacion</h1>
        </div>
        <div class="datetime">
            <?php
                date_default_timezone_set('America/Bogota');
                $fechaActual = date("d/m/Y");
                $horaActual = date("h:i a");
            ?>
            <p>Fecha actual: <?php echo $fechaActual; ?></p>
            <p>Hora actual: <?php echo $horaActual; ?></p>
        </div>
    </header>
    <section class="admin">
    <div class="subtitulo-admin">
        <h2>Administrador</h2>
    </div>
    <div class="botones-admin">
        <?php
        // Construir la URL adecuada para el botón de "Gestión de Ambientes"
        $url_gestion_ambientes = '/dashboard/gestion%20de%20ambientes/admin/ambientes' ; // Corregir la construcción de la URL
        ?>
        <a href="<?php echo $url_gestion_ambientes; ?>" class="button-admin" id="btn-ambientes">Gestión de Ambientes</a>
        <a href="<?php echo $url_gestion_ambientes; ?>" class="button-admin" id="btn-ambientes">Gestión de Ambientes</a>
        <a href="<?php echo $url_gestion_ambientes; ?>" class="button-admin" id="btn-ambientes">Gestión de Ambientes</a>

    </div>
    </section>
    <div class="salir">
        <button id="btn_salir">Salir</button>
    </div>

    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
</body>
</html>
