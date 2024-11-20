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
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/dashboard/gestion%20de%20ambientes/';
        $url_regresar = $base_url . 'admin/home';
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
                    font-family: Arial, sans-serif;
                    background-color: #f3f4f6;
                }

                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }

                .header-title {
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #1D4A86;
                    margin-bottom: 20px;
                }

                .form-label {
                    font-weight: 500;
                    color: #6b7280;
                    display: block;
                    margin-bottom: 8px;
                }

                .form-control,
                .form-select {
                    background-color: #f9fafb;
                    border: 1px solid #d1d5db;
                    border-radius: 4px;
                    color: #374151;
                    padding: 10px;
                    margin-bottom: 15px;
                }

                .btn-primary {
                    background-color: #6C63FF;
                    border: none;
                    border-radius: 8px;
                    padding: 10px 20px;
                    color: white;
                    cursor: pointer;
                }

                .btn-secondary {
                    background-color: #e5e7eb;
                    border: none;
                    border-radius: 8px;
                    padding: 10px 20px;
                    color: #374151;
                    cursor: pointer;
                    margin-left: 10px;
                }

                .btn-danger {
                    background-color: #e3342f;
                    border: none;
                    border-radius: 8px;
                    padding: 5px 15px;
                    color: white;
                    cursor: pointer;
                }

                .btn-primary:hover {
                    background-color: #5a54d2;
                }

                .btn-secondary:hover {
                    background-color: #d1d5db;
                }

                .btn-danger:hover {
                    background-color: #c72a1b;
                }

                .icon {
                    margin-right: 8px;
                    color: #6b7280;
                }

                .table {
                    margin-top: 20px;
                }
            </style>

            <div class="container">
                <h1 class="header-title"><i class="fas fa-file-invoice icon"></i> Crear Factura</h1>

                <!-- Formulario -->
                <form action="../store" method="POST">
                    <!-- Datos del Cliente -->
                    <label for="id_cliente" class="form-label"><i class="fas fa-user icon"></i> Cliente</label>
                    <select name="id_cliente" class="form-control" required>
                        <option value="">Seleccione un cliente</option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?php echo $cliente['id']; ?>">
                                <?php echo $cliente['nombre']; ?> - <?php echo $cliente['email']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Fecha de Factura -->
                    <label for="fecha" class="form-label"><i class="fas fa-calendar-alt icon"></i> Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>

                    <!-- Productos y Detalles -->
                    <h4 class="mt-4">Productos</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="productos-list">
                            <tr>
                                <td>
                                    <select name="productos[]" class="form-control producto-select"
                                        onchange="actualizarStockDisponible(this)" required>
                                        <option value="">Seleccione un producto</option>
                                        <?php foreach ($productos as $producto): ?>
                                            <option value="<?php echo $producto['id_producto']; ?>"
                                                data-stock="<?php echo $producto['stock']; ?>"
                                                data-precio="<?php echo $producto['precio']; ?>">
                                                <?php echo $producto['nombre']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td class="stock-disponible">0</td>
                                <td>
                                    <input type="number" name="cantidades[]" class="form-control cantidad-input" min="1"
                                        max="0" oninput="calcularSubtotal(this)" required>
                                </td>
                                <td class="precio-unitario">0.00</td>
                                <td class="subtotal">0.00</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="eliminarFila(this)">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="agregarFila()">Agregar Producto</button>

                    <!-- Opciones de IVA y Descuento -->
                    <div class="form-group mt-4">
                        <label>
                            <input type="checkbox" id="aplicar-iva" name="aplicar_iva" onchange="actualizarTotales()">
                            Aplicar IVA (19%)
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="aplicar-descuento" name="aplicar_descuento"
                                onchange="toggleDescuento()"> Aplicar Descuento
                        </label>
                    </div>
                    <div class="form-group descuento-container" id="descuento-container" style="display: none;">
                        <label for="descuento" class="form-label"><i class="fas fa-tags icon"></i> Porcentaje de
                            Descuento (%)</label>
                        <input type="number" id="descuento" name="descuento" class="form-control" value="0"
                            oninput="actualizarTotales()" min="0" max="100">
                    </div>

                    <!-- Totales -->
                    <h4 class="mt-4">Totales</h4>
                    <div class="form-group">
                        <label for="subtotal" class="form-label"><i class="fas fa-dollar-sign icon"></i>
                            Subtotal</label>
                        <input type="text" name="subtotal" class="form-control" id="subtotal" readonly value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="iva" class="form-label"><i class="fas fa-percentage icon"></i> IVA</label>
                        <input type="text" name="iva" class="form-control" id="iva" readonly value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="descuento-total" class="form-label"><i class="fas fa-tags icon"></i>
                            Descuento</label>
                        <input type="text" name="descuento-total" class="form-control" id="descuento-total" readonly
                            value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="total" class="form-label"><i class="fas fa-calculator icon"></i> Total</label>
                        <input type="text" name="total" class="form-control" id="total" readonly value="0.00">
                    </div>

                    <!-- Botón Guardar -->
                    <button type="submit" class="btn btn-success"><i class="fas fa-save icon"></i> Guardar
                        Factura</button>
                    <a href="../index" class="btn btn-secondary ms-2"><i class="fas fa-times-circle"></i> Cancelar</a>
                </form>
            </div>

            <!-- Scripts -->
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
                function actualizarStockDisponible(select) {
                    const stock = select.options[select.selectedIndex].getAttribute('data-stock');
                    const precio = select.options[select.selectedIndex].getAttribute('data-precio');
                    const fila = select.closest('tr');
                    fila.querySelector('.stock-disponible').textContent = stock || 0;
                    fila.querySelector('.precio-unitario').textContent = parseFloat(precio || 0).toFixed(2);
                    fila.querySelector('.cantidad-input').setAttribute('max', stock || 0);
                    fila.querySelector('.subtotal').textContent = parseFloat(0).toFixed(2);
                    actualizarTotales();
                }

                function calcularSubtotal(input) {
                    const fila = input.closest('tr');
                    const cantidad = parseFloat(input.value) || 0;
                    const precioUnitario = parseFloat(fila.querySelector('.precio-unitario').textContent) || 0;
                    const subtotal = cantidad * precioUnitario;
                    fila.querySelector('.subtotal').textContent = subtotal.toFixed(2);
                    actualizarTotales();
                }

                function toggleDescuento() {
                    const descuentoContainer = document.getElementById('descuento-container');
                    descuentoContainer.style.display = document.getElementById('aplicar-descuento').checked ? 'block' : 'none';
                    actualizarTotales();
                }

                function actualizarTotales() {
                    let subtotal = 0;
                    document.querySelectorAll('.subtotal').forEach(cell => {
                        subtotal += parseFloat(cell.textContent) || 0;
                    });

                    const aplicarIva = document.getElementById('aplicar-iva').checked;
                    const aplicarDescuento = document.getElementById('aplicar-descuento').checked;

                    let descuento = aplicarDescuento ? (subtotal * (parseFloat(document.getElementById('descuento').value) || 0)) / 100 : 0;
                    let iva = aplicarIva ? subtotal * 0.19 : 0;

                    const total = subtotal + iva - descuento;

                    document.getElementById('subtotal').value = subtotal.toFixed(2);
                    document.getElementById('iva').value = iva.toFixed(2);
                    document.getElementById('descuento-total').value = descuento.toFixed(2);
                    document.getElementById('total').value = total.toFixed(2);
                }

                function agregarFila() {
                    const nuevaFila = document.querySelector('#productos-list tr').cloneNode(true);
                    nuevaFila.querySelectorAll('input, select').forEach(input => input.value = '');
                    nuevaFila.querySelector('.stock-disponible').textContent = '0';
                    nuevaFila.querySelector('.precio-unitario').textContent = parseFloat(0).toFixed(2);
                    nuevaFila.querySelector('.subtotal').textContent = parseFloat(0).toFixed(2);
                    document.getElementById('productos-list').appendChild(nuevaFila);
                }

                function eliminarFila(button) {
                    const fila = button.closest('tr');
                    fila.remove();
                    actualizarTotales();
                }

                document.addEventListener('DOMContentLoaded', () => {
                    actualizarTotales();
                });
            </script>
</body>

</html>