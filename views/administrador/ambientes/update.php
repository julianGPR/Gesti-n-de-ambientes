<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Área de Trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Nueva Área de Trabajo</h1>
    <form id="createAreaTrabajoForm" action="createAreaTrabajo" method="POST">
        <div class="mb-3">
            <label for="nombre_area" class="form-label">Nombre del Área</label>
            <input type="text" id="nombre_area" name="nombre_area" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="number" id="capacidad" name="capacidad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="responsable" class="form-label">Responsable</label>
            <select id="responsable" name="responsable" class="form-select" required>
                <option value="">Seleccionar un responsable</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= htmlspecialchars($usuario['Id_usuario']) ?>">
                        <?= htmlspecialchars($usuario['Nombres']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_area" class="form-label">Tipo de Área</label>
            <select id="tipo_area" name="tipo_area" class="form-select" required>
                <option value="">Seleccione un tipo de área</option>
                <?php foreach ($tiposDeArea as $tipo): ?>
                    <option value="<?= htmlspecialchars($tipo) ?>"><?= htmlspecialchars($tipo) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="equipo_disponible" class="form-label">Equipo Disponible</label>
            <input type="text" id="equipo_disponible" name="equipo_disponible" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estado_area" class="form-label">Estado del Área</label>
            <select id="estado_area" name="estado_area" class="form-select" required>
                <option value="Habilitado">Habilitado</option>
                <option value="Deshabilitado">Deshabilitado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
            <input type="date" id="fecha_creacion" name="fecha_creacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea id="comentarios" name="comentarios" class="form-control" rows="4"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <a href="../areaTrabajo" class="btn btn-secondary">Regresar</a>
    </div>
</div>

<script>
document.getElementById('createAreaTrabajoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('createAreaTrabajo', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('La respuesta no es válida');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El Área ha sido creada exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../areaTrabajo';
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.error || 'No se pudo crear el Área. Por favor, intenta de nuevo',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema de conexión o la respuesta no es válida. Por favor, intenta de nuevo',
            confirmButtonText: 'OK'
        });
        console.error('Error:', error);
    });
});
</script>
</body>
</html>
