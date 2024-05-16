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

<div class="notification-bell">
            <button id="bellButton" onclick="flyBellAndShowPopup()">
            <img id="bellImage" src="../assets/alerta.svg" alt="Icono de la campana">
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
    <div class="menu-container">
        <img class="menu-toggle" src="../assets/menu.svg" alt="Icono del menú">
            <ul class="menu-options" id="menuOptions">
                <?php
                    $url_computadores = '/dashboard/gestion%20de%20ambientes/admin/computadores' ; //construcción de la URL
                    $url_tvs = '/dashboard/gestion%20de%20ambientes/admin/tvs' ; //construcción de la URL
                    $url_sillas = '/dashboard/gestion%20de%20ambientes/admin/sillas' ; //construcción de la URL
                    $url_mesas = '/dashboard/gestion%20de%20ambientes/admin/mesas' ; //construcción de la URL
                    $url_tableros = '/dashboard/gestion%20de%20ambientes/admin/tableros' ; //construcción de la URL
                    $url_nineras = '/dashboard/gestion%20de%20ambientes/admin/nineras' ; //construcción de la URL
                ?>
                    <li><a href="<?php echo $url_computadores; ?>" class="button-admin" id="btn-computadores">Computadores</a></li>
                    <li><a href="<?php echo $url_tvs; ?>" class="button-admin" id="btn-tvs">Televisores(tvs)</a></li>
                    <li><a href="<?php echo $url_sillas; ?>" class="button-admin" id="btn-sillas">sillas</a></li>
                    <li><a href="<?php echo $url_mesas; ?>" class="button-admin" id="btn-mesas">mesas</a></li>
                    <li><a href="<?php echo $url_tableros; ?>" class="button-admin" id="btn-tableros">tableros</a></li>
                    <li><a href="<?php echo $url_nineras; ?>" class="button-admin" id="btn-nineras">nineras</a></li>
            </ul>
    </div>
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
    <script src="../assets/menu.js"></script>
</body>
</html>
