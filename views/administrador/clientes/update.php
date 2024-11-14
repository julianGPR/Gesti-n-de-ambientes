<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
</head>
<body>
    <h1>Actualizar Cliente</h1>
    <form action="index.php?controller=Cliente&action=actualizarCliente&id=<?php echo $cliente['id_cliente']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
        <br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $cliente['direccion']; ?>">
        <br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>">
        <br>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $cliente['correo']; ?>">
        <br>
        
        <button type="submit">Actualizar Cliente</button>
    </form>
    <a href="index.php?url=cliente/listarClientes">Volver al listado</a>
</body>
</html>
