<?php require_once "views/administrador/Vista/parte_superior.php" ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1> <i class="fas fa-boxes"></i> Inventario - Entradas (Administrador)</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Inventario</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tablaInventario" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <!-- Botón para mostrar/ocultar el menú de filtros -->
                        <button class="filter-button" onclick="toggleFilterMenu()">Mostrar
                            Filtros</button>

                        <!-- Menú de filtros lateral -->
                        <div class="filter-menu" id="filterMenu" style="display:none;">
                            <h3>Filtrar Columnas</h3>
                            <button class="btn btn-primary" onclick="filtrarPorArea('Tubería')">Tubería</button>
                            <button class="btn btn-primary" onclick="filtrarPorArea('Ensamble')">Ensamble</button>
                            <button class="btn btn-primary" onclick="filtrarPorArea('Corte')">Corte</button>
                            <button class="btn btn-primary" onclick="filtrarPorArea('Satélite')">Satélite</button>
                            <button class="btn btn-secondary" onclick="filtrarPorArea('')">Mostrar
                                Todo</button>
                        </div>


                        <tr>
                            <th>ID Entrada</th>
                            <th>Nombre</th>
                            <th>Proveedor</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Unidad de Medida</th>
                            <th>Ubicación</th>
                            <th>Fecha de Entrada</th>
                            <th>Observaciones</th>
                            <th>Responsable</th>
                            <th>Tipo de Área</th>
                        </tr>
                    <tbody id="tablaCuerpo">
                        <?php foreach ($entradas as $entrada): ?>
                            <tr>
                                <td><?= htmlspecialchars($entrada['id_entrada']) ?></td>
                                <td><?= htmlspecialchars($entrada['nombre']) ?></td>
                                <td><?= htmlspecialchars($entrada['nombre_proveedor']) ?></td>
                                <td><?= htmlspecialchars($entrada['cantidad']) ?></td>
                                <td><?= htmlspecialchars($entrada['precio_unitario']) ?></td>
                                <td><?= htmlspecialchars($entrada['unidad_medida']) ?></td>
                                <td><?= htmlspecialchars($entrada['ubicacion']) ?></td>
                                <td><?= htmlspecialchars($entrada['fecha_entrada']) ?></td>
                                <td><?= htmlspecialchars($entrada['observaciones']) ?></td>
                                <td><?= htmlspecialchars($entrada['nombre_usuario'] . ' ' . $entrada['apellido_usuario']) ?>
                                </td>
                                <td><?= htmlspecialchars($entrada['tipo_area']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; GAFRA 2024</div>
                </div>
            </div>
        </footer>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        $('#tablaInventario').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copiar'
                },
                {
                    extend: 'csv',
                    text: 'CSV'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF'
                },
                {
                    extend: 'print',
                    text: 'Imprimir'
                }
            ],
            paging: true,
            pageLength: 5,
            language: {
                processing: "Procesando...",
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                infoFiltered: "(filtrado de _MAX_ registros en total)",
                loadingRecords: "Cargando...",
                zeroRecords: "No se encontraron registros coincidentes",
                emptyTable: "No hay datos disponibles en la tabla",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Último"
                },
                aria: {
                    sortAscending: ": activar para ordenar la columna de manera ascendente",
                    sortDescending: ": activar para ordenar la columna de manera descendente"
                }
            }
        });
    });

    // Función para filtrar por área
    function filtrarPorArea(tipoArea) {
        fetch(`/gafra/inventario/listarEntradasAdministrador`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ tipo_area: tipoArea })
        })
            .then(response => response.json())
            .then(data => {
                const tablaCuerpo = document.getElementById('tablaCuerpo');
                tablaCuerpo.innerHTML = ''; // Limpiar la tabla

                // Agregar filas a la tabla con un efecto de desvanecimiento
                data.entradas.forEach((entrada, index) => {
                    const fila = document.createElement('tr');
                    fila.className = 'fila-datos';
                    fila.style.animationDelay = `${index * 0.05}s`;

                    fila.innerHTML = `
                        <td>${entrada.id_entrada}</td>
                        <td>${entrada.nombre}</td>
                        <td>${entrada.nombre_proveedor}</td>
                        <td>${entrada.cantidad}</td>
                        <td>${entrada.precio_unitario}</td>
                        <td>${entrada.unidad_medida}</td>
                        <td>${entrada.ubicacion}</td>
                        <td>${entrada.fecha_entrada}</td>
                        <td>${entrada.observaciones}</td>
                        <td>${entrada.nombre_usuario} ${entrada.apellido_usuario}</td>
                        <td>${entrada.tipo_area}</td>
                    `;

                    tablaCuerpo.appendChild(fila);
                });
            })
            .catch(error => console.error('Error al filtrar por área:', error));
    }

    // Función para mostrar/ocultar el menú de filtros
    function toggleFilterMenu() {
        var menu = document.getElementById("filterMenu");
        menu.style.display = menu.style.display === "none" || menu.style.display === "" ? "block" : "none";
    }
</script>


</body>

</html>