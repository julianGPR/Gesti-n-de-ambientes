<?php require_once "views/administrador/Vista/parte_superior.php" ?>

<div class="container-fluid">
    <!-- Sección de encabezado -->
    <div class="header-section text-center mb-5 p-4" style="background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 class="display-5 font-weight-bold text-primary">
            <i class="fas fa-briefcase"></i> Panel de Estadísticas
        </h1>
        <p class="text-muted" style="font-size: 1.2rem;">Explora todos los datos clave en una sola vista</p>
        <ol class="breadcrumb justify-content-center mt-3">
            <li class="breadcrumb-item text-secondary">
                <i class="fas fa-home"></i> Inicio
            </li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Estadísticas</li>
        </ol>
    </div>

    <!-- Contenedor principal -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="row">
                <!-- Total de Facturas -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-file-invoice"></i> Número Total de Facturas
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <h2 class="text-dark font-weight-bold">Total: <?= $data['totalFacturas'] ?></h2>
                            <canvas id="graficaFacturasPorMes" style="max-height: 250px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Facturación Total -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-dollar-sign"></i> Facturación Total
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <h2 class="text-dark font-weight-bold">Total: $<?= number_format($data['facturacionTotal'], 2) ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Facturación Promedio por Cliente -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-line"></i> Facturación Promedio por Cliente
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="graficaFacturacionPromedio" style="max-height: 250px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Productos Más Vendidos -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-box"></i> Productos Más Vendidos
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <canvas id="graficaProductosMasVendidosBar" style="max-height: 250px;"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="graficaProductosMasVendidosPie" style="max-height: 250px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="../assets/Js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/chart-area-demo.js"></script>
<script src="../assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/datatables-demo.js"></script>
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
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos proporcionados desde PHP
    const facturasPorMes = <?= json_encode($data['facturasPorMes'] ?? []) ?>;
    const facturacionPromedio = <?= json_encode($data['facturacionPromedio'] ?? []) ?>;
    const productosMasVendidos = <?= json_encode($data['productosMasVendidos'] ?? []) ?>;

    // Variables de las gráficas
    let chartFacturasPorMes, chartFacturacionPromedio, chartProductosMasVendidosBar, chartProductosMasVendidosPie;

    // Renderizar todas las gráficas juntas
    document.addEventListener('DOMContentLoaded', () => {
        renderFacturasPorMes();
        renderFacturacionPromedio();
        renderProductosMasVendidos();
    });

    // Gráfica: Facturas por Mes
    function renderFacturasPorMes() {
        const ctxFacturas = document.getElementById('graficaFacturasPorMes').getContext('2d');
        chartFacturasPorMes = new Chart(ctxFacturas, {
            type: 'line',
            data: {
                labels: facturasPorMes.map(item => item.mes),
                datasets: [{
                    label: 'Cantidad de Facturas',
                    data: facturasPorMes.map(item => item.cantidad),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Cantidad de Facturas por Mes',
                        font: { size: 18, weight: 'bold' }
                    }
                },
                scales: {
                    x: { title: { display: true, text: 'Meses', font: { size: 14 } } },
                    y: { title: { display: true, text: 'Cantidad de Facturas', font: { size: 14 } }, beginAtZero: true }
                }
            }
        });
    }

    // Gráfica: Facturación Promedio por Cliente
    function renderFacturacionPromedio() {
        const ctxPromedio = document.getElementById('graficaFacturacionPromedio').getContext('2d');
        chartFacturacionPromedio = new Chart(ctxPromedio, {
            type: 'bar',
            data: {
                labels: facturacionPromedio.map(item => item.nombre_cliente),
                datasets: [{
                    label: 'Promedio de Facturación ($)',
                    data: facturacionPromedio.map(item => item.facturacion_promedio),
                    backgroundColor: 'rgba(255, 206, 86, 0.8)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { title: { display: true, text: 'Promedio de Facturación ($)', font: { size: 14 } }, beginAtZero: true },
                    x: { title: { display: true, text: 'Clientes', font: { size: 14 } } }
                }
            }
        });
    }

    // Gráficas: Productos Más Vendidos
    function renderProductosMasVendidos() {
        const labels = productosMasVendidos.map(item => item.nombre_producto);
        const data = productosMasVendidos.map(item => item.cantidad_vendida);
        const colors = ['rgba(75, 192, 192, 0.7)', 'rgba(255, 99, 132, 0.7)', 'rgba(255, 206, 86, 0.7)', 'rgba(153, 102, 255, 0.7)'];

        // Gráfica de Barra
        const ctxBar = document.getElementById('graficaProductosMasVendidosBar').getContext('2d');
        chartProductosMasVendidosBar = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad Vendida',
                    data: data,
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { title: { display: true, text: 'Cantidad Vendida', font: { size: 14 } }, beginAtZero: true },
                    x: { title: { display: true, text: 'Productos', font: { size: 14 } } }
                }
            }
        });

        // Gráfica de Pastel
        const ctxPie = document.getElementById('graficaProductosMasVendidosPie').getContext('2d');
        chartProductosMasVendidosPie = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const total = data.reduce((sum, value) => sum + value, 0);
                                const porcentaje = ((tooltipItem.raw / total) * 100).toFixed(2);
                                return `${labels[tooltipItem.dataIndex]}: ${tooltipItem.raw} (${porcentaje}%)`;
                            }
                        }
                    }
                }
            }
        });
    }
</script>
<?php require_once "views/administrador/Vista/parte_inferior.php"; ?>