<?php require_once "views/administrador/Vista/parte_superior.php" ?>


<main>
    <div class="container-fluid">
        <div class="header-section text-center my-4 p-4" style="background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h1 class="display-4 font-weight-bold text-primary mb-3">
                <i class="fas fa-chart-bar"></i> Estadísticas
            </h1>
            <p class="text-secondary" style="font-size: 1.1rem;">Seleccione una opción para explorar los datos y gráficos clave</p>
        </div>

        <!-- Opciones -->
        <div class="row mb-4 text-center">
            <div class="col-md-3">
                <button class="btn btn-primary w-100 py-3" onclick="mostrarModulo('totalFacturas')">
                    <i class="fas fa-file-invoice"></i> Número Total de Facturas
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success w-100 py-3" onclick="mostrarModulo('facturacionTotal')">
                    <i class="fas fa-dollar-sign"></i> Facturación Total
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-warning w-100 py-3" onclick="mostrarModulo('facturacionPromedio')">
                    <i class="fas fa-chart-line"></i> Facturación Promedio por Cliente
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger w-100 py-3" onclick="mostrarModulo('productosMasVendidos')">
                    <i class="fas fa-box"></i> Productos Más Vendidos
                </button>
            </div>
        </div>

        <!-- Contenedor dinámico -->
        <div id="contenedorModulos" class="row">
            <!-- Total de Facturas -->
            <div class="col-lg-12" id="totalFacturas" style="display: none;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-file-invoice"></i> Número Total de Facturas
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-dark">Total: <?= $data['totalFacturas'] ?></h2>
                        <canvas id="graficaFacturasPorMes" style="max-height: 200px;" class="mt-4"></canvas>
                        <canvas id="graficaTotalVentasPorMes" style="max-height: 200px;" class="mt-4"></canvas> <!-- Nueva gráfica -->
                    </div>
                </div>
            </div>

            <!-- Facturación Total -->
            <div class="col-lg-12" id="facturacionTotal" style="display: none;">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-dollar-sign"></i> Facturación Total
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-dark">Total: $<?= number_format($data['facturacionTotal'], 2) ?></h2>
                    </div>
                </div>
            </div>

            <!-- Facturación Promedio por Cliente -->
            <div class="col-lg-12" id="facturacionPromedio" style="display: none;">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <i class="fas fa-chart-bar"></i> Facturación Promedio por Cliente
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="graficaFacturacionPromedio" style="max-height: 200px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="graficaClientesComparativa" style="max-height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Productos Más Vendidos -->
            <div class="col-lg-12" id="productosMasVendidos" style="display: none;">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-box"></i> Productos Más Vendidos
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="graficaProductosMasVendidosBar" style="max-height: 200px;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="graficaProductosMasVendidosPie" style="max-height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
                            label: function(tooltipItem) {
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
