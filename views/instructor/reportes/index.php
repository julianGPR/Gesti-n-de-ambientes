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

if ($result->num_rows === 0) {
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

    // Verificar que las observaciones estén definidas y no estén vacías
    if (isset($_POST['observaciones'])) {
        $observaciones = $_POST['observaciones'];

        // Datos adicionales
        $fechaHora = date('Y-m-d H:i:s');
        $estado = 1; // Estado inicial del reporte

        // Insertar el reporte en la base de datos
        $stmt = $db->prepare("INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Estado, Observaciones) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('siiss', $fechaHora, $id_usuario, $id_ambiente, $estado, $observaciones);

        if ($stmt->execute()) {
            // Aquí se asume que $observaciones es un array con las observaciones y sus respectivos seriales
            foreach ($_POST['observacion'] as $serial => $observacion) {
                if (!empty($observacion)) {
                    // Actualizar la observación en la tabla t_computadores
                    $updateStmt = $db->prepare("UPDATE t_computadores SET Observaciones = ? WHERE Serial = ?");
                    $updateStmt->bind_param('ss', $observacion, $serial);
                    $updateStmt->execute();
                    $updateStmt->close();
                }
            }

            echo json_encode(["success" => true, "message" => "Reporte insertado correctamente y observaciones actualizadas"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al insertar el reporte"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "No se recibieron observaciones"]);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['historial'])) {

    header('Content-Type: application/json');

    // Obtener el historial de observaciones
    $query = "SELECT Serial, Observaciones FROM t_computadores WHERE id_ambiente = ? AND Observaciones IS NOT NULL";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $id_ambiente);
    $stmt->execute();
    $result = $stmt->get_result();

    $observaciones = [];
    while ($row = $result->fetch_assoc()) {
        $observaciones[] = $row['Serial'] . ': ' . $row['Observaciones'];
    }

    echo json_encode(["success" => true, "observaciones" => $observaciones]);
    exit();
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

.submit-btn button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.submit-btn button:hover {
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

.close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

.close-btn:before {
    content: '✖';
}

.expand {
    display: inline-block;
    width: 20px;
    height: 20px;
    text-align: center;
    border: 1px solid #000;
    margin-right: 5px;
}

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
                    <input type="text" onkeyup="filterList(this, 'hardware-list')" placeholder="Filtrar por placa...">
                    <ul class="sublist hardware-list">
                        <?php foreach($computadores as $computador): ?>
                            <li class="hardware-item">
                                <input type="checkbox" name="checkpc[]" id="checkpc<?php echo $computador['Serial']; ?>" value="<?php echo $computador['Serial']; ?>" <?php echo ($computador['CheckPc'] == 1) ? 'checked' : ''; ?> onclick="toggleObservationField('checkpc<?php echo $computador['Serial']; ?>', 'observacion<?php echo $computador['Serial']; ?>')">
                                <span><?php echo htmlspecialchars($computador['Marca']); ?></span>
                                <span><?php echo htmlspecialchars($computador['Modelo']); ?></span>
                                <span><?php echo $computador['Serial']; ?></span>
                                <textarea name="observacion[<?php echo $computador['Serial']; ?>]" id="observacion<?php echo $computador['Serial']; ?>" placeholder="Novedad encontrada" style="display:<?php echo ($computador['CheckPc'] == 1) ? 'none' : 'block'; ?>"></textarea>
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

    <div class="submit-btn">
            <button onclick="mostrarHistorial()">Historial de Observaciones</button>
        </div>

    <!-- Popup para mostrar el historial -->
    <div class="popup" id="historialPopup">
        <div class="popup-content">
            <button class="close-btn" onclick="cerrarPopup()"></button>
            <h2>Historial de Observaciones</h2>
            <ul id="historialList">
                <!-- Aquí se mostrará el historial de observaciones -->
            </ul>
        </div>
    </div>
    <script>

    function mostrarHistorial() {
            // Hacer una solicitud AJAX para obtener el historial de observaciones
            fetch('?historial=1')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Construir la lista de observaciones
                        const historialList = document.getElementById('historialList');
                        historialList.innerHTML = ''; // Limpiar la lista antes de agregar nuevas observaciones
                        data.observaciones.forEach(observation => {
                            const listItem = document.createElement('li');
                            listItem.textContent = observation;
                            historialList.appendChild(listItem);
                        });
                        // Mostrar el popup
                        const historialPopup = document.getElementById('historialPopup');
                        historialPopup.style.display = 'block';
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
                    console.error('Error al obtener el historial:', error);
                });
        }

        // Función para cerrar el popup
        function cerrarPopup() {
            const historialPopup = document.getElementById('historialPopup');
            historialPopup.style.display = 'none';
        }
                
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

        function filterList(input, listClassName) {
            var filter = input.value.toUpperCase();
            var ul = document.getElementsByClassName(listClassName)[0];
            var li = ul.getElementsByTagName('li');
            for (var i = 0; i < li.length; i++) {
                var span = li[i].getElementsByTagName("span")[2];
                var txtValue = span.textContent || span.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
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


