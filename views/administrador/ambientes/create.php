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
</div>
<section class="create-ambiente" id="section-create-ambiente">
    <form action="createAmbiente" method="POST">
        <label for="nombre">Nombre del Ambiente:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="computadores">Computadores:</label><br>
        <input type="number" id="computadores" name="computadores" required><br><br>

        <label for="tv">TV:</label><br>
        <input type="number" id="tv" name="tv" required><br><br>

        <label for="sillas">Sillas:</label><br>
        <input type="number" id="sillas" name="sillas" required><br><br>

        <label for="mesas">Mesas:</label><br>
        <input type="number" id="mesas" name="mesas" required><br><br>

        <label for="tablero">Tablero:</label><br>
        <input type="number" id="tablero" name="tablero" required><br><br>

        <label for="archivador">Archivador:</label><br>
        <input type="number" id="archivador" name="archivador" required><br><br>

        <label for="infraestructura">Infraestructura:</label><br>
        <input type="number" id="infraestructura" name="infraestructura" required><br><br>

        <label for="observacion">Observación:</label><br>
        <textarea id="observacion" name="observacion" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar Ambiente</button>
    </form>
    </section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
    <div class="regresar">
    <?php
    $url_regresar = 'admin';
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
<<<<<<< HEAD
<script>
document.getElementById('createAmbienteForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    // Enviar solicitud al servidor
    fetch('guardarAmbiente', {
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
                text: 'El ambiente ha sido modificado exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../ambientes';
            });
        } else {
            // Mostrar alerta de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo modificar el ambiente. Por favor, intenta de nuevo',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Mostrar alerta de error de conexión
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
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
