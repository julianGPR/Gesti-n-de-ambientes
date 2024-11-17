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
    <link rel="icon" href="../../assets/img/login02.ico" type="image/x-icon">
    <link href="../../assets/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-blue "
        style="background: linear-gradient(20deg,  #C4C4C4, #C4C4C4);">
        <?php
        $url_regresar = '../admin/home';
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
                            echo "<span class='font-weight-bold'>El Encargado " . $row['nombre_usuario'] . " " . $row['apellido_usuario'] .
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
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle dropdown-blue" id="userDropdown" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item"
                            href="/dashboard/gestion%20de%20ambientes/usuarios/perfil">Configuración</a>
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

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/clientes/clientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                        </a>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/facturas/index">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Ventas
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
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #f8f9fa;
                }

                .container {
                    margin-top: 50px;
                    margin-bottom: 50px;
                }

                .card {
                    border: none;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    border-radius: 12px;
                }

                .card-header {
                    background: linear-gradient(to right, #4e54c8, #8f94fb);
                    color: white;
                    text-align: center;
                    font-size: 1.8rem;
                    font-weight: bold;
                    padding: 15px;
                    border-radius: 12px 12px 0 0;
                }

                .card-body {
                    padding: 30px;
                }

                .section-title {
                    font-size: 1.3rem;
                    font-weight: bold;
                    color: #495057;
                    margin-bottom: 20px;
                    padding-bottom: 10px;
                    border-bottom: 2px solid #4e54c8;
                }

                .table {
                    margin-top: 20px;
                    border-collapse: collapse;
                }

                .table th {
                    background-color: #4e54c8;
                    color: white;
                    text-align: center;
                    font-size: 1rem;
                    padding: 10px;
                }

                .table td {
                    text-align: center;
                    vertical-align: middle;
                    padding: 10px;
                    border: 1px solid #ddd;
                }

                .btn {
                    padding: 10px 20px;
                    font-size: 0.95rem;
                    font-weight: bold;
                    border-radius: 50px;
                    transition: all 0.3s ease;
                }

                .btn-primary {
                    background-color: #4e54c8;
                    border: none;
                }

                .btn-primary:hover {
                    background-color: #3a41b1;
                }

                .btn-success {
                    background-color: #28a745;
                    border: none;
                }

                .btn-success:hover {
                    background-color: #218838;
                }

                .btn-secondary {
                    background-color: #e5e7eb;
                    color: #6c757d;
                }

                .btn-secondary:hover {
                    background-color: #d6d8db;
                }

                .footer-text {
                    margin-top: 50px;
                    text-align: center;
                    font-size: 0.9rem;
                    color: #6c757d;
                }
            </style>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="card">
                                <div class="card-header">
                                    Factura #<?php echo htmlspecialchars($factura['id']); ?>
                                </div>
                                <div class="card-body">
                                    <!-- Información del Cliente -->
                                    <div>
                                        <h2 class="section-title"><i class="fas fa-user icon"></i> Información del
                                            Cliente</h2>
                                        <p><strong>Nombre:</strong>
                                            <?php echo htmlspecialchars($factura['cliente_nombre']); ?></p>
                                        <p><strong>Documento/NIT:</strong>
                                            <?php echo htmlspecialchars($factura['documento_nit']); ?></p>
                                        <p><strong>Email:</strong>
                                            <?php echo htmlspecialchars($factura['cliente_email']); ?></p>
                                        <p><strong>Teléfono:</strong>
                                            <?php echo htmlspecialchars($factura['cliente_telefono']); ?></p>
                                    </div>

                                    <!-- Información de la Factura -->
                                    <div class="mt-4">
                                        <h2 class="section-title"><i class="fas fa-receipt icon"></i> Información de la
                                            Factura</h2>
                                        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($factura['fecha']); ?>
                                        </p>
                                        <p><strong>Subtotal:</strong>
                                            <?php echo number_format($factura['subtotal'], 2); ?> COP</p>
                                        <p><strong>IVA:</strong> <?php echo number_format($factura['iva'], 2); ?> COP
                                        </p>
                                        <p><strong>Descuento:</strong>
                                            <?php echo number_format($factura['descuento'], 2); ?> COP</p>
                                        <p><strong>Total:</strong> <?php echo number_format($factura['total'], 2); ?>
                                            COP</p>
                                    </div>

                                    <!-- Detalles de los Productos -->
                                    <div class="mt-4">
                                        <h2 class="section-title"><i class="fas fa-boxes icon"></i> Detalles de los
                                            Productos</h2>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($detalles as $detalle): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($detalle['producto_nombre']); ?>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($detalle['cantidad']); ?></td>
                                                        <td><?php echo number_format($detalle['precio_unitario'], 2); ?> COP
                                                        </td>
                                                        <td><?php echo number_format($detalle['subtotal'], 2); ?> COP</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Botones de Acción -->
                                    <div class="text-right mt-4">
                                        <button class="btn btn-primary" onclick="imprimirFactura()"><i
                                                class="fas fa-print"></i> Imprimir</button>
                                        <a class="btn btn-success"
                                            href="/dashboard/gestion%20de%20ambientes/facturas/generarPDF/<?php echo $factura['id']; ?>"
                                            target="_blank"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
                                        <button class="btn btn-secondary" onclick="window.close()"><i
                                                class="fas fa-times"></i> Cerrar</button>
                                    </div>
                                </div>
                            </div>
                            <p class="footer-text">Factura generada automáticamente por el sistema. © 2024.</p>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
                    crossorigin="anonymous"></script>
                <script src="../../assets/Js/scripts.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                    crossorigin="anonymous"></script>
                <script src="../../assets/demo/chart-area-demo.js"></script>
                <script src="../../assets/demo/chart-bar-demo.js"></script>
                <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
                    crossorigin="anonymous"></script>
                <script src="../../assets/demo/datatables-demo.js"></script>

                <script>
                    function imprimirFactura() {
                        window.print();
                    }
                </script>
            </body>

</html>