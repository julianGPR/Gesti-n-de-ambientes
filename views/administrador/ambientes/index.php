<?php
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
        $url_regresar = 'home';
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
                        <div class="sb-sidenav-menu-heading" >Interface</div>
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

                        <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/inventario/listarEntradasAdministrador'>
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
                    <h1 class="mt-4">Gestion de Inventarios Gafra</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAreaTrabajo/';
                                    ?>
                                    <a class="small text-white stretched-link" href="<?php echo $url_create; ?>"
                                        id="btn-create">Crear Nueva area de trabajo</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Area de trabajo</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabla-ambientes" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Capacidad</th>
                                            <th>Ubicacion</th>
                                            <th>Responsable</th>
                                            <th>Area</th>
                                            <th>Equipo</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Comentarios</th>
                                            <th>Accion</th>
                                        </tr>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM AreaTrabajo";

                                        if (!empty($filtros)) {
                                            $query .= " WHERE " . implode(" AND ", $filtros);
                                        }

                                        $result = $db->query($query);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id_area'] . "</td>";
                                                echo "<td>" . $row['nombre_area'] . "</td>";
                                                echo "<td>" . $row['capacidad'] . "</td>";
                                                echo "<td>" . $row['ubicacion'] . "</td>";
                                                echo "<td>" . $row['responsable'] . "</td>";
                                                echo "<td>" . $row['tipo_area'] . "</td>";
                                                echo "<td>" . $row['equipo_disponible'] . "</td>";
                                                echo "<td>" . $row['estado_area'] . "</td>";
                                                echo "<td>" . $row['fecha_creacion'] . "</td>";
                                                echo "<td>" . $row['comentarios'] . "</td>";
                                                echo "<td>";
                                                if ($row['estado_area'] !== 'Inhabilitado') {
                                                    $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAreaTrabajo/';
                                                    echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";

                                                    $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
                                                    echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-generar-qr' boton-accion ><img src='../assets/qr-code.svg'></a>";
                                                } else {
                                                    echo "<a href='#' onclick='confirmarHabilitar(" . $row['id_area'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
                                                }
                                                if ($row['estado_area'] !== 'Inhabilitado') {
                                                    echo "<a href='#' onclick='confirmarInhabilitar(" . $row['id_area'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
                                                }
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='11'>No hay registros</td></tr>";
                                        }

                                        $db->close();
                                        ?>
                        </tbody>
                    </table>
                 </section>
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
    <script>
        $(document).ready(function() {
            $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                paging: true,
                pageLength: 5
            });
    });

        function confirmarInhabilitar(id) {
            if (confirm("¿Estás seguro de que deseas inhabilitar esta área?")) {
                window.location.href = "inhabilitarAreaTrabajo/" + id;
            }
        }

        function confirmarHabilitar(id) {
            if (confirm("¿Estás seguro de que deseas habilitar esta área?")) {
                window.location.href = "habilitarAreaTrabajo/" + id;
            }
        }
    </script>
</body>
</html>