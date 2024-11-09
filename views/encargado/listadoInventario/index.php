<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario - Entradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">

    <style>
        body {
            background-color: #f3f5f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: #007bff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 1px;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Gestión de Inventario</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4 text-center">Inventario - Entradas</h1>

        <div class="text-center mb-4">
            <a href="/dashboard/gestion%20de%20ambientes/inventario/crearEntrada" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i> Crear Entrada
            </a>
        </div>
        
        <div class="table-responsive">
            <table id="tablaInventario" class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID Entrada</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Unidad de Medida</th>
                        <th>Ubicación</th>
                        <th>Fecha de Entrada</th>
                        <th>Observaciones</th>
                        <th>Responsable</th>
                        <th>Área de Trabajo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entradas as $entrada): ?>
                        <tr>
                            <td><?= htmlspecialchars($entrada['id_entrada']) ?></td>
                            <td><?= htmlspecialchars($entrada['nombre']) ?></td>
                            <td><?= htmlspecialchars($entrada['nombre_proveedor']) ?></td>
                            <td><?= htmlspecialchars($entrada['cantidad']) ?></td>
                            <td><?= htmlspecialchars($entrada['precio_unitario']) ?></td>
                            <td><?= htmlspecialchars($entrada['unidad_medida']) ?></td>
                            <td><?= htmlspecialchars($entrada['ubicacion']) ?></td>
                            <td><?= htmlspecialchars($entrada['fecha_entrada']) ?></td>
                            <td><?= htmlspecialchars($entrada['observaciones']) ?></td>
                            <td><?= htmlspecialchars($entrada['nombre_usuario'] . ' ' . $entrada['apellido_usuario']) ?></td>
                            <td><?= htmlspecialchars($entrada['tipo_area']) ?></td>
                            <td>
                                <a href="/dashboard/gestion%20de%20ambientes/inventario/editarEntrada/<?= $entrada['id_entrada'] ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="/inventario/eliminar/<?= $entrada['id_entrada'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta entrada?');">
                                    <i class="bi bi-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-5">
            <a href="../encargado/home/" class="btn btn-secondary btn-lg">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
    </div>

    <!-- Scripts de Bootstrap y DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
    $('#tablaInventario').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ],
        language: {
            url: "/data/es-ES.json" // Ruta local para evitar CORS
        }
    });
});

    </script>
</body>
</html>