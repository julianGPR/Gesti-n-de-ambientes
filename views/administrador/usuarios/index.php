<?php require_once "views/administrador/Vista/parte_superior.php" ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-users"></i> Gestion de Usuarios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/dashboard/gestion%20de%20ambientes/usuarios/createUsuario/' id="btn-create">
                    Nuevo Usuario 
                </a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Gestión de Usuarios</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabla-reportes" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <!-- Botón para mostrar/ocultar el menú de filtros -->
                            <button class="filter-button" onclick="toggleFilterMenu()">Mostrar
                                Filtros</button>

                            <!-- Menú de filtros lateral -->
                            <div class="filter-menu" id="filterMenu" style="display:none;">
                                <h3>Filtrar Columnas</h3>
                                <button class="toggle-vis" data-column="0">ID</button>
                                <button class="toggle-vis" data-column="1">Nombres</button>
                                <button class="toggle-vis" data-column="2">Apellidos</button>
                                <button class="toggle-vis" data-column="3">Correo</button>
                                <button class="toggle-vis" data-column="4">Rol</button>
                                <button class="toggle-vis" data-column="5">Acciones</button>
                            </div>

                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        <tbody>
                            <?php
                            // Consulta para obtener los datos
                            $query = "SELECT id_usuario, Nombres, Apellidos, Correo, Rol, Estado FROM t_usuarios";
                            $result = $db->query($query);

                            // Mostrar los datos en la tabla
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
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
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="../assets/Js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/chart-area-demo.js"></script>
<script src="../assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/datatables-demo.js"></script>
<!-- CSS de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- CSS de los botones -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- JS de botones de DataTables -->
<script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>

<!-- Librería para exportar a Excel, PDF, etc. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        // Inicializar DataTable con opciones
        var table = $('#tabla-reportes').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            paging: true,
            pageLength: 5
        });

        // Configuración de los botones para mostrar/ocultar columnas
        $('.toggle-vis').on('click', function (e) {
            e.preventDefault();

            // Obtenemos el índice de la columna correspondiente al botón
            var columnIdx = parseInt($(this).attr('data-column'));

            // Obtenemos el estado de visibilidad de la columna y lo invertimos
            var column = table.column(columnIdx);
            column.visible(!column.visible());
        });
    });

    // Función para mostrar/ocultar el menú de filtros
    function toggleFilterMenu() {
        var menu = document.getElementById("filterMenu");
        menu.style.display = menu.style.display === "none" || menu.style.display === "" ? "block" : "none";
    }
</script>
<?php require_once "views/administrador/Vista/parte_inferior.php" ?>
</body>

</html>