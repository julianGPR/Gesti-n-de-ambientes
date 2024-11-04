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

            <div class="mb-4">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" required placeholder="Ingrese el estado del área">
            </div>

            <div class="mb-4">
                <label for="estado_reporte" class="form-label">Estado Reporte</label>
                <select name="estado_reporte" id="estado_reporte" class="form-select" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="fecha_solucion" class="form-label">Fecha Solución</label>
                <input type="datetime-local" name="fecha_solucion" id="fecha_solucion" class="form-control">
                <small class="text-muted">Opcional: seleccione la fecha de solución si está disponible.</small>
            </div>

            <div class="mb-4">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control" rows="3" required placeholder="Escriba cualquier observación relevante"></textarea>
            </div>

            <button type="submit" class="btn btn-success w-100">Guardar Reporte</button>
        </form>

        <div class="text-center mt-5">
            <a href="../reporte/verReportesPorUsuario/" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
