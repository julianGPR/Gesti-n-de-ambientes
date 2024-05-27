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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<style>
.button-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 10px;
}
.button-admin {
    flex: 1;
    margin: 5px;
    text-align: center;
}

.notification-bell {
            position: relative;
            margin-left: 700px;
            margin-top: 10px;
        }

        .notification-bell button{
            background-color: white;
            border: none;
        }

        .notification-bell img {
            transition: transform 0.8s ease-in-out;
            width: 50px;
        }

        .flying {
            animation: fly 1s ease-in-out forwards;
        }

        @keyframes fly {
            0% {
                transform: translate(0);
            }
            50% {
                transform: translate(20px, -20px) rotate(-45deg);
            }
            100% {
                transform: translate(0);
            }
        }
        /* Estilos para la ventana emergente */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            text-align: center;
        }

        .popup-close {
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }
        .notification-counter {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 8px;
            font-size: 12px;
        }

</style>
<script>

        function flyBell() {
            var bellImage = document.getElementById("bellImage");
            bellImage.classList.add("flying");
        }
        function flyBellAndShowPopup() {
            var bellImage = document.getElementById("bellImage");
            bellImage.classList.add("flying");
            document.getElementById("popup").style.display = "block"; // Muestra la ventana emergente
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none"; // Oculta la ventana emergente
            location.reload();
        }

</script>
<div class="notification-bell">
            <button id="bellButton" onclick="flyBellAndShowPopup()">
            <img id="bellImage" src="../assets/campana.png" alt="Icono de la campana">
            <span class="notification-counter">
                <?php
                $conn = Database::connect();
                $sql = "SELECT COUNT(*) AS total FROM t_reportes WHERE Estado = '1'";
                $result = $conn->query($sql);

                // Verifica si la consulta fue exitosa
                if ($result) {
                    // Obtiene el número de reportes pendientes
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                } else {
                    // Si la consulta falla, muestra un mensaje de error o un valor predeterminado
                    echo "Error al obtener el número de reportes pendientes";
                }
                ?> 
            </span>
        </div>
    </button>
            </select>
        </div>
    <!-- Elemento para la ventana emergente -->
    <div id="popup" class="popup">
    <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
        <div class="notificaciones">
        <?php
            // Consulta SQL para seleccionar todos los registros de la tabla t_reportes que no han sido vistos
            $query = "SELECT r.*, u.Nombres AS nombre_usuario, u.Apellidos AS apellido_usuario, a.Nombre AS nombre_ambiente 
                    FROM t_reportes r 
                    INNER JOIN t_usuarios u ON r.Id_usuario = u.Id_usuario 
                    INNER JOIN t_ambientes a ON r.Id_ambiente = a.Id_ambiente 
                    WHERE r.estado = 1"; // Notificaciones no vistas
            $result = $db->query($query);

            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y mostrar cada notificación en formato de texto
                while ($row = $result->fetch_assoc()) {

                    echo "<div class='notificacion'>";
                    echo "El instructor " . $row['nombre_usuario'] . " " . $row['apellido_usuario'] . " envió un nuevo reporte del ambiente " . $row['nombre_ambiente'];
                    echo "<br>";
                    echo "<br>";
                    echo "</div>";

                    // Marcar la notificación como vista
                    $reporte_id = $row['Id_reporte'];
                    $query_update = "UPDATE t_reportes SET Estado = 2 WHERE Id_reporte = $reporte_id";
                    $db->query($query_update);

                }

            } else {
                // Si no hay filas en el resultado, mostrar un mensaje de que no hay notificaciones nuevas
                echo "<div class='notificacion'>No hay notificaciones nuevas</div>";
            }

            // Cerrar la conexión a la base de datos
            $db->close();
        ?>
        </div>
    </div>
</div>


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
    // Construir la URL adecuada para los botones
    $urls = [
        '/dashboard/gestion%20de%20ambientes/admin/ambientes' => 'Gestión de Ambientes',
        '/dashboard/gestion%20de%20ambientes/admin/usuarios' => 'Gestión de Usuarios',
        '/dashboard/gestion%20de%20ambientes/admin/reportes' => 'Gestión de Reportes',
        '/dashboard/gestion%20de%20ambientes/admin/computadores' => 'Computadores',
        '/dashboard/gestion%20de%20ambientes/admin/tvs' => 'Televisores(tvs)',
        '/dashboard/gestion%20de%20ambientes/admin/sillas' => 'Sillas',
        '/dashboard/gestion%20de%20ambientes/admin/mesas' => 'Mesas',
        '/dashboard/gestion%20de%20ambientes/admin/tableros' => 'Tableros',
        '/dashboard/gestion%20de%20ambientes/admin/nineras' => 'Niñeras',
    ];

    $i = 0;
    foreach ($urls as $url => $label) {
        if ($i % 3 == 0) {
            if ($i > 0) echo '</div>';
            echo '<div class="button-row">';
        }
        echo '<a href="' . $url . '" class="button-admin">' . $label . '</a>';
        $i++;
    }
    if ($i % 3 != 0) {
        echo '</div>';
    }
    ?>
</div>
    </section>
    <div class="salir">
        <button id="btn_salir">Salir</button>
    </div>

    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
    <script src="../assets/menu.js"></script>
</body>
</html>
