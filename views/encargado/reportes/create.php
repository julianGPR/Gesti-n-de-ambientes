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
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }

    /* Estilo personalizado para el pie de la barra lateral */
    .custom-footer {
        background-color: #1D4A86 !important;
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
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/gafra/';
        $url_regresar = $base_url . 'encargado/home';
        ?>
        <a class="navbar-brand" href="<?php echo $url_regresar; ?>">
            <img src="../assets/img/login0.png" class="logo" style="width: 150px; height: auto; max-height: 50px;">
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        </a>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/gafra/login/logout">Salir</a>
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
                        <a class="nav-link" href="/gafra/encargado/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/gafra/inventario/listarEntradas">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href='/gafra/reporte/verReportesPorUsuario/'>
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Reporte
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
                    /* Estilos personalizados */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f3f4f6;
                    }

                    .container {
                        max-width: 600px;
                        padding: 2rem;
                        margin-top: 50px;
                    }

                    .header-title {
                        font-size: 1.75rem;
                        font-weight: bold;
                        color: #1D4A86;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-bottom: 20px;
                    }

                    .header-title i {
                        margin-right: 8px;
                    }

                    .form-label {
                        font-weight: 600;
                        color: #495057;
                    }

                    .form-control,
                    .form-select {
                        background-color: #f9fafb;
                        border: 1px solid #d1d5db;
                        border-radius: 4px;
                        color: #374151;
                    }

                    .form-control:focus,
                    .form-select:focus {
                        border-color: #28a745;
                        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
                    }

                    .btn-success {
                        background-color: #6C63FF;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 20px;
                        font-weight: bold;
                    }

                    .btn-secondary {
                        background-color: #e5e7eb;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 20px;
                        color: #374151;
                        font-weight: bold;
                    }

                    .icon {
                        margin-right: 8px;
                        color: #6b7280;
                    }
                </style>
                </head>

                <body>
                    <div class="container">
                        <h1 class="header-title"><i class="fas fa-clipboard-list"></i> Crear Nuevo Reporte</h1>

                        <form id="createReporteForm" action="createReporte" method="POST"
                            onsubmit="return showConfirmModal(event)">
                            <!-- Selección de Área -->
                            <div class="mb-4">
                                <label for="id_area" class="form-label"><i class="fas fa-layer-group icon"></i>
                                    Área</label>
                                <select name="id_area" id="id_area" class="form-select" required
                                    aria-label="Seleccionar área">
                                    <option value="">Seleccione un área</option>
                                    <?php foreach ($areas as $area): ?>
                                        <option value="<?= htmlspecialchars($area['id_area']) ?>">
                                            <?= htmlspecialchars($area['nombre_area']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Fecha de Creación -->
                            <div class="mb-4">
                                <label for="FechaHora" class="form-label"><i class="fas fa-calendar-alt icon"></i> Fecha
                                    de Creación</label>
                                <input type="datetime-local" name="FechaHora" id="FechaHora" class="form-control"
                                    placeholder="Seleccione la fecha de creación">
                                <small class="text-muted">Si no se selecciona, se usará la fecha y hora actual.</small>
                            </div>

                            <!-- Observaciones -->
                            <div class="mb-4">
                                <label for="observaciones" class="form-label"><i class="fas fa-comment icon"></i>
                                    Observaciones</label>
                                <textarea name="observaciones" id="observaciones" class="form-control" rows="3" required
                                    placeholder="Escriba cualquier observación relevante"></textarea>
                            </div>

                            <!-- Botón para Guardar Reporte -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i>
                                    Guardar Reporte</button>
                                <a href="../reporte/verReportesPorUsuario/" class="btn btn-secondary ms-2"><i
                                        class="fas fa-arrow-left"></i> Regresar</a>
                            </div>
                        </form>
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
                                    <button type="button" class="btn btn-primary"
                                        onclick="submitForm()">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>

            <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
                crossorigin="anonymous"></script>
            <script src="../assets/Js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                crossorigin="anonymous"></script>
            <script src="../assets/demo/chart-area-demo.js"></script>
            <script src="../assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
                crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
                crossorigin="anonymous"></script>
            <script src="../assets/demo/datatables-demo.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                function showConfirmModal(event) {
                    event.preventDefault();
                    var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                    confirmModal.show();
                }

                function submitForm() {
                    document.getElementById('createReporteForm').submit();
                }
            </script>
</body>

</html>