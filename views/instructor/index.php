<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
<?php
require_once 'config/db.php';
$db = Database::connect();
session_start();

if (isset($_SESSION['clave'])) {
    $clave = $_SESSION['clave'];

    // Preparar la consulta SQL
    $query = "SELECT * FROM t_usuarios WHERE Clave = ?";
    $stmt = $db->prepare($query);

    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("s", $clave);
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    if($result->num_rows === 0) {
        // No se encontraron registros para la clave dada
        $nombre = "Nombre no encontrado";
        $cargo = "Cargo no encontrado";
    } else {
        // Obtener el nombre y el cargo del resultado de la consulta
        $row = $result->fetch_assoc();
        $nombre = $row['Nombres'] . ' ' . $row['Apellidos'];
        $cargo = $row['Rol'];
    }

    // Cerrar la declaración y la conexión a la base de datos
    $stmt->close();
    $db->close();
} else {
    $nombre = "Nombre no proporcionado";
    $cargo = "Cargo no proporcionado";
}
?>

<<<<<<< HEAD
=======
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector de Código QR</title>
    <link rel="stylesheet" href="../assets/qrcode.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Evita que la animación de fondo se desplace */
        }

        .cabeza {
            background-color: white;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }

        .cabeza img {
            height: 40px; /* Ajusta la altura del logo según sea necesario */
            margin-right: 10px;
        }

        .cabeza h1 {
            margin: 0;
            font-size: 1.2em;
        }

        #fecha-hora {
            text-align: center;
            margin-top: 10px;
        }

<<<<<<< HEAD
        .escan {
=======
<<<<<<< HEAD
        .escan {
=======
        .escan{
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
            background-color: #138d75;
            padding: 10px;
            color: white;
        }

        /* Animación de fondo */
        @keyframes scanAnimation {
            0% { background-position: -100% 50%; } /* Cambia la posición inicial */
            100% { background-position: 200% 50%; } /* Cambia la posición final */
        }

        .background-animation {
            position: fixed;
            top: 500px;
            left: 50px;
            width: 80%;
            height: 50%;
            background-image: url(https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExb3g0bDM0ZzZndnBsb2M5aGc5bnM5MDM2NnBkdGducno5c2x1Y3kyZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/taVCVuunNzQjBKTrYn/giphy.gif);
            animation: scanAnimation 4s linear infinite;
            background-size: cover; /* Ajusta el tamaño de la animación para cubrir todo el fondo */
            background-repeat: no-repeat; /* Evita la repetición del fondo */
            background-position: center; /* Centra la animación en el fondo */
        }

        #preview {
            display: none; /* Oculta la vista de la cámara por defecto */
        }
    </style>
</head>
<body>
    <div class="cabeza">
        <img src='../assets/Logo-Sena.jpg' alt='logo'>
        <h1>Gestión de Ambientes de Formación</h1>
    </div>
    <h1 class="escan">Escaneando</h1>

    <video id="preview" style="width:100%;"></video>

    <div class="background-animation"></div>
    
    <button onclick="scanQR()">Escanear con cámara</button>

    <form id="imageForm" action="" method="post" enctype="multipart/form-data" style="display:none;">
        <input type="file" accept="image/*" name="archivo" id="fileInput">
        <button type="submit" name="submit">Leer QR desde imagen</button>
    </form>

    <canvas id="canvas" style="display:none;"></canvas>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    <div class="contenedor" id="contenedor">
        <div id="fecha-hora"></div>
        <h1><?php echo $nombre; ?></h1>
        <h2><?php echo $cargo?></h2>
    </div>
<<<<<<< HEAD
=======
=======

    <div id="fecha-hora"></div>

>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let scanner;

        function scanQR() {
            document.getElementById('preview').style.display = 'block';
            document.getElementById('imageForm').style.display = 'none';

<<<<<<< HEAD
            // Ocultar el div con clase "contenedor"
            document.getElementById('contenedor').style.display = 'none';

=======
<<<<<<< HEAD
            // Ocultar el div con clase "contenedor"
            document.getElementById('contenedor').style.display = 'none';

=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
            scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                alert('Escaneado con éxito. Contenido del código QR: ' + content);

                window.location.href = '/dashboard/gestion%20de%20ambientes/instructor/readQR/' + encodeURIComponent(content);
            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                    let rearCamera = cameras.find(camera => camera.name.toLowerCase().includes('back'));
                    if (rearCamera) {
                        scanner.start(rearCamera);
                    } else {
                        scanner.start(cameras[0]);
                    }
<<<<<<< HEAD
=======
=======
                    scanner.start(cameras[0]);
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                } else {
                    console.error('No se encontraron cámaras disponibles.');
                    alert('No se encontraron cámaras disponibles.');
                }
            }).catch(function (e) {
                console.error('Error al acceder a las cámaras:', e);
                alert('Error al acceder a las cámaras. Asegúrate de que tienes permiso para acceder a la cámara y de que estás utilizando un dispositivo compatible.');
            });
        }

        function loadImage() {
            document.getElementById('preview').style.display = 'none';
            document.getElementById('imageForm').style.display = 'block';
        }

        // Obtener la fecha y hora actual del dispositivo
        function obtenerFechaHora() {
            let fechaHora = new Date();
            let fecha = fechaHora.toLocaleDateString();
            let hora = fechaHora.toLocaleTimeString();
            document.getElementById('fecha-hora').innerText = `Fecha: ${fecha}, Hora: ${hora}`;
        }

        // Llamar a la función obtenerFechaHora cada segundo para actualizar la fecha y hora
        obtenerFechaHora();
        setInterval(obtenerFechaHora, 1000);
    </script>
</body>
<<<<<<< HEAD
</html>
=======
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
