<?php
// Verificar si ya se inició una sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/db.php';

// Verificar si hay sesión activa
if (!isset($_SESSION['user'])) {
    header("Location: /gafra/login");
    exit();
}

// Asignar variables de la sesión
$user = $_SESSION['user'];
$usuario_activo = htmlspecialchars($user['Nombres']) . ' ' . htmlspecialchars($user['Apellidos']);
$rol_usuario = htmlspecialchars($user['Rol']);

// Conexión a la base de datos
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
    <link rel="icon" href="../assets/img/login02.ico" type="image/x-icon">
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-blue" style="background: linear-gradient(20deg, #C4C4C4, #C4C4C4);">
        <?php
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/gafra/';
        $url_regresar = $base_url . 'admin/home';
        ?>
        <a class="navbar-brand" href="<?php echo $url_regresar; ?>">
            <img src="../assets/img/login0.png" class="logo" style="width: 150px; height: auto; max-height: 50px;">
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- Notificaciones en el menú de la campana -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger badge-counter">
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM t_reportes WHERE Estado = '1'";
                        $result = $db->query($sql);
                        $row = $result->fetch_assoc();
                        echo $row['total'] > 0 ? $row['total'] : '0';
                        ?>
                    </span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Centro de Alertas</h6>
                    <?php
                    $query = "SELECT r.*, u.Nombres, u.Apellidos, a.nombre_area FROM t_reportes r 
                              INNER JOIN t_usuarios u ON r.Id_usuario = u.Id_usuario 
                              INNER JOIN AreaTrabajo a ON r.Id_area = a.Id_area 
                              WHERE r.Estado = 1";

                    $result = $db->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<a class='dropdown-item d-flex align-items-center' href='#'>";
                            echo "<div class='mr-3'>";
                            echo "<div class='icon-circle bg-primary'>";
                            echo "<i class='fas fa-file-alt text-white'></i>";
                            echo "</div></div>";
                            echo "<div>";
                            echo "<div class='small text-gray-500'>" . date("F d, Y") . "</div>";
                            echo "<span class='font-weight-bold'>El encargado {$row['Nombres']} {$row['Apellidos']} envió un reporte del área {$row['nombre_area']}.</span>";
                            echo "</div></a>";
                        }
                    } else {
                        echo "<a class='dropdown-item text-center small text-gray-500' href='#'>No hay notificaciones nuevas</a>";
                    }
                    ?>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
                </div>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle dropdown-blue" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/gafra/usuarios/perfil?id=<?php echo $_SESSION['Id_usuario']; ?>">Configuración</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/gafra/login/logout">Salir</a>
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
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>


                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/gafra/admin/areaTrabajo">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Area de trabajo
                        </a>

                        <a class="nav-link" href="/gafra/usuarios/usuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Gestión de Usuarios
                        </a>

                        <div class="nav-link d-flex align-items-center">
                            <a href="/gafra/reporte/reportes"
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
                                    href="/gafra/reporte/verReporteAdministrador/Tuberia">
                                    <i class="fas fa-toolbox"></i> Tubería
                                </a>
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Ensamble">
                                    <i class="fas fa-cogs"></i> Ensamble
                                </a>
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Corte">
                                    <i class="fas fa-cut"></i> Corte
                                </a>
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Satelite">
                                    <i class="fas fa-satellite"></i> Satélite
                                </a>
                            </nav>
                        </div>



                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/gafra/proveedores/proveedores">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Proveedores
                        </a>

                        <a class="nav-link"
                            href="/gafra/inventario/listarEntradasAdministrador">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href="/gafra/Producto/listarProductos">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Productos
                        </a>

                        <a class="nav-link" href="/gafra/clientes/clientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                        </a>

                        <a class="nav-link" href="/gafra/facturas/index">
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