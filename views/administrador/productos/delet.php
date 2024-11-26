<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
</head>
<body>
    <h2>Eliminar Producto</h2>
    <form action="<?php echo '/gafra/producto/eliminarProducto/' . $producto['id_producto']; ?>" method="POST" style="display:inline;">
    <input type="hidden" name="id" value="<?php echo $producto['id_producto']; ?>">
    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</button>
</form>
</body>
</html>
