<?php
<<<<<<< HEAD
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
=======
<<<<<<< HEAD
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
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
        <div class="datetime">
            <div class="fecha">
                <p>Fecha actual: <?php echo $fechaActual; ?></p>
            </div>
            <div class="hora">
                <p>Hora actual: <?php echo $horaActual; ?></p>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="column-toggle-buttons">
        <button class="toggle-vis" data-column="0">ID</button>
        <button class="toggle-vis" data-column="1">Nombres</button>
        <button class="toggle-vis" data-column="2">Apellidos</button>
        <button class="toggle-vis" data-column="3">Correo</button>
        <button class="toggle-vis" data-column="4">Rol</button>
        <button class="toggle-vis" data-column="5">Acciones</button>
    </div>
</nav>  
<section class="ambiente" id="section-ambiente">
    <div class="subtitulo-ambiente">
        <h2>Usuarios</h2>
    </div>
    <div class="descripcion-ambiente">
        <p>Gestión de Usuarios</p>
    </div>
    <div class="tabla-ambientes tabla-scroll">
        <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los datos
                $query = "SELECT id_usuario, Nombres, Apellidos, Correo, Rol, Estado FROM t_usuarios";
                $result = $db->query($query);

                // Mostrar los datos en la tabla
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_usuario"] . "</td>";
                        echo "<td>" . $row["Nombres"] . "</td>";
                        echo "<td>" . $row["Apellidos"] . "</td>";
                        echo "<td>" . $row["Correo"] . "</td>";
                        echo "<td>" . $row["Rol"] . "</td>";
                        echo "<td>";
                        
                            $url_update = '/dashboard/gestion%20de%20ambientes/usuarios/updateUsuario/' . $row['id_usuario'];
                            echo "<a href='" . $url_update . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>0 resultados</td></tr>"; // Actualizar el colspan
                }
                $db->close();
                ?>
            </tbody>
        </table>
        <div class="filtro-y-crear">
            <div class="crear-ambiente">
                <ul>
                    <?php
                    $url_create = '/dashboard/gestion%20de%20ambientes/usuarios/createUsuario/';
=======
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
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
        <div class="datetime">
            <div class="fecha">
                <p>Fecha actual: <?php echo $fechaActual; ?></p>
            </div>
            <div class="hora">
                <p>Hora actual: <?php echo $horaActual; ?></p>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="column-toggle-buttons">
        <button class="toggle-vis" data-column="0">ID</button>
        <button class="toggle-vis" data-column="1">Nombres</button>
        <button class="toggle-vis" data-column="2">Apellidos</button>
        <button class="toggle-vis" data-column="3">Correo</button>
        <button class="toggle-vis" data-column="4">Rol</button>
        <button class="toggle-vis" data-column="5">Acciones</button>
    </div>
</nav>  
<section class="ambiente" id="section-ambiente">
    <div class="subtitulo-ambiente">
        <h2>Usuarios</h2>
    </div>
    <div class="descripcion-ambiente">
        <p>Gestión de Usuarios</p>
    </div>
    <div class="tabla-ambientes tabla-scroll">
        <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los datos
                $query = "SELECT id_usuario, Nombres, Apellidos, Correo, Rol, Estado FROM t_usuarios";
                $result = $db->query($query);

                // Mostrar los datos en la tabla
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_usuario"] . "</td>";
                        echo "<td>" . $row["Nombres"] . "</td>";
                        echo "<td>" . $row["Apellidos"] . "</td>";
                        echo "<td>" . $row["Correo"] . "</td>";
                        echo "<td>" . $row["Rol"] . "</td>";
                        echo "<td>";
                        
                            $url_update = '/dashboard/gestion%20de%20ambientes/usuarios/updateUsuario/' . $row['id_usuario'];
                            echo "<a href='" . $url_update . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>0 resultados</td></tr>"; // Actualizar el colspan
                }
                $db->close();
                ?>
            </tbody>
        </table>
        <div class="filtro-y-crear">
            <div class="crear-ambiente">
                <ul>
                    <?php
