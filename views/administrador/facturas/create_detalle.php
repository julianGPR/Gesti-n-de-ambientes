<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Detalle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Detalle a Factura</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_producto">Producto</label>
                <select name="id_producto" id="id_producto" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?php echo $producto['id']; ?>">
                            <?php echo htmlspecialchars($producto['nombre']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario</label>
                <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descuento">Descuento (%)</label>
                <input type="number" step="0.01" name="descuento" id="descuento" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Agregar Detalle</button>
        </form>
    </div>
</body>
</html>
