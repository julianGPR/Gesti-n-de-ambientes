<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario - Entradas (Administrador)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-4 text-center">Inventario - Entradas (Administrador)</h1>

    <!-- Botones de filtro por tipo de área -->
    <div class="text-center mb-4">
        <button class="btn btn-primary" onclick="filtrarPorArea('Tubería')">Tubería</button>
        <button class="btn btn-primary" onclick="filtrarPorArea('Ensamble')">Ensamble</button>
        <button class="btn btn-primary" onclick="filtrarPorArea('Corte')">Corte</button>
        <button class="btn btn-primary" onclick="filtrarPorArea('Satélite')">Satélite</button>
        <button class="btn btn-secondary" onclick="filtrarPorArea('')">Mostrar Todo</button>
    </div>

    <!-- Tabla de entradas de inventario -->
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
                    <th>Tipo de Área</th>
                </tr>
            </thead>
            <tbody id="tablaCuerpo">
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function filtrarPorArea(tipoArea) {
        fetch(`/dashboard/gestion%20de%20ambientes/inventario/listarEntradasAdministrador`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ tipo_area: tipoArea })
        })
        .then(response => response.json())
        .then(data => {
            const tablaCuerpo = document.getElementById('tablaCuerpo');
            tablaCuerpo.innerHTML = ''; // Limpiar la tabla
            
            data.entradas.forEach(entrada => {
                const fila = document.createElement('tr');
                
                fila.innerHTML = `
                    <td>${entrada.id_entrada}</td>
                    <td>${entrada.nombre}</td>
                    <td>${entrada.nombre_proveedor}</td>
                    <td>${entrada.cantidad}</td>
                    <td>${entrada.precio_unitario}</td>
                    <td>${entrada.unidad_medida}</td>
                    <td>${entrada.ubicacion}</td>
                    <td>${entrada.fecha_entrada}</td>
                    <td>${entrada.observaciones}</td>
                    <td>${entrada.nombre_usuario} ${entrada.apellido_usuario}</td>
                    <td>${entrada.tipo_area}</td>
                `;
                
                tablaCuerpo.appendChild(fila);
            });
        })
        .catch(error => console.error('Error al filtrar por área:', error));
    }
</script>
</body>
</html>
