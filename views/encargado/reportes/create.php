<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Crear Nuevo Reporte</h1>

        <form id="createReporteform" action="createReporte" method="POST">
            <div class="mb-3">
                <label for="id_area" class="form-label">Área</label>
                <select name="id_area" id="id_area" class="form-select" required>
                    <option value="">Seleccione un área</option>
                    <?php foreach ($areas as $area): ?>
                        <option value="<?= htmlspecialchars($area['id_area']) ?>">
                            <?= htmlspecialchars($area['nombre_area']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="estado_reporte" class="form-label">Estado Reporte</label>
                <input type="number" name="estado_reporte" id="estado_reporte" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha_solucion" class="form-label">Fecha Solución</label>
                <input type="datetime-local" name="fecha_solucion" id="fecha_solucion" class="form-control">
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar Reporte</button>
            
        </form>

        <div class="text-center mt-5">
            <a href="../reporte/verReportesPorUsuario/" class="btn btn-secondary btn-lg">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>