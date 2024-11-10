<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Web</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php
        $url_regresar = '../admin/home';
        ?>
        <a class="navbar-brand" href="<?php echo $url_regresar; ?>">GAFRA</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Configuración</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/dashboard/gestion%20de%20ambientes/login">Salir</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo $url_regresar; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/admin/areaTrabajo">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Area de trabajo
                        </a>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/usuarios/usuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Gestión de Usuarios
                        </a>
                        <div class="nav-link d-flex align-items-center">
                            <a href="/dashboard/gestion%20de%20ambientes/reporte/reportes"
                                class="d-flex align-items-center">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <span>Reportes</span>
                            </a>
                            <a href="#" class="ml-auto" data-toggle="collapse" data-target="#collapseLayouts"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <i class="fas fa-angle-down"></i>
                            </a>
                        </div>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Tuberia">Tuberia</a>
                                <a class="nav-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Ensamble">Ensamble</a>
                                <a class="nav-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Corte">Corte</a>
                                <a class="nav-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Satelite">Satelite</a>
                            </nav>
                        </div>



                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/proveedores/proveedores">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Proveedores
                        </a>

                        <a class="nav-link"
                            href='/dashboard/gestion%20de%20ambientes/inventario/listarEntradasAdministrador'>
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/Producto/listarProductos">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Productos
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Inventario - Entradas (Administrador)</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Inventario</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaInventario" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <!-- Botón para mostrar/ocultar el menú de filtros -->
                                        <button class="filter-button" onclick="toggleFilterMenu()">Mostrar
                                            Filtros</button>

                                        <!-- Menú de filtros lateral -->
                                        <div class="filter-menu" id="filterMenu" style="display:none;">
                                        <h3>Filtrar Columnas</h3>
                                            <button class="btn btn-primary"
                                                onclick="filtrarPorArea('Tubería')">Tubería</button>
                                            <button class="btn btn-primary"
                                                onclick="filtrarPorArea('Ensamble')">Ensamble</button>
                                            <button class="btn btn-primary"
                                                onclick="filtrarPorArea('Corte')">Corte</button>
                                            <button class="btn btn-primary"
                                                onclick="filtrarPorArea('Satélite')">Satélite</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filtrarPorArea(tipoArea) {
            fetch(`/dashboard/gestion%20de%20ambientes/inventario/listarEntradasAdministrador`, {
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

                    data.entradas.forEach(entrada => {
                        const fila = document.createElement('tr');

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