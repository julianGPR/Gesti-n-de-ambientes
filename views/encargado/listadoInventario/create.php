<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Entrada de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f3f5f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
        }

        .container {
            max-width: 700px;
            margin-top: 70px;
            padding-bottom: 70px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #343a40;
        }

        .btn-success, .btn-secondary {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(40, 167, 69, 0.3);
        }

        .btn-secondary:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(108, 117, 125, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Crear Nueva Entrada de Inventario</h1>
        
        <form id="crearEntradaForm" action="crearEntrada" method="POST">

            <!-- Selección de Proveedor -->
            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                    <option value="">Seleccione un proveedor</option>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <option value="<?= $proveedor['id_proveedor'] ?>">
                            <?= htmlspecialchars($proveedor['nombre_proveedor']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Campo de Cantidad -->
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>

            <!-- Campo de Precio Unitario -->
            <div class="mb-3">
                <label for="precio_unitario" class="form-label">Precio Unitario</label>
                <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control" required>
            </div>

            <!-- Campo de Unidad de Medida -->
            <div class="mb-3">
                <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                <input type="text" name="unidad_medida" id="unidad_medida" class="form-control" required>
            </div>

            <!-- Campo de Ubicación -->
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
            </div>

            <!-- Campo de Fecha de Entrada -->
            <div class="mb-3">
                <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" required>
            </div>

            <!-- Campo de Observaciones -->
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control" rows="3"></textarea>
            </div>

            <!-- Botones de acción -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-check-circle"></i> Guardar Entrada
                </button>
            </div>
        </form>
        
        <div class="text-center mt-5">
            <a href="../inventario/listarEntradas" class="btn btn-secondary btn-lg">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
