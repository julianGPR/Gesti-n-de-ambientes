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

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
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
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f3f4f6;
                    }

                    .container {
                        max-width: 800px;
                        margin-top: 30px;
                    }

                    .header-title {
                        color: #1D4A86;
                        font-size: 1.8rem;
                        font-weight: bold;
                        display: flex;
                        align-items: center;
                        justify-content: left;
                        gap: 10px;
                        margin-bottom: 20px;
                    }

                    .form-label {
                        font-weight: 500;
                        color: #6b7280;
                    }

                    .form-control,
                    .form-select {
                        background-color: #f9fafb;
                        border: 1px solid #d1d5db;
                        border-radius: 4px;
                        color: #374151;
                    }

                    .btn-primary {
                        background-color: #6C63FF;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 20px;
                    }

                    .btn-secondary {
                        background-color: #e5e7eb;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 20px;
                        color: #374151;
                    }

                    .icon {
                        margin-right: 8px;
                        color: #6b7280;
                    }

                    .input-group .btn {
                        border-radius: 0 4px 4px 0;
                    }
                </style>
                    <div class="container">
                        <!-- Encabezado con ícono y título -->
                        <div class="header-title">
                            <i class="fas fa-clipboard-list"></i>
                            Agregar Nuevo Usuario
                        </div>

                        <!-- Formulario de creación de usuario -->
                        <form id="usuarioForm" action="createUsuario" method="POST"
                            onsubmit="return showConfirmModal(event)">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombres" class="form-label"><i class="fas fa-user icon"></i> Nombre del
                                        usuario</label>
                                    <input type="text" id="nombres" name="nombres" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellidos" class="form-label"><i class="fas fa-user icon"></i> Apellidos
                                        del usuario</label>
                                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="correo" class="form-label"><i class="fas fa-envelope icon"></i> Correo
                                        del usuario</label>
                                    <input type="email" id="correo" name="correo" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="clave" class="form-label"><i class="fas fa-key icon"></i>
                                        Contraseña</label>
                                    <div class="input-group">
                                        <input type="text" id="clave" name="clave" class="form-control" readonly
                                            required>
                                        <button type="button" id="generarClave" class="btn btn-primary">Generar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="rol" class="form-label"><i class="fas fa-user-tag icon"></i> Rol</label>
                                    <select id="rol" name="rol" class="form-select" required>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Encargado">Encargado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Crear
                                    Usuario</button>
                                <a href="../usuarios" class="btn btn-secondary ms-2"><i class="fas fa-times-circle"></i>
                                    Cancelar</a>
                            </div>
                        </form>
                    </div>

                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Acción</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea guardar este usuario? Esta acción no se puede deshacer.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="submitForm()">Confirmar</button>
                                </div>
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
                        function flyBell() {
                            var bellImage = document.getElementById("bellImage");
                            bellImage.classList.add("flying");
                        }

                        function flyBellAndShowPopup() {
                            var bellImage = document.getElementById("bellImage");
                            bellImage.classList.add("flying");

                            // Muestra el popup de notificaciones
                            document.getElementById("popup").style.display =
                                document.getElementById("popup").style.display === "none" ? "block" : "none";
                        }

                        function closePopup() {
                            document.getElementById("popup").style.display = "none"; // Oculta la ventana emergente
                            location.reload(); // Recarga la página para actualizar el estado de las notificaciones
                        }


                        // Generar contraseña aleatoria
                        document.getElementById("generarClave").addEventListener("click", function () {
                            var claveGenerada = Math.floor(Math.random() * 10000).toString().padStart(4, "0");
                            document.getElementById("clave").value = claveGenerada;
                        });

                        // Mostrar modal de confirmación antes de enviar el formulario
                        function showConfirmModal(event) {
                            event.preventDefault();
                            if (document.getElementById('usuarioForm').checkValidity()) { // Verificar validación de campos obligatorios
                                var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                                confirmModal.show();
                            } else {
                                document.getElementById('usuarioForm').reportValidity(); // Mostrar advertencia en campos faltantes
                            }
                        }

                        // Enviar el formulario después de la confirmación
                        function submitForm() {
                            document.getElementById('usuarioForm').submit();
                        }
                    </script>
                </body>

</html>