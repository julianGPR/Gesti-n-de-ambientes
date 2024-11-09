<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <h2>Crear Producto</h2>
    <!--<form id="crearProducto" action="../crearProducto/<?php //echo $producto['id_producto']; ?>" method="POST">  -->
    <form id="crearProductoForm" action="crearProducto" method="POST">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" required>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required>

        <label for="fecha_creacion">Fecha de creacion:</label>
        <input type="date" name="fecha_creacion" id="fecha_creacion" required>
        
        <button type="submit">Crear Producto</button>
    </form>
    <div class="regresar">
    <?php
    $url_regresar = '../listarProductos';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
</body>
</html>
