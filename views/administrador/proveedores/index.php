<?php require_once "views/administrador/Vista/parte_superior.php" ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-truck"></i> Gestion de Proveedor</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/dashboard/gestion%20de%20ambientes/proveedores/createProveedor/' id="btn-create">
                Nuevo Proveedor
                </a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Gestión de Proveedores</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabla-ambientes" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <!-- Botón para mostrar/ocultar el menú de filtros -->
                            <button class="filter-button" onclick="toggleFilterMenu()">Mostrar
                                Filtros</button>

                            <!-- Menú de filtros lateral -->
                            <div class="filter-menu" id="filterMenu" style="display:none;">
                                <h3>Filtrar Columnas</h3>
                                <button class="toggle-vis" data-column="0">ID</button>
                                <button class="toggle-vis" data-column="1">Nombre</button>
                                <button class="toggle-vis" data-column="2">Direccion</button>
                                <button class="toggle-vis" data-column="3">Teléfono</button>
                                <button class="toggle-vis" data-column="4">Email</button>
                                <button class="toggle-vis" data-column="5">Accion</button>
                            </div>

                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        <tbody>
                            <?php
                            // Consulta para obtener los datos de proveedores
                            $query = "SELECT id_proveedor, nombre_proveedor, direccion, telefono, email FROM proveedores";
                            $result = $db->query($query);

                            // Mostrar los datos en la tabla
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
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
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2019</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
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
        var table = $('#tabla-ambientes').DataTable({
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
</body>

</html>