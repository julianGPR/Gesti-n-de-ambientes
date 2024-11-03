<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes por Tipo de Área</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f3f5f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
            margin: 0; /* Eliminar márgenes por defecto */
            padding-top: 70px; /* Espacio para el navbar */
            padding-bottom: 70px; /* Espacio para el footer */
            position: relative; /* Necesario para el footer */
        }

        .navbar {
            position: fixed; /* Fijar el navbar en la parte superior */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Asegura que el navbar esté por encima del contenido */
            background-color: #007bff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #343a40;
            margin-top: 20px;
        }

        .btn-custom {
            width: 250px;
            padding: 20px;
            font-size: 1.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .btn-custom:hover {
            color: #ffffff;
            background-color: #0056b3;
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.5);
        }

        .btn-secondary {
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            color: #ffffff;
            transform: scale(1.05);
        }

        .container {
            max-width: 900px;
        }

        /* CSS para bajar el footer */
        footer {
            margin-top: 50px; /* Ajusta el valor según el espacio que desees */
            padding: 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a:hover {
            color: #007bff;
        }

        /* Animaciones adicionales */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="fade-in">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard/gestion%20de%20ambientes/reporte/reportes">Gestión de Reportes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Soporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container text-center mt-5">
        <h1>Selecciona el Tipo de Área</h1>
        <p class="lead text-muted mb-4">Elige el área para la que deseas generar un reporte detallado.</p>

        <!-- Botones para cada tipo de área -->
        <div class="d-flex flex-wrap justify-content-center gap-4">
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Tuberia" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-pipe"></i> Tubería
            </a>
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Ensamble" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-tools"></i> Ensamble
            </a>
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Corte" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-scissors"></i> Corte
            </a>
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Satelite" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-satellite"></i> Satélite
            </a>
        </div>

        <!-- Botón de regresar -->
        <div class="mt-5">
            <?php $url_regresar = '../admin/home'; ?>
            <a href="<?php echo $url_regresar; ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">© 2024 Gestión de Reportes. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias de Iconos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
