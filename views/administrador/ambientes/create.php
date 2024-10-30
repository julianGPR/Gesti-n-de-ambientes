<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">
<<<<<<< HEAD
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
=======
<<<<<<< HEAD
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Agregar Nuevo Ambiente</h1>
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
<section class="create-ambiente" id="section-create-ambiente">
    <form id="createAmbienteForm" action="guardarAmbiente.php" method="POST">
        <label for="nombre">Nombre del Ambiente:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="torre">Torre:</label><br>
        <select id="torre" name="torre">
            <option value="Oriental">Oriental</option>
            <option value="Occidental">Occidental</option>
        </select><br><br>

        <label for="computadores">Computadores:</label><br>
<input type="number" id="computadores" name="computadores" value="0" readonly><br><br>

<label for="tvs">TVs:</label><br>
<input type="number" id="tvs" name="tvs" value="0" readonly><br><br>

<label for="sillas">Sillas:</label><br>
<input type="number" id="sillas" name="sillas" value="0" readonly><br><br>

<label for="mesas">Mesas:</label><br>
<input type="number" id="mesas" name="mesas" value="0" readonly><br><br>

<label for="tableros">Tableros:</label><br>
<input type="number" id="tableros" name="tableros" value="0" readonly><br><br>

<label for="nineras">Niñeras:</label><br>
<input type="number" id="nineras" name="nineras" value="0" readonly><br><br>

        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado" value="Habilitado"><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar Ambiente</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../ambientes';
=======
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
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
<<<<<<< HEAD
    $url_regresar = '../areaTrabajo';
=======
    $url_regresar = 'admin';
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
<<<<<<< HEAD
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
=======
<<<<<<< HEAD
<script>
document.getElementById('createAmbienteForm').addEventListener('submit', function(event) {
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    event.preventDefault();

    var formData = new FormData(this);

    // Enviar solicitud al servidor
<<<<<<< HEAD
    fetch('guardarAreaTrabajo', {
=======
    fetch('guardarAmbiente', {
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
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
<<<<<<< HEAD
                text: 'El Area ha sido modificado exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../areaTrabajo';
=======
                text: 'El ambiente ha sido modificado exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../ambientes';
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
            });
        } else {
            // Mostrar alerta de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
<<<<<<< HEAD
                text: 'No se pudo modificar el Area. Por favor, intenta de nuevo',
=======
                text: 'No se pudo modificar el ambiente. Por favor, intenta de nuevo',
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Mostrar alerta de error de conexión
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
<<<<<<< HEAD
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
=======
            text: 'El ambiente ha sido creado exitosamente',
            confirmButtonText: 'Recargar Pagina',
            confirmButtonClass: 'custom-btn-class'
        }).then(() => {
            window.location.href = '../ambientes';
        });
    });
});
</script>
</body>
</html>
=======
</body>
</html>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
