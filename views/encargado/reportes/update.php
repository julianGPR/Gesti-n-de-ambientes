<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/ruta/a/actualizarReporte" method="POST">
    <input type="hidden" name="id_reporte" value="<?php echo $reporte['Id_reporte']; ?>">
    <div class="mb-3">
        <label for="id_area" class="form-label">Área</label>
        <input type="number" name="id_area" id="id_area" class="form-control" value="<?php echo htmlspecialchars($reporte['Id_area']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" name="estado" id="estado" class="form-control" value="<?php echo htmlspecialchars($reporte['Estado']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="estado_reporte" class="form-label">Estado Reporte</label>
        <input type="number" name="estado_reporte" id="estado_reporte" class="form-control" value="<?php echo htmlspecialchars($reporte['Estado_Reporte']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="fecha_solucion" class="form-label">Fecha Solución</label>
        <input type="datetime-local" name="fecha_solucion" id="fecha_solucion" class="form-control" value="<?php echo htmlspecialchars($reporte['Fecha_Solucion']); ?>">
    </div>
    <div class="mb-3">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones" class="form-control" required><?php echo htmlspecialchars($reporte['Observaciones']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Reporte</button>
</form>
</body>
</html>