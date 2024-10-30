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
    <form id="updateAmbienteForm" action="../updateAreaTrabajo/<?php echo $ambiente['id_area']; ?>" method="POST">
        <fieldset>
            <legend>Agregar Área de Trabajo</legend>

            <label for="nombre_area">Nombre del Área:</label><br>
            <input type="text" id="nombre_area" name="nombre_area" value="<?php echo isset($ambiente['Nombre']) ? $ambiente['Nombre'] : ''; ?>" required><br><br>

            <label for="capacidad">Capacidad:</label><br>
            <input type="number" id="capacidad" name="capacidad" value="<?php echo isset($ambiente['Capacidad']) ? $ambiente['Capacidad'] : ''; ?>" required><br><br>
            <select id="responsable" name="responsable" required>
                <option value="">Seleccionar un responsable</option>
            </select><br><br>

            <label for="tipo_area">Tipo de Área:</label><br>
            <select id="tipo_area" name="tipo_area" required>
                <option value="Tuberia" <?php if(isset($ambiente['Tipo']) && $ambiente['Tipo'] === 'Tuberia') echo 'selected'; ?>>Tubería</option>
                <option value="Ensamble" <?php if(isset($ambiente['Tipo']) && $ambiente['Tipo'] === 'Ensamble') echo 'selected'; ?>>Ensamble</option>
                <option value="Corte" <?php if(isset($ambiente['Tipo']) && $ambiente['Tipo'] === 'Corte') echo 'selected'; ?>>Corte</option>
                <option value="Satelite" <?php if(isset($ambiente['Tipo']) && $ambiente['Tipo'] === 'Satelite') echo 'selected'; ?>>Satélite</option>
            </select><br><br>

            <label for="equipo_disponible">Equipo Disponible:</label><br>
            <input type="text" id="equipo_disponible" name="equipo_disponible" value="<?php echo isset($ambiente['Equipo_disponible']) ? $ambiente['Equipo_disponible'] : ''; ?>" required><br><br>

            <label for="estado_area">Estado del Área:</label><br>
            <select id="estado_area" name="estado_area" required>
                <option value="Disponible" <?php if(isset($ambiente['Estado']) && $ambiente['Estado'] === 'Disponible') echo 'selected'; ?>>Disponible</option>
                <option value="Ocupada" <?php if(isset($ambiente['Estado']) && $ambiente['Estado'] === 'Ocupada') echo 'selected'; ?>>Ocupada</option>
                <option value="En mantenimiento" <?php if(isset($ambiente['Estado']) && $ambiente['Estado'] === 'En mantenimiento') echo 'selected'; ?>>En mantenimiento</option>
            </select><br><br>

            <label for="fecha_creacion">Fecha de Creación:</label><br>
            <input type="date" id="fecha_creacion" name="fecha_creacion" value="<?php echo isset($ambiente['Fecha_creacion']) ? $ambiente['Fecha_creacion'] : ''; ?>"><br><br>

            <label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="comentarios" rows="4" cols="50"><?php echo isset($ambiente['Comentarios']) ? $ambiente['Comentarios'] : ''; ?></textarea><br><br>

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
$(document).ready(function() {
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
    });
document.getElementById('createAreaForm').addEventListener('submit', function(event) {
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
            // Mostrar alerta de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El Area ha sido modificado exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../areaTrabajo';
            });
        } else {
            // Mostrar alerta de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo modificar el Area. Por favor, intenta de nuevo',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Mostrar alerta de error de conexión
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'El area ha sido creado exitosamente',
            confirmButtonText: 'Recargar Pagina',
            confirmButtonClass: 'custom-btn-class'
        }).then(() => {
            window.location.href = '../areaTrabajo';
        });
    });
});
});
</script>
</body>
</html>