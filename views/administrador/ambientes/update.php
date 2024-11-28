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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f3f4f6;
                }

                .container {
                    max-width: 800px;
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

                .header-title {
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #1D4A86;
                    margin-bottom: 20px;
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
                    <a class="dropdown-item" href="/gafra/usuarios/perfil">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/gafra/login">Salir</a>
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
                <!-- Título alineado a la izquierda -->
                <div class="container mt-4">
                    <h1 class="header-title"><i class="fas fa-clipboard-list"></i> Editar Sup-Área de Trabajo</h1>

                    <!-- Formulario -->
                    <div class="card-body p-4">
                        <!-- Construye la URL con el ID del área para enviarla al archivo de actualización -->
                        <form id="updateAreaTrabajoForm"
                            action="updateAreaTrabajo.php?id=<?php echo htmlspecialchars($areaTrabajo['id_area']); ?>"
                            method="POST" onsubmit="return showConfirmModal(event)">

                            <!-- Campo oculto para el ID del registro a editar -->
                            <input type="hidden" name="id" value="<?= htmlspecialchars($areaTrabajo['id_area']) ?>">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre_area" class="form-label"><i class="fas fa-building icon"></i>
                                        Nombre del Área</label>
                                    <input type="text" id="nombre_area" name="nombre_area" class="form-control"
                                        value="<?= htmlspecialchars($areaTrabajo['nombre_area']) ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="capacidad" class="form-label"><i class="fas fa-users icon"></i>
                                        Capacidad</label>
                                    <input type="number" id="capacidad" name="capacidad" class="form-control"
                                        value="<?= htmlspecialchars($areaTrabajo['capacidad']) ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="ubicacion" class="form-label"><i class="fas fa-map-marker-alt icon"></i>
                                        Ubicación</label>
                                    <input type="text" id="ubicacion" name="ubicacion" class="form-control"
                                        value="<?= htmlspecialchars($areaTrabajo['ubicacion']) ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="responsable" class="form-label"><i class="fas fa-user icon"></i>
                                        Responsable</label>
                                    <select id="responsable" name="responsable" class="form-select" required>
                                        <option value="">Seleccionar un responsable</option>
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <option value="<?= htmlspecialchars($usuario['Id_usuario']) ?>"
                                                <?= $usuario['Id_usuario'] == $areaTrabajo['responsable'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($usuario['Nombres']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tipo_area" class="form-label"><i class="fas fa-layer-group icon"></i>
                                        Tipo de Área</label>
                                    <select id="tipo_area" name="tipo_area" class="form-select" required>
                                        <option value="">Seleccione un tipo de área</option>
                                        <?php foreach ($tiposDeArea as $tipo): ?>
                                            <option value="<?= htmlspecialchars($tipo) ?>"
                                                <?= $tipo == $areaTrabajo['tipo_area'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($tipo) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="equipo_disponible" class="form-label"><i class="fas fa-tools icon"></i>
                                        Equipo Disponible</label>
                                    <input type="text" id="equipo_disponible" name="equipo_disponible"
                                        class="form-control"
                                        value="<?= htmlspecialchars($areaTrabajo['equipo_disponible']) ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="estado_area" class="form-label"><i class="fas fa-toggle-on icon"></i>
                                        Estado del Área</label>
                                    <select id="estado_area" name="estado_area" class="form-select" required>
                                        <option value="Habilitado" <?= $areaTrabajo['estado_area'] == 'Habilitado' ? 'selected' : '' ?>>Habilitado</option>
                                        <option value="Deshabilitado" <?= $areaTrabajo['estado_area'] == 'Deshabilitado' ? 'selected' : '' ?>>Deshabilitado</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_creacion" class="form-label"><i
                                            class="fas fa-calendar-alt icon"></i> Fecha de Creación</label>
                                    <input type="date" id="fecha_creacion" name="fecha_creacion" class="form-control"
                                        value="<?= htmlspecialchars($areaTrabajo['fecha_creacion']) ?>" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="comentarios" class="form-label"><i class="fas fa-comment icon"></i>
                                    Comentarios</label>
                                <textarea id="comentarios" name="comentarios" class="form-control"
                                    rows="3"><?= htmlspecialchars($areaTrabajo['comentarios']) ?></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                    Guardar Cambios</button>
                                <a href="../areaTrabajo" class="btn btn-secondary ms-2"><i
                                        class="fas fa-times-circle"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal de confirmación -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Confirmar Cambios</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Está seguro de que desea guardar los cambios? Esta acción no se puede deshacer.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                
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
   
        function showConfirmModal(event) {
                                            event.preventDefault();
                            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                     modal.show();

    // Asegura que el botón "Aceptar" realmente envíe el formulario.
    const acceptButton = document.querySelector('#confirmModal .btn-primary');
    acceptButton.onclick = () => {
        document.getElementById('updateAreaTrabajoForm').submit();
    };

    return false; // Previene el envío inicial hasta que se confirme.
}

                </script>
            </body>
</html>