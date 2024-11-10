<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();

// Suponiendo que ya tienes la variable $productos definida
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
        </div>
        <div class="title">
            <h1>Lista de Productos</h1>
        </div>
    </header>

    <div class="filtro-y-crear">
            <div class="crear-area">
                <?php
                $url_create = '/dashboard/gestion%20de%20ambientes/Producto/crearProducto/';
                ?>
                <ul>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nueva area de trabajo</a></li>
                </ul>
            </div>
    </div>
        </div>
    <section class="producto" id="section-producto">
        <div class="tabla-productos">
            <table id="tabla-productos" class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?php echo $producto['id_producto']; ?></td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['descripcion']?></td>
                            <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                            <td><?php echo $producto['stock']?></td>
                            <td><?php echo $producto['fecha_creacion']?></td>
                            <td>
                            <?php
                             $url_update = '/dashboard/gestion%20de%20ambientes/producto/actualizarProducto/' . $producto['id_producto'];
                             echo "<a href='$url_update' class='boton-modificar'><img src='../assets/editar.svg' alt='Editar'></a>";
                            ?>
                            <?php
                             $url_delet = '/dashboard/gestion%20de%20ambientes/producto/eliminarProducto/' . $producto['id_producto'];
                             echo "<a href='$url_delet' class='boton-modificar'><img src='../assets/editar.svg' alt='Editar'></a>";
                            ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="regresar">
            <?php
            $url_regresar = '../admin/home';
            ?>
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#tabla-productos').DataTable({
                paging: true,
                pageLength: 10
            });
        });
    </script>

    <footer>
        <p>Gafra todos los derechos reservados</p>
    </footer>
</body>
</html>

