<?php
session_start();

// Comprobar si el usuario está autenticado
if (!isset($_SESSION['Id_usuario'])) {
    header("Location: /gafra/login");
    exit();
}

require_once 'models/ReporteModel.php';
$reporteModel = new ReporteModel();

// Obtener reportes del usuario
$id_usuario = $_SESSION['Id_usuario'];
$reportes = $reporteModel->obtenerReportesPorUsuario($id_usuario);
?>
<?php require_once "views/encargado/Vista/parte_superior.php" ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-briefcase"></i> Inicio </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>

        <div class="row">
            <!-- Elementos existentes -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-boxes fa-lg"></i>
                        <span>Inventario</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/gafra/inventario/listarEntradas">Ver detalles</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-file-alt fa-lg"></i>
                        <span>Reportes</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/gafra/reporte/verReportesPorUsuario/">Ver
                            detalles</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendario -->
        <div class="row">
            <div class="col-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</main>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; GAFRA 2024</div>
        </div>
    </div>
</footer>

<!-- Modal para ver detalles del reporte -->
<div class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewReportModalLabel">Detalles del Reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Área:</strong> <span id="detalleArea"></span></p>
                <p><strong>Fecha:</strong> <span id="detalleFecha"></span></p>
                <p><strong>Observaciones:</strong> <span id="detalleObservaciones"></span></p>
                <p><strong>Estado:</strong> <span id="detalleEstado"></span></p>
            </div>
            <div class="modal-footer">
                <!-- Botón corregido para cerrar el modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
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
    <!-- Scripts de Bootstrap y DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        // Generar los eventos en PHP y convertirlos a JSON
        var events = <?= json_encode(array_map(function($reporte) {
            return [
                'title' => htmlspecialchars($reporte['nombre_area']),
                'start' => htmlspecialchars($reporte['FechaHora']),
                'extendedProps' => [
                    'area' => htmlspecialchars($reporte['nombre_area']),
                    'observaciones' => htmlspecialchars($reporte['Observaciones']),
                    'fecha' => htmlspecialchars($reporte['FechaHora']),
                    'estadoReporte' => htmlspecialchars($reporte['Estado_Reporte'] == 1 ? 'Pendiente' : 'Confirmado')
                ],
                'display' => 'list-item' // Aparece como un punto
            ];
        }, $reportes)) ?>;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: events,
            eventClick: function (info) {
                document.getElementById('detalleArea').textContent = info.event.extendedProps.area;
                document.getElementById('detalleFecha').textContent = info.event.extendedProps.fecha;
                document.getElementById('detalleObservaciones').textContent = info.event.extendedProps.observaciones;
                document.getElementById('detalleEstado').textContent = info.event.extendedProps.estadoReporte;
                var viewReportModal = new bootstrap.Modal(document.getElementById('viewReportModal'));
                viewReportModal.show();
            }
        });

        calendar.render();
    });
</script>

</body>
</html>