<<<<<<< HEAD
                    $url_create = '/dashboard/gestion%20de%20ambientes/usuarios/createUsuario/';
=======
                    // Construir la URL adecuada para el botón de "Gestión de Ambientes"
                    $url_create = '/dashboard/gestion%20de%20ambientes/admin/createUsuario/' ; // Corregir la construcción de la URL
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                    ?>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Usuario</a></li>
                </ul>
            </div>
        </div>
<<<<<<< HEAD
        <div class="regresar">
            <?php
            $url_regresar = '../admin/home';
=======
<<<<<<< HEAD
        <div class="regresar">
            <?php
            $url_regresar = '../admin/home';
=======
    </nav>  
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Usuarios</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de Usuarios</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table border="1" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Clave</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
    
    <?php

    // Consulta para obtener los datos
    $query = "SELECT id_usuario, Clave, Nombres, Apellidos, Correo FROM t_usuarios";
    $result = $db->query($query);

    // Mostrar los datos en la tabla
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_usuario"] . "</td>";
            echo "<td>" . $row["Nombres"] . "</td>";
            echo "<td>" . $row["Apellidos"] . "</td>";
            echo "<td>" . $row["Clave"] . "</td>";
            echo "<td>" . $row["Correo"] . "</td>";
            echo "<td>";
            $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateUsuario/';
            echo "<a href='" . $url_update . $row['id_usuario'] . "' class=''><img src='../assets/editar.svg'></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>0 resultados</td></tr>";
    }
    $db->close();
    ?>
                </tbody>
            </table>
        <div class="regresar">
            <?php
                $url_regresar = 'usuarios';
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
            ?>
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
    </div>
</section>
<script>
    $(document).ready(function() {
        var table = $('#tabla-ambientes').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            paging: true,
            pageLength: 10 // Mostrar 10 registros por página
        });

        // Configuración de los botones para mostrar/ocultar columnas
        $('.toggle-vis').on('click', function(e) {  
            e.preventDefault();

            // Obtenemos el índice de la columna correspondiente al botón
            var columnIdx = parseInt($(this).attr('data-column'));

            // Obtenemos el estado de visibilidad de la columna y lo invertimos
            var column = table.column(columnIdx);
            column.visible(!column.visible());
        });
    });
    
    function confirmarHabilitar(id) {
        if (confirm('¿Está seguro de que desea habilitar este usuario?')) {
            window.location.href = "inhabilitarUsuario/" + id;}
    }

    function confirmarInhabilitar(id) {
        if (confirm('¿Está seguro de que desea inhabilitar este usuario?')) {
            window.location.href = "habilitarUsuario/" + id;}
    }
</script>

<footer>
    <p>Sena todos los derechos reservados</p>
</footer>
</body>
</html>
=======
    </section>
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    </div>
</section>
<script>
    $(document).ready(function() {
        var table = $('#tabla-ambientes').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            paging: true,
            pageLength: 10 // Mostrar 10 registros por página
        });

        // Configuración de los botones para mostrar/ocultar columnas
        $('.toggle-vis').on('click', function(e) {  
            e.preventDefault();

            // Obtenemos el índice de la columna correspondiente al botón
            var columnIdx = parseInt($(this).attr('data-column'));

            // Obtenemos el estado de visibilidad de la columna y lo invertimos
            var column = table.column(columnIdx);
            column.visible(!column.visible());
        });
    });
    
    function confirmarHabilitar(id) {
        if (confirm('¿Está seguro de que desea habilitar este usuario?')) {
            window.location.href = "inhabilitarUsuario/" + id;}
    }

    function confirmarInhabilitar(id) {
        if (confirm('¿Está seguro de que desea inhabilitar este usuario?')) {
            window.location.href = "habilitarUsuario/" + id;}
    }
</script>

<footer>
    <p>Sena todos los derechos reservados</p>
</footer>
</body>
</html>
<<<<<<< HEAD
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
