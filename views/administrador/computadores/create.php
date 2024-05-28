<?php
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">

</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Agregar Nuevo Computador</h1>
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
    <form action="createComputador" method="POST">

    <label for="tipo">Tipo:</label><br>
        <select  type="number" id="tipo" name="tipo">
            <option value="">Seleccione...</option>
            <option value="Desktop">Desktop</option>
            <option value="Laptop">Laptop</option>
        </select><br><br>

        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo"><br><br>

        <label for="serial">Serial:</label><br>
        <input type="text" id="serial" name="serial" ><br><br>

        <label for="placaInventario">placa de Inventario:</label><br>
        <input type="text" id="placaInventario" name="placaInventario"><br><br>

        <label for="id_ambiente">Id ambiente:</label><br>
        <select id="id_ambiente" name="id_ambiente">
            <option value="">Seleccione...</option>
            <?php
            
            $sql = "SELECT Id_ambiente, Nombre FROM t_ambientes";
            $resultado = $db->query($sql);
            if ($resultado->num_rows > 0) {
                // Iterar sobre los resultados y generar opciones para el menú desplegable
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['Id_ambiente'] . '">' . $fila['Nombre'] . '</option>';
                }
            } else {
                echo '<option value="">No se encontraron ambientes disponibles</option>';
            }

            ?>
        </select><br><br>

        <label for="hardware">Hardware:</label><br>
        <select id="hardware" name="hardware">
            <option value="">Seleccione...</option>
            <option value="1">Funcional</option>
            <option value="0">No Funcional</option>
        </select><br><br>

        <label for="software">Software:</label><br>
        <select id="software" name="software">
            <option value="">Seleccione...</option>
            <option value="1">Funcional</option>
            <option value="0">No Funcional</option>
        </select><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar Computador</button>
    </form>
</section>
<footer>
    <p>Sena todos los derechos reservados </p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../computadores';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>

</body>
</html>
