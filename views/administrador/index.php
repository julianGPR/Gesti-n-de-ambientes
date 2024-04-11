<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <!-- Agrega enlaces a tus archivos CSS y scripts JS aquí -->
    <link rel="stylesheet" href="path/to/your/style.css">
    <script src="path/to/your/script.js" defer></script>
</head>
<body>
    <div class="header">
        <h1>Gestión de Ambientes</h1>
        <img src="path/to/your/logo.png" alt="Logo de la empresa">
    </div>
    <div class="datetime">
        <p id="fecha"><?php echo date('d/m/Y'); ?></p>
        <p id="hora"><?php echo date('H:i'); ?></p>
    </div>
    <div class="subtitulo">
        <h2>Administrador</h2>
    </div>
    <div class="botones">
        <?php
        // Construir la URL adecuada para el botón de "Gestión de Ambientes"
        $url_gestion_ambientes = '/dashboard/gestion%20de%20ambientes/admin/ambientes' ; // Corregir la construcción de la URL
        ?>
        <a href="<?php echo $url_gestion_ambientes; ?>" class="button" id="btn-ambientes">Gestión de Ambientes</a>
        <button id="btn_usuarios">Usuarios</button>
        <button id="btn_reportes">Reportes</button>
    </div>
    <div class="salir">
        <button id="btn_salir">Salir</button>
    </div>
</body>
</html>
