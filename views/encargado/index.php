<?php
session_start();

// Comprobar si el usuario está autenticado
if (!isset($_SESSION['Id_usuario'])) {
    header("Location: /dashboard/gestion%20de%20ambientes/login");
    exit();
}
?>
<?php require_once "views/encargado/Vista/parte_superior.php" ?>
</head>
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

<body>
    <main>
        <div class="container-fluid">
            <div class="header-section">
                <h1><i class="fas fa-chart-line"></i> Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><i class="fas fa-home"></i> Menú</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-boxes fa-lg"></i>
                            <span>Inventario</span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="/dashboard/gestion%20de%20ambientes/inventario/listarEntradas">Ver detalles</a>
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
                                href="/dashboard/gestion%20de%20ambientes/reporte/verReportesPorUsuario/">Ver
                                detalles</a>
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
                <div class="text-muted">Copyright &copy; Your Website 2019</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
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