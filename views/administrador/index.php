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
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <script src="https://kit.fontawesome.com/35796e2324.js" crossorigin="anonymous"></script>
</head>
<body>
    <style>

        bellButton{
            background-color: white;
        }
        .notification-bell {
            position: relative;
        }

        .notification-bell img {
            transition: transform 0.8s ease-in-out;
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

    <!-- Elemento para la ventana emergente -->
    <div id="popup" class="popup">
        <div class="popup-content">
        <span class="popup-close" onclick="closePopup()">&times;</span>
            <div class="tabla-ambientes tabla-scroll">
                    <table border="1" >
                        <thead>
                            <tr>
                                <th>Fecha y Hora</th>
                                <th>Id usuario</th>
                                <th>Id ambiente</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
        // Consulta SQL para seleccionar todos los registros de la tabla t_ambientes
        $query = "SELECT r.*, u.Nombres AS nombre_usuario, u.Apellidos AS apellido_usuario, a.Nombre AS nombre_ambiente 
                FROM t_reportes r 
                INNER JOIN t_usuarios u ON r.Id_usuario = u.Id_usuario 
                INNER JOIN t_ambientes a ON r.Id_ambiente = a.Id_ambiente";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['FechaHora'] . "</td>";
                echo "<td>" . $row['nombre_usuario'] . " " . $row['apellido_usuario'] . "</td>";
                echo "<td>" . $row['nombre_ambiente'] . "</td>";
            }
        } else {
            // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
            echo "<tr><td colspan='10'>No hay registros</td></tr>";
        }

        // Cerrar la conexión a la base de datos
        $db->close();
        ?>

                        </tbody>
                    </table>
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
        // Construir la URL adecuada para el botón de "Gestión de Ambientes"
        $url_gestion_ambientes = '/dashboard/gestion%20de%20ambientes/admin/ambientes' ; // Corregir la construcción de la URL
        $url_gestion_usuarios = '/dashboard/gestion%20de%20ambientes/admin/usuarios';
        $url_gestion_reportes = '/dashboard/gestion%20de%20ambientes/admin/reportes';
        ?>
        <a href="<?php echo $url_gestion_ambientes; ?>" class="button-admin" id="btn-ambientes">Gestión de Ambientes</a>
        <a href="<?php echo $url_gestion_usuarios; ?>" class="button-admin" id="btn-ambientes">Gestión de Usuarios</a>
        <a href="<?php echo $url_gestion_reportes; ?>" class="button-admin" id="btn-ambientes">Gestión de Reportes</a>

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
