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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }

    /* Estilo personalizado para el pie de la barra lateral */
    .custom-footer {
        background-color: #1D4A86!important;
        /* Fondo azul personalizado */
        color: #C4C4C4 !important;
        /* Texto en color claro */
        padding: 10px;
        text-align: center;
    }

    .custom-footer .small {
        color: #C4C4C4 !important;
        /* Color del texto pequeño */
        font-size: 0.85rem !important;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-blue "
        style="background: linear-gradient(20deg,  #C4C4C4, #C4C4C4);">
        <?php
        $url_regresar = '../../admin/home';
        ?>
        <a class="navbar-brand" href="<?php echo $url_regresar; ?>">
            <img src="../../assets/img/login0.png" class="logo" style="width: 150px; height: auto; max-height: 50px;">
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- Notificaciones en el menú de la campana -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Contador de alertas -->
                    <span class="badge badge-danger badge-counter">
                        <?php
                        $conn = Database::connect();
                        $sql = "SELECT COUNT(*) AS total FROM t_reportes WHERE Estado = '1'";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            echo $row['total'] > 0 ? $row['total'] : '';
                        } else {
                            echo "0";
                        }
                        ?>
                    </span>
                </a>

                <!-- Dropdown - Alertas -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>

                    <?php
                    // Consulta para obtener las notificaciones no vistas
                    $query = "SELECT r.*, u.Nombres AS nombre_usuario, u.Apellidos AS apellido_usuario, a.nombre_area 
                  FROM t_reportes r 
                  INNER JOIN t_usuarios u ON r.Id_usuario = u.Id_usuario 
                  INNER JOIN AreaTrabajo a ON r.Id_area = a.Id_area 
                  WHERE r.estado = 1";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<a class='dropdown-item d-flex align-items-center' href='#'>";
                            echo "<div class='mr-3'>";
                            echo "<div class='icon-circle bg-primary'>";
                            echo "<i class='fas fa-file-alt text-white'></i>";
                            echo "</div></div>";
                            echo "<div>";
                            echo "<div class='small text-gray-500'>" . date("F d, Y") . "</div>"; // Fecha del día actual
                            echo "<span class='font-weight-bold'>El instructor " . $row['nombre_usuario'] . " " . $row['apellido_usuario'] .
                                " envió un reporte en el área " . $row['nombre_area'] . "</span>";
                            echo "</div></a>";

                            // Marcar la notificación como vista
                            $reporte_id = $row['Id_reporte'];
                            $query_update = "UPDATE t_reportes SET Estado = 2 WHERE Id_reporte = $reporte_id";
                            $conn->query($query_update);
                        }
                    } else {
                        echo "<a class='dropdown-item text-center small text-gray-500' href='#'>No hay notificaciones nuevas</a>";
                    }

                    $conn->close();
                    ?>

                    <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
                </div>
            </li>

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
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo $url_regresar; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/admin/areaTrabajo">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Area de trabajo
                        </a>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/usuarios/usuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Gestión de Usuarios
                        </a>

                        <div class="nav-link d-flex align-items-center">
                            <a href="/dashboard/gestion%20de%20ambientes/reporte/reportes"
                                class="d-flex align-items-center custom-link">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                <span>Reportes</span>
                            </a>
                            <a href="#" class="ml-auto custom-link" data-toggle="collapse"
                                data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <i class="fas fa-angle-down"></i>
                            </a>
                        </div>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link custom-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Tuberia">
                                    <i class="fas fa-toolbox"></i> Tubería
                                </a>
                                <a class="nav-link custom-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Ensamble">
                                    <i class="fas fa-cogs"></i> Ensamble
                                </a>
                                <a class="nav-link custom-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Corte">
                                    <i class="fas fa-cut"></i> Corte
                                </a>
                                <a class="nav-link custom-link"
                                    href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Satelite">
                                    <i class="fas fa-satellite"></i> Satélite
                                </a>
                            </nav>
                        </div>



                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/proveedores/proveedores">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Proveedores
                        </a>

                        <a class="nav-link"
                            href="/dashboard/gestion%20de%20ambientes/inventario/listarEntradasAdministrador">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/Producto/listarProductos">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Productos
                        </a>
                    </div>
                </div>
                <div class=" custom-footer">
                    <div class="small">Conectado como:</div>
                    Proyecto GAFRA
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Area <?php echo htmlspecialchars($tipo_area); ?></h1>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Menu</div>
                        <?php if (!empty($reportes)): ?>
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
                            <?php else: ?>
                                <div class="alert alert-warning text-center mt-4" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill"></i> No hay reportes para el tipo de área
                                    seleccionado.
                                </div>
                            <?php endif; ?>
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
    <script src="../../assets/Js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>
    <!-- Bootstrap JS y dependencias de DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <!-- CSS de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- CSS de los botones -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">

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
            $('#tablaReportes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" // Traducción al español
                }
            });

            $('.toggle-switch').change(function () {
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
                        success: function (response) {
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

                        error: function (xhr, status, error) {
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