<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Agregar Cliente</h1>
    <form action="index.php?controller=Cliente&action=crearCliente" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion">
        <br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono">
        <br>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo">
        <br>
        
        <button type="submit">Guardar Cliente</button>
    </form>
    <a href="index.php?controller=Cliente&action=listarClientes">Volver al listado</a>
</body>
</html>

