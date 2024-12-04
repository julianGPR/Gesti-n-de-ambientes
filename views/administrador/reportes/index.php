<?php require_once "views/administrador/Vista/parte_superior.php" ?>

<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }

    .header-section {
        background-color: #343a40;
        color: #f8f9fa;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 1.8rem;
        font-weight: bold;
    }

    .breadcrumb {
        background-color: transparent;
        margin-bottom: 0;
        font-size: 0.9rem;
    }

    .breadcrumb-item.active {
        color: #adb5bd;
    }

    .breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        color: #adb5bd;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        font-weight: 600;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-footer {
        background-color: transparent;
        border-top: none;
    }
</style>
<main>
    <div class="container-fluid">
        
        <div class="header-section">
                <h1><i class="fas fa-file-alt"></i> Reportes por Tipo de Área</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
                </ol>
            </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-pipe"></i> Tubería
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/gafra/reporte/verReporteAdministrador/Tuberia">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-tools"></i> Ensamble
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/gafra/reporte/verReporteAdministrador/Ensamble">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-cut"></i> Corte
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/gafra/reporte/verReporteAdministrador/Corte">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-satellite-dish"></i> Satélite
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/gafra/reporte/verReporteAdministrador/Satelite">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
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
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>

</html>