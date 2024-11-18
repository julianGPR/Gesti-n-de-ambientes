<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
?>

<!DOCTYPE html>
<html lang="es">

<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">
<<<<<<< HEAD
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
=======
<<<<<<< HEAD
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Agregar Nuevo Ambiente</h1>
    </div>
    <div class="datetime">
        <?php
            date_default_timezone_set('America/Bogota');
            $fechaActual = date("d/m/Y");
            $horaActual = date("h:i a");
        ?>
        <div class="datetime">
            <div class="fecha">
                <p>Fecha actual: <?php echo $fechaActual; ?></p>
            </div>
            <div class="hora">
                <p>Hora actual: <?php echo $horaActual; ?></p>
            </div>
        </div>
    </div>
</header>
<section class="create-ambiente" id="section-create-ambiente">
    <form id="createAmbienteForm" action="guardarAmbiente.php" method="POST">
        <label for="nombre">Nombre del Ambiente:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="torre">Torre:</label><br>
        <select id="torre" name="torre">
            <option value="Oriental">Oriental</option>
            <option value="Occidental">Occidental</option>
        </select><br><br>

        <label for="computadores">Computadores:</label><br>
<input type="number" id="computadores" name="computadores" value="0" readonly><br><br>

<label for="tvs">TVs:</label><br>
<input type="number" id="tvs" name="tvs" value="0" readonly><br><br>

<label for="sillas">Sillas:</label><br>
<input type="number" id="sillas" name="sillas" value="0" readonly><br><br>

<label for="mesas">Mesas:</label><br>
<input type="number" id="mesas" name="mesas" value="0" readonly><br><br>

<label for="tableros">Tableros:</label><br>
<input type="number" id="tableros" name="tableros" value="0" readonly><br><br>

<label for="nineras">Niñeras:</label><br>
<input type="number" id="nineras" name="nineras" value="0" readonly><br><br>

        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado" value="Habilitado"><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar Ambiente</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../ambientes';
=======
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
=======
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
>>>>>>> devJulian
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

                    /* Estilo para alinear el título a la izquierda */
                    .header-title {
                        font-size: 1.5rem;
                        font-weight: bold;
                        color: #1D4A86;
                        margin-bottom: 20px;
                    }
                </style>
                </head>
                <!-- Título alineado a la izquierda -->
                <div class="container mt-4">
                    <h1 class="header-title"><i class="fas fa-clipboard-list"></i> Agregar Nueva Área de Trabajo</h1>

                    <!-- Formulario -->
                    <div class="card-body p-4">
                        <form id="areaTrabajoForm" action="createAreaTrabajo" method="POST"
                            onsubmit="return showConfirmModal(event)">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre_area" class="form-label"><i class="fas fa-building icon"></i>
                                        Nombre del Área</label>
                                    <input type="text" id="nombre_area" name="nombre_area" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="capacidad" class="form-label"><i class="fas fa-users icon"></i>
                                        Capacidad</label>
                                    <input type="number" id="capacidad" name="capacidad" class="form-control" required>
                                </div>
                            </div>

<<<<<<< HEAD
<footer>
    <p>Gafra todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
<<<<<<< HEAD
    $url_regresar = '../areaTrabajo';
=======
    $url_regresar = 'admin';
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
<<<<<<< HEAD
<script>
$(document).ready(function() {
    // Cargar los usuarios en el select
    $.ajax({
        url: 'get_usuarios.php',
        dataType: 'json',
        success: function(data) {
            var select = $('#responsable');
            $.each(data, function(index, usuario) {
                select.append($('<option>').val(usuario.id).text(usuario.nombre));
            });
        }
    });
document.getElementById('createAreaForm').addEventListener('submit', function(event) {
=======
<<<<<<< HEAD
<script>
document.getElementById('createAmbienteForm').addEventListener('submit', function(event) {
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    event.preventDefault();
=======
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="ubicacion" class="form-label"><i class="fas fa-map-marker-alt icon"></i>
                                        Ubicación</label>
                                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="responsable" class="form-label"><i class="fas fa-user icon"></i>
                                        Responsable</label>
                                    <select id="responsable" name="responsable" class="form-select" required>
                                        <option value="">Seleccionar un responsable</option>
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <option value="<?= htmlspecialchars($usuario['Id_usuario']) ?>">
                                                <?= htmlspecialchars($usuario['Nombres']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
>>>>>>> devJulian

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tipo_area" class="form-label"><i class="fas fa-layer-group icon"></i>
                                        Tipo de Área</label>
                                    <select id="tipo_area" name="tipo_area" class="form-select" required>
                                        <option value="">Seleccione un tipo de área</option>
                                        <?php foreach ($tiposDeArea as $tipo): ?>
                                            <option value="<?= htmlspecialchars($tipo) ?>"><?= htmlspecialchars($tipo) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="equipo_disponible" class="form-label"><i class="fas fa-tools icon"></i>
                                        Equipo Disponible</label>
                                    <input type="text" id="equipo_disponible" name="equipo_disponible"
                                        class="form-control" required>
                                </div>
                            </div>

<<<<<<< HEAD
    // Enviar solicitud al servidor
<<<<<<< HEAD
    fetch('guardarAreaTrabajo', {
=======
    fetch('guardarAmbiente', {
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Mostrar alerta de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
<<<<<<< HEAD
                text: 'El Area ha sido modificado exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../areaTrabajo';
=======
                text: 'El ambiente ha sido modificado exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../ambientes';
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
            });
        } else {
            // Mostrar alerta de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
<<<<<<< HEAD
                text: 'No se pudo modificar el Area. Por favor, intenta de nuevo',
=======
                text: 'No se pudo modificar el ambiente. Por favor, intenta de nuevo',
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Mostrar alerta de error de conexión
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
<<<<<<< HEAD
            text: 'El area ha sido creado exitosamente',
            confirmButtonText: 'Recargar Pagina',
            confirmButtonClass: 'custom-btn-class'
        }).then(() => {
            window.location.href = '../areaTrabajo';
        });
    });
});
});
</script>
</body>
</html>
=======
            text: 'El ambiente ha sido creado exitosamente',
            confirmButtonText: 'Recargar Pagina',
            confirmButtonClass: 'custom-btn-class'
        }).then(() => {
            window.location.href = '../ambientes';
        });
    });
});
</script>
</body>
</html>
=======
</body>
</html>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
=======
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="estado_area" class="form-label"><i class="fas fa-toggle-on icon"></i>
                                        Estado del Área</label>
                                    <select id="estado_area" name="estado_area" class="form-select" required>
                                        <option value="Habilitado">Habilitado</option>
                                        <option value="Deshabilitado">Deshabilitado</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_creacion" class="form-label"><i
                                            class="fas fa-calendar-alt icon"></i> Fecha de Creación</label>
                                    <input type="date" id="fecha_creacion" name="fecha_creacion" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="comentarios" class="form-label"><i class="fas fa-comment icon"></i>
                                    Comentarios</label>
                                <textarea id="comentarios" name="comentarios" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                    Aceptar</button>
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
                                ¿Está seguro de que desea aceptar los cambios? Esta acción no se puede deshacer.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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

                // Muestra el modal y evita que el formulario se envíe de inmediato
                function showConfirmModal(event) {
                    event.preventDefault(); // Evita el envío directo del formulario
                    var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                    confirmModal.show(); // Muestra el modal de confirmación
                }

                // Envía el formulario después de la confirmación
                function submitForm() {
                    document.getElementById('areaTrabajoForm').submit(); // Envío manual tras confirmación
                }
            </script>
</body>

</html>
>>>>>>> devJulian
