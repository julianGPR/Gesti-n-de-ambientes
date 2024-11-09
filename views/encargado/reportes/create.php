<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para darle un toque profesional */
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #343a40;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-secondary {
            font-size: 0.9rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        .text-center {
            margin-top: 2rem;
        }
        .text-muted {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Crear Nuevo Reporte</h1>

        <form id="createReporteform" action="createReporte" method="POST">
            <!-- Selección de Área -->
            <div class="mb-4">
                <label for="id_area" class="form-label">Área</label>
                <select name="id_area" id="id_area" class="form-select" required aria-label="Seleccionar área">
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
                <label for="FechaHora" class="form-label">Fecha de Creación</label>
                <input type="datetime-local" name="FechaHora" id="FechaHora" class="form-control" placeholder="Seleccione la fecha de creación">
                <small class="text-muted">Si no se selecciona, se usará la fecha y hora actual.</small>
            </div>

            <!-- Observaciones -->
            <div class="mb-4">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control" rows="3" required placeholder="Escriba cualquier observación relevante"></textarea>
            </div>

            <!-- Botón para Guardar Reporte -->
            <button type="submit" class="btn btn-success w-100">Guardar Reporte</button>
        </form>

        <!-- Botón para Regresar -->
        <div class="text-center mt-5">
            <a href="../reporte/verReportesPorUsuario/" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
