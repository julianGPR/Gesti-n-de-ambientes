<?php require_once "views/administrador/Vista/parte_superior.php" ?>
<div class="container-fluid">
    <!-- Header -->
    <div class="header-section text-center py-5"
        style="background: linear-gradient(90deg, #2b2b2b, #1e1e1e); border-radius: 12px; color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
        <h1 class="display-5 fw-bold">
            <i class="fas fa-chart-bar"></i> Estadísticas
        </h1>
        <p class="mt-3" style="font-size: 1.2rem; color: #d1d1d1;">Explora datos clave con visualizaciones interactivas
        </p>
    </div>

    <!-- Opciones -->
    <div class="row text-center mt-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <button class="btn btn-outline-primary w-100 py-4 shadow-sm" onclick="mostrarModulo('totalFacturas')">
                <i class="fas fa-file-invoice fa-2x mb-2"></i>
                <h5 class="fw-bold mt-2">Número Total de Facturas</h5>
            </button>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <button class="btn btn-outline-success w-100 py-4 shadow-sm" onclick="mostrarModulo('facturacionTotal')">
                <i class="fas fa-dollar-sign fa-2x mb-2"></i>
                <h5 class="fw-bold mt-2">Facturación Total</h5>
            </button>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <button class="btn btn-outline-warning w-100 py-4 shadow-sm" onclick="mostrarModulo('facturacionPromedio')">
                <i class="fas fa-chart-line fa-2x mb-2"></i>
                <h5 class="fw-bold mt-2">Facturación Promedio</h5>
            </button>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <button class="btn btn-outline-danger w-100 py-4 shadow-sm" onclick="mostrarModulo('productosMasVendidos')">
                <i class="fas fa-box fa-2x mb-2"></i>
                <h5 class="fw-bold mt-2">Productos Más Vendidos</h5>
            </button>
        </div>
    </div>

    <!-- Contenedor dinámico -->
    <div id="contenedorModulos" class="row mt-4">
        <!-- Total de Facturas -->
        <div class="col-12" id="totalFacturas" style="display: none;">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white bg-primary">
                    <h5 class="mb-0">
                        <i class="fas fa-file-invoice"></i> Número Total de Facturas
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Título y resumen -->
                    <h2 class="fw-bold text-dark text-center mb-4">Total: <?= $data['totalFacturas'] ?></h2>

                    <!-- Gráficas -->
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h6 class="text-secondary mb-3">Facturas por Mes</h6>
                            <canvas id="graficaFacturasPorMes" style="max-height: 300px;"></canvas>
                        </div>
                        <div class="col-md-6 text-center">
                            <h6 class="text-secondary mb-3">Ventas Totales por Mes</h6>
                            <canvas id="graficaTotalVentasPorMes" style="max-height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Facturación Total -->
        <div class="col-12" id="facturacionTotal" style="display: none;">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white bg-success">
                    <h5 class="mb-0">
                        <i class="fas fa-dollar-sign"></i> Facturación Total
                    </h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="fw-bold text-dark">Total: $<?= number_format($data['facturacionTotal'], 2) ?></h2>
                </div>
            </div>
        </div>

        <!-- Facturación Promedio por Cliente -->
        <div class="col-12" id="facturacionPromedio" style="display: none;">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white bg-warning">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar"></i> Facturación Promedio por Cliente
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="graficaFacturacionPromedio"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="graficaClientesComparativa"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Productos Más Vendidos -->
        <div class="col-12" id="productosMasVendidos" style="display: none;">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white bg-danger">
                    <h5 class="mb-0">
                        <i class="fas fa-box"></i> Productos Más Vendidos
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <!-- Gráfica de Barras -->
                        <div class="col-md-6 text-center">
                            <h6 class="text-secondary mb-3">Gráfica de Barras</h6>
                            <div style="max-width: 400px; margin: auto;">
                                <canvas id="graficaProductosMasVendidosBar" style="max-height: 300px;"></canvas>
                            </div>
                        </div>
                        <!-- Gráfica de Pie -->
                        <div class="col-md-6 text-center">
                            <h6 class="text-secondary mb-3">Gráfica Circular</h6>
                            <div style="max-width: 400px; margin: auto;">
                                <canvas id="graficaProductosMasVendidosPie" style="max-height: 300px;"></canvas>
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
    const facturasPorMes = <?= json_encode($data['facturasPorMes']) ?>;
    const facturacionPromedio = <?= json_encode($data['facturacionPromedio']) ?>;
    const productosMasVendidos = <?= json_encode($data['productosMasVendidos']) ?>;

    let chartFacturasPorMes = null;
    let chartFacturacionPromedio = null;
    let chartClientesComparativa = null;
    let chartProductosMasVendidosBar = null;
    let chartProductosMasVendidosPie = null;
    let chartTotalVentasPorMes = null;

    function mostrarModulo(modulo) {
        document.querySelectorAll('#contenedorModulos > div').forEach(div => div.style.display = 'none');
        const moduloSeleccionado = document.getElementById(modulo);
        if (moduloSeleccionado) moduloSeleccionado.style.display = 'block';

        if (chartFacturasPorMes) chartFacturasPorMes.destroy();
        if (chartFacturacionPromedio) chartFacturacionPromedio.destroy();
        if (chartClientesComparativa) chartClientesComparativa.destroy();
        if (chartProductosMasVendidosBar) chartProductosMasVendidosBar.destroy();
        if (chartProductosMasVendidosPie) chartProductosMasVendidosPie.destroy();

        if (modulo === 'totalFacturas') renderFacturasPorMes();
        if (modulo === 'facturacionPromedio') {
            renderFacturacionPromedio();
            renderClientesComparativa();
        }
        if (modulo === 'productosMasVendidos') renderProductosMasVendidos();
    }

    function renderFacturasPorMes() {
        // Destruir gráficos previos si existen
        if (chartFacturasPorMes) chartFacturasPorMes.destroy();
        if (chartTotalVentasPorMes) chartTotalVentasPorMes.destroy();

        // Gráfica de cantidad de facturas por mes
        const ctxLine = document.getElementById('graficaFacturasPorMes').getContext('2d');
        chartFacturasPorMes = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: facturasPorMes.map(item => item.mes), // Meses como etiquetas
                datasets: [{
                    label: 'Cantidad de Facturas',
                    data: facturasPorMes.map(item => item.cantidad),
                    borderColor: 'rgba(54, 162, 235, 1)', // Color azul profesional
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Transparente relleno
                    borderWidth: 2, // Grosor de la línea
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // Color de los puntos
                    pointBorderColor: '#fff', // Borde blanco de los puntos
                    pointHoverRadius: 6, // Tamaño de los puntos al pasar el mouse
                    tension: 0.4 // Suavidad de la curva
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Cantidad de Facturas por Mes',
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Arial'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const index = tooltipItem.dataIndex;
                                const totalVentas = facturasPorMes[index].total_ventas;
                                return `Facturas: ${tooltipItem.raw} - Total Vendido: $${totalVentas.toLocaleString()}`;
                            }
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Meses',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad de Facturas',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });

        // Gráfica de total vendido por mes
        const ctxBar = document.getElementById('graficaTotalVentasPorMes').getContext('2d');
        chartTotalVentasPorMes = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: facturasPorMes.map(item => item.mes), // Meses como etiquetas
                datasets: [{
                    label: 'Total Ventas ($)',
                    data: facturasPorMes.map(item => item.total_ventas),
                    backgroundColor: 'rgba(255, 99, 132, 0.7)', // Rojo semitransparente
                    borderColor: 'rgba(255, 99, 132, 1)', // Borde rojo
                    borderWidth: 1 // Grosor de las barras
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total de Ventas por Mes',
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Arial'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `Total Ventas: $${tooltipItem.raw.toLocaleString()}`;
                            }
                        }
                    },
                    legend: {
                        display: false // Ocultar leyenda para gráfico de barras
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Meses',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Ventas ($)',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
        // Gráfica de total vendido por mes
        const ctxBar1 = document.getElementById('graficaTotalVentasPorMes').getContext('2d');
        chartTotalVentasPorMes = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: facturasPorMes.map(item => item.mes),
                datasets: [{
                    label: 'Total Ventas ($)',
                    data: facturasPorMes.map(item => item.total_ventas),
                    backgroundColor: 'rgba(255, 159, 64, 0.7)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Meses' } },
                    y: { beginAtZero: true, title: { display: true, text: 'Total Ventas ($)' } }
                }
            }
        });
        // Gráfica de total vendido por mes
        const ctxBar2 = document.getElementById('graficaTotalVentasPorMes').getContext('2d');
        chartTotalVentasPorMes = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: facturasPorMes.map(item => item.mes),
                datasets: [{
                    label: 'Total Ventas ($)',
                    data: facturasPorMes.map(item => item.total_ventas),
                    backgroundColor: 'rgba(255, 159, 64, 0.7)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Meses' } },
                    y: { beginAtZero: true, title: { display: true, text: 'Total Ventas ($)' } }
                }
            }
        });
    }


    function renderFacturacionPromedio() {
        const ctx = document.getElementById('graficaFacturacionPromedio').getContext('2d');
        chartFacturacionPromedio = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: facturacionPromedio.map(item => item.nombre_cliente),
                datasets: [{
                    label: 'Promedio de Facturación ($)',
                    data: facturacionPromedio.map(item => item.facturacion_promedio),
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
    }

    function renderClientesComparativa() {
        const ctx = document.getElementById('graficaClientesComparativa').getContext('2d');
        chartClientesComparativa = new Chart(ctx, {
            type: 'line',
            data: {
                labels: facturacionPromedio.map(item => item.nombre_cliente),
                datasets: [{
                    label: 'Facturación Comparativa ($)',
                    data: facturacionPromedio.map(item => item.facturacion_promedio),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    fill: false,
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
    }

    function renderProductosMasVendidos() {
        const barCtx = document.getElementById('graficaProductosMasVendidosBar').getContext('2d');
        const pieCtx = document.getElementById('graficaProductosMasVendidosPie').getContext('2d');

        const labels = productosMasVendidos.map(item => item.nombre_producto);
        const data = productosMasVendidos.map(item => item.cantidad_vendida);

        const colors = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)', 'rgba(153, 102, 255, 0.7)'];

        chartProductosMasVendidosBar = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad Vendida',
                    data: data,
                    backgroundColor: colors.slice(0, labels.length),
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });

        chartProductosMasVendidosPie = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Porcentaje de Ventas',
                    data: data,
                    backgroundColor: colors.slice(0, labels.length),
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