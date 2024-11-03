<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Agregar Nueva area de trabajo</h1>
    </div>
    <div class="datetime">
        <?php
            date_default_timezone_set('America/Bogota');
            $fechaActual = date("d/m/Y");
            $horaActual = date("h:i a");
        ?>
        <div class="datetime">
            <div class="fecha">
                <p>Fecha actual: <?php echo $fechaActual; ?></p>
            </div>
            <div class="hora">
                <p>Hora actual: <?php echo $horaActual; ?></p>
            </div>
        </div>
    </div>
</header>
<section class="update-ambiente" id="section-update-ambiente">
    <form id="createAreaTrabajoForm" action="createAreaTrabajo<?php echo $areaTrabajo['id_area']; ?>" method="POST">
        <fieldset>
            <legend>Agregar Área de Trabajo</legend>

            <label for="nombre_area">Nombre del Área:</label><br>
            <input type="text" id="nombre_area" name="nombre_area" value="<?php echo isset($areaTrabajo['nombre_area']) ? $areaTrabajo['nombre_area'] : ''; ?>" required><br><br>

            <label for="capacidad">Capacidad:</label><br>
            <input type="number" id="capacidad" name="capacidad" value="<?php echo isset($areaTrabajo['capacidad']) ? $areaTrabajo['capacidad'] : ''; ?>" required><br><br>


            <label for="ubicacion">Ubicacion:</label><br>
            <input type="text" id="ubicacion" name="ubicacion" value=" <?php echo isset($areaTrabajo['ubicacion']) ? $areaTrabajo['ubicacion'] : '';?>" require><br><br>

            <label for="responsable">Responsable:</label><br>
            <select id="responsable" name="responsable" required>
                <option value="">Seleccionar un responsable</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?php echo $usuario['Id_usuario']; ?>" 
                        <?php echo (isset($areaTrabajo['responsable']) && $areaTrabajo['responsable'] == $usuario['Id_usuario']) ? 'selected' : ''; ?>>
                        <?php echo $usuario['Nombres']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>


            <label for="tipo_area">Tipo de Área:</label><br>
            <select id="tipo_area" name="tipo_area" required>
                <option value="Tuberia" <?php if(isset($areaTrabajo['tipo_area']) && $areaTrabajo['tipo_area'] === 'Tuberia') echo 'selected'; ?>>Tubería</option>
                <option value="Ensamble" <?php if(isset($areaTrabajo['tipo_area']) && $areaTrabajo['tipo_area'] === 'Ensamble') echo 'selected'; ?>>Ensamble</option>
                <option value="Corte" <?php if(isset($areaTrabajo['tipo_area']) && $areaTrabajo['tipo_area'] === 'Corte') echo 'selected'; ?>>Corte</option>
                <option value="Satelite" <?php if(isset($areaTrabajo['tipo_area']) && $areaTrabajo['tipo_area'] === 'Satelite') echo 'selected'; ?>>Satélite</option>
            </select><br><br>

            <label for="equipo_disponible">Equipo Disponible:</label><br>
            <input type="text" id="equipo_disponible" name="equipo_disponible" value="<?php echo isset($areaTrabajo['Equipo_disponible']) ? $areaTrabajo['Equipo_disponible'] : ''; ?>" required><br><br>

            <label for="estado_area">Estado del Área:</label><br>
            <select id="estado_area" name="estado_area" required>
                <option value="">Estado</option>
                <option value="Habilitado" <?php if(isset($areaTrabajo['estado_area']) && $areaTrabajo['estado_area'] === 'Habilitado') echo 'selected'; ?>>Habilitado</option>
                <option value="Deshabilitado" <?php if(isset($areaTrabajo['estado_area']) && $areaTrabajo['estado_area'] === 'Deshabilitado') echo 'selected'; ?>>Deshabilitado</option>
            </select><br><br>

            <label for="fecha_creacion">Fecha de Creación:</label><br>
            <input type="date" id="fecha_creacion" name="fecha_creacion" value="<?php echo isset($areaTrabajo['Fecha_creacion']) ? $areaTrabajo['Fecha_creacion'] : ''; ?>"><br><br>

            <label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="comentarios" rows="4" cols="50"><?php echo isset($areaTrabajo['Comentarios']) ? $areaTrabajo['Comentarios'] : ''; ?></textarea><br><br>

            <button type="submit">Guardar Cambios</button>
        </fieldset>
    </form>
</section>

<footer>
    <p>Gafra todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../areaTrabajo';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
<script>
/*$(document).ready(function() {
    // Cargar los usuarios en el select
    $.ajax({
        url: 'get_usuarios.php',
        dataType: 'json',
        success: function(data) {
            var select = $('#responsable');
            $.each(data, function(index, usuario) {
                select.append($('<option>').val(usuario.id).text(usuario.nombre));
            });
        }
    });*/
    document.getElementById('createAreaTrabajoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    // Enviar solicitud al servidor
    fetch('guardarAreaTrabajo', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
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
                text: 'No se pudo crear el Área. Por favor, intenta de nuevo',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema de conexión. Por favor, intenta de nuevo',
            confirmButtonText: 'OK'
        });
    });
});
//});
</script>
</body>
</html>