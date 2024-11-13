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
        <a class="navbar-brand" href="/dashboard/gestion%20de%20ambientes/encargado/home">
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
                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/encargado/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/inventario/listarEntradas">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/reporte/verReportesPorUsuario/'>
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Reporte
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
                        margin-top: 50px;
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


                    .container {
                        padding-bottom: 20px;
                        /* Asegura espacio en la parte inferior del contenedor */
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
                        display: flex;
                        align-items: center;
                    }
                </style>

                <main>
                    <div class="container">
                        <h1 class="header-title"><i class="fas fa-clipboard-list"></i> Crear Nueva Entrada de
                            Inventario</h1>

                        <form id="crearEntradaForm" action="crearEntrada" method="POST"
                            onsubmit="return showConfirmModal(event)">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label"><i class="fas fa-box icon"></i>
                                        Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="proveedor_id" class="form-label"><i class="fas fa-user icon"></i>
                                        Proveedor</label>
                                    <select id="proveedor_id" name="proveedor_id" class="form-select" required>
                                        <option value="">Seleccione un proveedor</option>
                                        <?php foreach ($proveedores as $proveedor): ?>
                                            <option value="<?= $proveedor['id_proveedor'] ?>">
                                                <?= htmlspecialchars($proveedor['nombre_proveedor']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tipo_area" class="form-label"><i class="fas fa-layer-group icon"></i>
                                        Área de Trabajo</label>
                                    <select id="tipo_area" name="tipo_area" class="form-select" required>
                                        <option value="">Seleccione un área de trabajo</option>
                                        <?php foreach ($tiposDeArea as $tipo): ?>
                                            <option value="<?= htmlspecialchars($tipo) ?>">
                                                <?= htmlspecialchars($tipo) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cantidad" class="form-label"><i class="fas fa-boxes icon"></i>
                                        Cantidad</label>
                                    <input type="number" id="cantidad" name="cantidad" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="precio_unitario" class="form-label"><i
                                            class="fas fa-dollar-sign icon"></i> Precio Unitario</label>
                                    <input type="number" step="0.01" id="precio_unitario" name="precio_unitario"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="unidad_medida" class="form-label"><i class="fas fa-ruler icon"></i>
                                        Unidad de Medida</label>
                                    <input type="text" id="unidad_medida" name="unidad_medida" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="ubicacion" class="form-label"><i class="fas fa-map-marker-alt icon"></i>
                                        Ubicación</label>
                                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_entrada" class="form-label"><i
                                            class="fas fa-calendar-alt icon"></i> Fecha de Entrada</label>
                                    <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="observaciones" class="form-label"><i class="fas fa-comment icon"></i>
                                    Observaciones</label>
                                <textarea id="observaciones" name="observaciones" class="form-control"
                                    rows="3"></textarea>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                    Aceptar</button>
                                <a href="../inventario/listarEntradas" class="btn btn-secondary ms-2"><i
                                        class="fas fa-times-circle"></i> Cancelar</a>
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
                        document.getElementById('crearEntradaForm').submit();
                    }
                </script>
</body>

</html>