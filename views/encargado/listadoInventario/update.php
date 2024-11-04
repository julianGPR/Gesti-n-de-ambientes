<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Entrada de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        /* Estilo de botón personalizado con efecto hover */
        .btn-custom {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-lg {
            padding: 0.75rem 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Entrada de Inventario</h1>
        <form action="../editarEntrada/<?= $entrada['id_entrada'] ?>" method="POST">
            <div class="mb-3">
                <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" value="<?= htmlspecialchars($entrada['fecha_entrada']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <option value="<?= $proveedor['id_proveedor'] ?>" <?= $entrada['proveedor_id'] == $proveedor['id_proveedor'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($proveedor['nombre_proveedor']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?= htmlspecialchars($entrada['cantidad']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio_unitario" class="form-label">Precio Unitario</label>
                <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control" value="<?= htmlspecialchars($entrada['precio_unitario']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                <input type="text" name="unidad_medida" id="unidad_medida" class="form-control" value="<?= htmlspecialchars($entrada['unidad_medida']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="<?= htmlspecialchars($entrada['ubicacion']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control"><?= htmlspecialchars($entrada['observaciones']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-custom">Guardar Cambios</button>
        </form>
        <div class="text-center mt-5">
            <a href="../listarEntradas" class="btn btn-secondary btn-lg btn-custom">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
