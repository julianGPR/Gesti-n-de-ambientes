<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>
    <h1>Listado de Clientes</h1>
    <a href="index.php?controller=Cliente&action=crearCliente">Agregar Cliente</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id_cliente']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['direccion']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td><?php echo $cliente['correo']; ?></td>
                    <td>
                        <a href="index.php?controller=Cliente&action=actualizarCliente&id=<?php echo $cliente['id_cliente']; ?>">Editar</a>
                        <form action="index.php?controller=Cliente&action=eliminarCliente" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $cliente['id_cliente']; ?>">
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
