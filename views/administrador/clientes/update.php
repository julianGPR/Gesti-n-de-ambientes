<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form id="clienteForm" action="../updateCliente/<?php echo $cliente['id']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
        <br>
        <label for="documento_nit">Documento/NIT:</label>
        <input type="text" id="documento_nit" name="documento_nit" value="<?php echo $cliente['documento_nit']; ?>" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $cliente['direccion']; ?>" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
