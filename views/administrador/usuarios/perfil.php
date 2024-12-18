<?php
//session_start();
require_once 'config/db.php';

// Verificar si hay sesión activa
if (!isset($_SESSION['user'])) {
    header("Location: /gafra/login");
    exit();
}

// Obtener información del usuario autenticado
$user = $_SESSION['user'];
$usuario_activo = $user['Nombres'] . ' ' . $user['Apellidos'];
$rol_usuario = $user['Rol'];

// Determinar la URL de inicio según el rol del usuario
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/gafra/';
$url_inicio = $rol_usuario === 'Administrador' ? $base_url . 'admin/home' : $base_url . 'encargado/home';

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
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-blue"
        style="background: linear-gradient(20deg, #C4C4C4, #C4C4C4);">
        <!-- Logo con redirección dinámica según el rol -->

        <a class="navbar-brand"></a>
        <nav class="sb-topnav navbar navbar-expand navbar-blue "
            style="background: linear-gradient(20deg,  #C4C4C4, #C4C4C4);">
            <a class="navbar-brand" href="<?php echo $url_inicio; ?>">
                <img src="../assets/img/login0.png" class="logo" style="width: 150px; height: auto; max-height: 50px;">
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <a class="dropdown-item" href="/gafra/login"><i class="fas fa-user fa-fw"></i> Salir</a>
            </ul>
        </nav>
    </nav>
    <style>
        /* General Styles */
        body {
            background: #f5f5f5;
            margin-top: -15px;
        }

        .container-box {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.12);
            margin-bottom: 20px;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D4A86;
            margin-bottom: 20px;
        }

        /* Buttons */
        .btn-default {
            border-color: rgba(24, 28, 33, 0.1);
            background: transparent;
            color: #4E5155;
        }

        .btn-outline-primary {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn-outline-primary:hover {
            background-color: #26B4FF;
            color: #fff;
        }

        .btn-back {
            background-color: #6c757d;
            color: #fff;
            border: none;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #5a6268;
            color: #fff;
        }

        /* Progress Bar */
        .progress {
            height: 6px;
            border-radius: 4px;
        }

        .progress-bar {
            border-radius: 4px;
        }

        /* Sidebar Navigation */
        .sb-sidenav-dark {
            background-color: #343a40;
            color: white;
        }

        .sb-sidenav .sb-sidenav-menu .nav-link {
            color: rgba(255, 255, 255, 0.7);
        }

        .sb-sidenav .sb-sidenav-menu .nav-link:hover {
            color: #ffffff;
        }

        .sb-sidenav-menu-heading {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
        }

        .custom-footer {
            padding: 1rem;
            font-size: 0.8rem;
            background-color: #343a40;
            color: #c7c7c7;
            text-align: center;
        }

        /* Account Settings */
        .account-settings-links .list-group-item.active {
            font-weight: bold;
            background-color: #26B4FF !important;
            color: #fff !important;
        }

        .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03);
        }

        /* Image/Profile Section */
        .ui-w-80 {
            /* Imagen o perfil relacionado */
            width: 280px !important;
            height: auto;
        }

        /* Specific to Titles or Text Alignment */
        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D4A86;
            margin-bottom: 20px;
        }
    </style>
    </head>

    <body>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link active" href="#account-general" data-toggle="tab">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                General
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="#account-edit-profile" data-toggle="tab">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Editar Perfil
                            </a>
                            <a class="nav-link" href="#account-progress" data-toggle="tab">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Progreso
                            </a>
                        </div>
                    </div>
                    <div class="custom-footer">
                        <div class="small">Conectado como:</div>
                        Proyecto GAFRA
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <!-- Contenido principal -->
                <div class="container mt-5">
                    <div class="container-box">
                        <h1 class="header-title"></i> Cuenta</h1>
                        <div class="card overflow-hidden">
                            <div class="tab-content">
                                <!-- General -->
                                <div class="tab-pane fade active show" id="account-general">
                                    <div class="card-body media align-items-center">
                                        <?php
                                        if (!empty($usuario['foto_perfil'])) {
                                            echo '<img src="' . $usuario['foto_perfil'] . '" alt="Foto de perfil" class="ui-w-80">';
                                        } else {
                                            echo '<img src="../assets/icon-5355896_1280.png" alt="Foto de perfil" class="ui-w-80">';
                                        }
                                        ?>
                                        <div class="media-body ml-4">
                                            <h5><?php echo htmlspecialchars($usuario['Nombres'] . ' ' . $usuario['Apellidos']); ?>
                                            </h5>
                                            <p><strong>Correo:</strong>
                                                <?php echo htmlspecialchars($usuario['Correo']); ?></p>
                                            <p><strong>Rol:</strong> <?php echo htmlspecialchars($usuario['Rol']); ?>
                                            </p>
                                            <p><strong>Estado:</strong>
                                                <?php echo htmlspecialchars($usuario['Estado']); ?></p>
                                            <p><strong>Especialidad:</strong>
                                                <?php echo htmlspecialchars($usuario['Especialidad']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Editar Perfil -->
                                <div class="tab-pane fade" id="account-edit-profile">
                                    <div class="card-body">
                                        <form action="/gafra/usuarios/actualizarPerfil" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nombres">Nombres</label>
                                                <input type="text" class="form-control" name="nombres" id="nombres"
                                                    value="<?php echo htmlspecialchars($usuario['Nombres']); ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                    value="<?php echo htmlspecialchars($usuario['Apellidos']); ?>"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="especialidad">Especialidad</label>
                                                <input type="text" class="form-control" name="especialidad"
                                                    id="especialidad"
                                                    value="<?php echo htmlspecialchars($usuario['Especialidad']); ?>"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="correo">Correo</label>
                                                <input type="email" class="form-control" name="correo" id="correo"
                                                    value="<?php echo htmlspecialchars($usuario['Correo']); ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto_perfil">Foto de Perfil</label>
                                                <input type="file" class="form-control-file" name="foto_perfil"
                                                    id="foto_perfil">
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary">Guardar
                                                Cambios</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Progreso -->
                                <div class="tab-pane fade" id="account-progress">
                                    <div class="card-body">
                                        <h5>Estado del Proyecto</h5>
                                        <p>Diseño Web</p>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%;">
                                            </div>
                                        </div>
                                        <p>Desarrollo Backend</p>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;">
                                            </div>
                                        </div>
                                        <p>Implementación API</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Botón Volver -->
                        <div class="text-center">
                            <a href="<?php echo $url_inicio; ?>" class="btn btn-back">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
            crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
            crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>