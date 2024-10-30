<?php
// Asegúrate de que el archivo logout.php esté siendo llamado para cerrar sesión
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sesión</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
            background: #f0f2f5; /* Fondo gris claro */
            color: #333;
        }

        .logout-container {
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .logout-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #28a745; /* Verde */
        }

        .logout-container p {
            font-size: 16px;
            color: #666;
        }

        .logout-container a {
            color: #28a745; /* Verde */
            text-decoration: none;
            font-weight: bold;
        }

        .logout-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Sesión cerrada</h2>
        <p>Has cerrado sesión correctamente.</p>
<<<<<<< HEAD
        <p><a href="/dashboard/gestion%20de%20ambientes/login">Iniciar sesión nuevamente</a></p>
=======
        <p><a href="gestion%20de%20ambientes/">Iniciar sesión nuevamente</a></p>
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    </div>
</body>
</html>
