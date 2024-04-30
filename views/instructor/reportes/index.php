<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Relacionada</title>
    <link rel="stylesheet" href="../../styles.css"> <!-- Ajusta la ruta según la ubicación de tu archivo CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .header {
            background-color: white;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        
        .header img {
            height: 50px;
            margin-right: 10px;
        }
        
        .header h1 {
            margin: 0;
            font-size: 1em;
        }
        
        .container {
            max-width: 100%;
            margin: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: black;
            margin-top: 0;
            font-size: 1.5em;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
        }
        
        li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        
        li:last-child {
            border-bottom: none;
        }
        
        .label {
            font-weight: bold;
        }
        
        .value {
            margin-left: 10px;
        }
        
        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
                padding: 10px;
            }
        
            h1 {
                font-size: 1.2em;
            }
        }

        .date-time {
            margin: 20px 20; 
            text-align: center;
        }

        .titulo{
            text-align: center;
            padding: 10px;
        }

        .instrucciones{
            padding: 15px;
            font-size: 0.9em;
        }

        .submit-btn {
            text-align: center; /* Centra horizontalmente */
            margin-top: 20px; /* Espacio entre el formulario y el botón */
        }
        
        .submit-btn input[type='submit'] {
            background-color: #4CAF50; /* Verde */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        
        .submit-btn input[type='submit']:hover {
            background-color: #45a049; /* Verde más oscuro al pasar el ratón */
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="../../assets/Logo-Sena.jpg" alt="logo">
        <h1>Gestión de Ambientes de Formación</h1>
    </div>
    <div class="container">
        <p class="date-time">Fecha: <?php echo $fecha_actual; ?> Hora: <?php echo $hora_actual; ?></p>
        <h1 class="titulo">Ambiente <?php echo $nombre; ?></h1>
        <ul>
            <li>
                <span class="label">Computadores:</span>
                <span class="value"><?php echo $computadoras; ?></span>
            </li>
            <li>
                <span class="label">Televisores:</span>
                <span class="value"><?php echo $tv; ?></span>
            </li>
            <li>
                <span class="label">Sillas:</span>
                <span class="value"><?php echo $sillas; ?></span>
            </li>
            <li>
                <span class="label">Mesas:</span>
                <span class="value"><?php echo $mesas; ?></span>
            </li>
            <li>
                <span class="label">Tablero:</span>
                <span class="value"><?php echo $tablero; ?></span>
            </li>
            <li>
                <span class="label">Archivador:</span>
                <span class="value"><?php echo $archivador; ?></span>
            </li>
            <li>
                <span class="label">Infraestructura:</span>
                <span class="value"><?php echo $infraestructura; ?></span>
            </li>
            <li>
                <span class="label">Observación:</span>
                <span class="value"><?php echo $observacion; ?></span>
            </li>
            <li>
                <span class="label">Estado:</span>
                <span class="value"><?php echo $estado; ?></span>
            </li>
        </ul>

        <form id="informeForm" action="AdminController.php" method="post">
    <input type="hidden" name="id_reporte" value="<?php echo $id_reporte; ?>">
    <input type="text" name="observacion" placeholder="Observación">
    <input type="submit" value="Enviar">
</form>

        <p class="instrucciones">Sr(a) Instructor(a), en caso de evidenciar novedades al interior del ambiente de formación, seleccione el item adecuado y de forma muy concisa detalle la novedad encontrada y presiona ENVIAR</p>
        <p class="instrucciones">En caso contrario solo presione ENVIAR</p>
    </div>
    <div class="popup" id="mensajePopup">
        <p>¡Informe enviado correctamente!</p>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("informeForm");

        form.addEventListener("submit", function(event) {
            event.preventDefault();

            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(function(response) {
                if (response.ok) {
                    document.getElementById("mensajePopup").style.display = "block";
                    setTimeout(function() {
                        window.location.href = "../home"; // Redirigir al instructor
                    }, 3000);
                } else {
                    console.error("Error al enviar el formulario");
                }
            })
            .catch(function(error) {
                console.error("Error al enviar el formulario:", error);
            });
        });
    });
</script>

    
</body>
</html>
