<?php
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
        <h1>Gestion de inventarios Gafra</h1>
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
        <button class="toggle-vis" data-column="1">Nombre</button>
        <button class="toggle-vis" data-column="2">Direccion</button>
        <button class="toggle-vis" data-column="3">Teléfono</button>
        <button class="toggle-vis" data-column="4">Email</button>
        <button class="toggle-vis" data-column="5">Accion</button>


    </div>
</nav>  
<section class="ambiente" id="section-ambiente">
    <div class="subtitulo-ambiente">
        <h2>Proveedores</h2>
    </div>
    <div class="descripcion-ambiente">
        <p>Gestión de Proveedores</p>
    </div>
    <div class="tabla-ambientes tabla-scroll">
        <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los datos de proveedores
                $query = "SELECT id_proveedor, nombre_proveedor, direccion, telefono, email FROM proveedores";
                $result = $db->query($query);

                // Mostrar los datos en la tabla
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_proveedor"] . "</td>";
                        echo "<td>" . $row["nombre_proveedor"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>";
                        
                            $url_update = '/dashboard/gestion%20de%20ambientes/proveedores/updateProveedor/' . $row['id_proveedor'];
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
                    $url_create = '/dashboard/gestion%20de%20ambientes/proveedores/createProveedor/';
                    ?>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Nuevo</a></li>
                </ul>
            </div>
        </div>
        <div class="regresar">
            <?php
            $url_regresar = '../admin/home';
            ?>
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

</body>
</html>
