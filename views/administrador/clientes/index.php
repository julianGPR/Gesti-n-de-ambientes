<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <div class="card-footer d-flex align-items-center justify-content-between">
        <?php
            $url_create = '/dashboard/gestion%20de%20ambientes/clientes/createCliente/';
        ?>
        <a class="small text-white stretched-link" href="<?php echo $url_create; ?>"
            id="btn-create">Crear Nuevo Cliente</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
    </div>
    <table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Documento/NIT</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Fecha de Registro</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nombre']; ?></td>
            <td><?php echo $cliente['documento_nit']; ?></td>
            <td><?php echo $cliente['direccion']; ?></td>
            <td><?php echo $cliente['telefono']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['fecha_registro']; ?></td>
            <td>
                <?php
                $url_update = '/dashboard/gestion%20de%20ambientes/clientes/updateCliente/' . $cliente['id'];
                echo "<a href='" . $url_update . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

    </table>
</body>
</html>
