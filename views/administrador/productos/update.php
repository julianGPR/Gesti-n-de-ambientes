<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
</head>
<body>
    <h2>Actualizar Producto</h2>
    <form id="actualizarProducto" action="../actualizarProducto/<?php echo $producto['id_producto']; ?>" method="POST">    
    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?= $producto['nombre'] ?>" required>

    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" id="descripcion" value="<?= $producto['descripcion'] ?>" required>
    
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" value="<?= $producto['precio'] ?>" step="0.01" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" value="<?= $producto['stock'] ?>" required>

    <label for="fecha_creacion">Fecha de creacion:</label>
    <input type="date" name="fecha_creacion" id="fecha_creacion" value="<?= $producto['fecha_creacion'] ?>" required>
    
    <button type="submit">Actualizar Producto</button>
</form>

</body>
</html>
