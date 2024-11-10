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
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php
        $url_regresar = '../../admin/home';
        ?>
        <a class="navbar-brand" href="<?php echo $url_regresar; ?>">GAFRA</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="">Configuración</a>
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
                    <h1 class="mt-4">Gestion de Inventarios Gafra</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    $url_create = '/dashboard/gestion%20de%20ambientes/usuarios/createUsuario/';
                                    ?>
                                    <a class="small text-white stretched-link" href="<?php echo $url_create; ?>"
                                        id="btn-create">Crear Nuevo Usuario</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Gestión de Usuarios</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaReportes" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Reporte</th>
                                            <th scope="col">Fecha y Hora</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Área</th>
                                            <th scope="col">Estado Reporte</th>
                                            <th scope="col">Fecha Solución</th>
                                            <th scope="col">Observaciones</th>
                                        </tr>
                                    <tbody>
                                        <?php foreach ($reportes as $reporte): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($reporte['Id_reporte']); ?></td>
                                                <td><?php echo htmlspecialchars($reporte['FechaHora']); ?></td>
                                                <td><?php echo htmlspecialchars($reporte['Nombres'] . ' ' . $reporte['Apellidos']); ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($reporte['nombre_area']); ?></td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" class="toggle-switch"
                                                            data-id="<?php echo $reporte['Id_reporte']; ?>" <?php echo $reporte['Estado_Reporte'] == '2' ? 'checked disabled' : ''; ?>>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td class="fecha-solucion" data-id="<?php echo $reporte['Id_reporte']; ?>">
                                                    <?php echo htmlspecialchars($reporte['Fecha_Solucion']); ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($reporte['Observaciones']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="container">
                <?php if ($reportes): ?>
                    <!-- Aquí va el código para mostrar los reportes -->
                    <div class="reportes">
                        <!-- Muestra los reportes aquí -->
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center mt-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i> No hay reportes para el tipo de área seleccionado.
                    </div>
                <?php endif; ?>
            </div>

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
    <script src="../../assets/Js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablaReportes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" // Traducción al español
                }
            });

            $('.toggle-switch').change(function() {
                const idReporte = $(this).attr('data-id');
                const estadoReporte = $(this).is(':checked') ? '2' : '1';

                if (estadoReporte === '2' && confirm("¿Estás seguro de que deseas aprobar el reporte? Una vez aprobado, no se podrá deshacer.")) {
                    $.ajax({
                        url: '../actualizarEstadoReporte/', 
                        method: 'POST',
                        data: {
                            id_reporte: idReporte,
                            estado_reporte: estadoReporte
                        },
                        success: function(response) {
    try {
        const res = JSON.parse(response);
        if (res.success) {
            // Actualizar la fecha de solución en la tabla
            const fechaActual = new Date().toLocaleString();
            $(`.fecha-solucion[data-id="${idReporte}"]`).text(fechaActual);
            $(this).prop('checked', true); // Dejar el interruptor activado
        } else {
            console.error("Error en la respuesta del servidor:", res.error);
        }
    } catch (e) {
        console.error("Error al analizar JSON. Respuesta recibida:", response);
    }
},

                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                            console.error("Estado:", status);
                            console.error("Respuesta completa:", xhr.responseText); 
                        }
                    });
                } else {
                    $(this).prop('checked', false);
                }
            });
        });
    </script>    
</body>

</html>