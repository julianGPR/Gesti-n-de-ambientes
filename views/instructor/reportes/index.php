<?php

require_once 'config/db.php';
$db = Database::connect();
session_start();

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

    $cargo = "Cargo no encontrado";
} else {
    // Obtener el nombre y el cargo del resultado de la consulta
    $row = $result->fetch_assoc();
    $id_usuario = $row['Id_usuario'];
    $usuario = $row['Nombres'] . ' ' . $row['Apellidos'];
    $cargo = $row['Rol'];
}

$query = "SELECT Id_ambiente FROM t_ambientes WHERE Nombre = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $nombre);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id_ambiente = $row["Id_ambiente"];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    header('Content-Type: application/json');

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'reportesambientes');

    if ($conn->connect_error) {
        echo json_encode(["success" => false, "message" => "Conexión fallida: " . $conn->connect_error]);
        exit();
    }

    // Verificar que las observaciones estén definidas y no estén vacías
    if (isset($_POST['observaciones'])) {
        $observaciones = $_POST['observaciones'];

        // Datos adicionales
        $fechaHora = date('Y-m-d H:i:s');
        $estado = 1; // Estado inicial del reporte

        // Insertar el reporte en la base de datos
        $stmt = $conn->prepare("INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Estado, Observaciones) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('siiss', $fechaHora, $id_usuario, $id_ambiente, $estado, $observaciones);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Reporte insertado correctamente"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al insertar el reporte"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "No se recibieron observaciones"]);
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Relacionada</title>
    <link rel="stylesheet" href="../../styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
<<<<<<< HEAD
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .sublist {
            display: none;
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
        .titulo {
            text-align: center;
            padding: 10px;
        }
        .instrucciones {
            padding: 15px;
            font-size: 0.9em;
        }
        .submit-btn {
            text-align: center;
            margin-top: 20px;
        }
        .submit-btn input[type='submit'] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
<<<<<<< HEAD
        
        .submit-btn input[type='submit']:hover {
            background-color: #45a049; /* Verde más oscuro al pasar el ratón */
=======
        .submit-btn input[type='submit']:hover {
            background-color: #45a049;
>>>>>>> devJuan
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
        .expand {
            display: inline-block;
            width: 20px;
            height: 20px;
            text-align: center;
            border: 1px solid #000;
            margin-right: 5px;
        }
=======
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.header {
    background-color: white;
    color: #333; /* Cambiado el color del texto para mayor contraste */
    padding: 10px 20px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Agregado un sombreado sutíl */
}

.header img {
    height: 40px; /* Ajusta la altura del logo según sea necesario */
    margin-right: 10px;
}

.header h1 {
    margin: 0;
    font-size: 1.2em;
}

.container {
    max-width: 100%;
    margin: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.sublist {
    display: none;
}

h1 {
    color: #333; /* Cambiado el color del texto para mayor contraste */
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

.titulo {
    text-align: center;
    padding: 10px;
}

.instrucciones {
    padding: 15px;
    font-size: 0.9em;
}

.submit-btn {
    text-align: center;
    margin-top: 20px;
}

.submit-btn input[type='submit'] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.submit-btn input[type='submit']:hover {
    background-color: #45a049;
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

.expand {
    display: inline-block;
    width: 20px;
    height: 20px;
    text-align: center;
    border: 1px solid #000;
    margin-right: 5px;
}

>>>>>>> devJuan
    </style>
</head>
<body>
    <form id="observacionForm" action="" method="POST">
        <div class="header">
            <img src="../../assets/Logo-Sena.jpg" alt="logo">
            <h1>Gestión de Ambiente</h1>
        </div>
        <div class="container">
            <p class="date-time">Fecha: <?php echo $fecha_actual; ?> Hora: <?php echo $hora_actual; ?></p>
            <h1 class="titulo"> <?php echo $nombre; ?></h1>
            <ul>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Infraestructura:</span>
                    <ul class="sublist"></ul>
                </li>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Mobiliario:</span>
                    <ul class="sublist">
                        <span class="label">Sillas:</span>
                        <span class="value"><?php echo $sillas; ?></span><br>
                        <span class="label">Mesas:</span>
                        <span class="value"><?php echo $mesas; ?></span><br>
                        <span class="label">Tableros:</span>
                        <span class="value"><?php echo $tablero; ?></span>
                    </ul>
                </li>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Software:</span>
                    <ul class="sublist"></ul>
                </li>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Hardware:</span>
                    <ul class="sublist">
                        <?php foreach($computadores as $computador): ?>
                            <li class="hardware-item">
                                <input type="checkbox" name="checkpc[]" id="checkpc<?php echo $computador['Serial']; ?>" value="<?php echo $computador['Serial']; ?>" <?php echo ($computador['CheckPc'] == 1) ? 'checked' : ''; ?> onclick="toggleObservationField('checkpc<?php echo $computador['Serial']; ?>', 'observacion<?php echo $computador['Serial']; ?>')">
                                <span><?php echo htmlspecialchars($computador['Marca']); ?></span>
                                <span><?php echo htmlspecialchars($computador['Modelo']); ?></span>
                                <span><?php echo $computador['Serial']; ?></span>
                                <input type="text" name="observacion[<?php echo $computador['Serial']; ?>]" id="observacion<?php echo $computador['Serial']; ?>" placeholder="Novedad encontrada" style="display:<?php echo ($computador['CheckPc'] == 1) ? 'none' : 'block'; ?>">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
            <div class="submit-btn">
                <input type="submit" value="Enviar">
            </div>
    </form>
        <p class="instrucciones">Sr(a) Instructor(a), en caso de evidenciar novedades al interior del ambiente de formación, seleccione el item adecuado y de forma muy concisa detalle la novedad encontrada y presiona ENVIAR</p>
        <p class="instrucciones">En caso contrario solo presione ENVIAR</p>
    </div>
    <script>
        function toggleList(element) {
            var sublist = element.parentElement.querySelector(".sublist");
            sublist.style.display = sublist.style.display === "none" ? "block" : "none";
            element.innerText = sublist.style.display === "none" ? "+" : "-";
        }

        function toggleObservationField(checkboxId, observationId) {
            var checkbox = document.getElementById(checkboxId);
            var observationField = document.getElementById(observationId);
            observationField.style.display = checkbox.checked ? "none" : "block";
        }

        // Llamar a toggleObservationField para cada checkbox al cargar la página
        window.addEventListener('load', function() {
            <?php foreach($computadores as $computador): ?>
                toggleObservationField('checkpc<?php echo $computador['Serial']; ?>', 'observacion<?php echo $computador['Serial']; ?>');
            <?php endforeach; ?>
        });

        document.getElementById('observacionForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var observaciones = [];

            <?php foreach($computadores as $computador): ?>
                var checkbox = document.getElementById('checkpc<?php echo $computador['Serial']; ?>');
                var observationField = document.getElementById('observacion<?php echo $computador['Serial']; ?>');
                if (!checkbox.checked && observationField.value) {
                    observaciones.push('<?php echo $computador['Serial']; ?>: ' + observationField.value);
                }
            <?php endforeach; ?>

            formData.append('observaciones', observaciones.join('; '));

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                        confirmButtonText: 'OK',
                        confirmButtonClass: 'custom-btn-class'
                    }).then(() => {
                        window.location.reload(); // Recargar la página
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se guardo el reporte',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            });

        });
    </script>
</body>
</html>