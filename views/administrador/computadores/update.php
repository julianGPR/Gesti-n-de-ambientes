<?php
    // Verificar si la actualización fue exitosa mediante el parámetro GET 'success'
    if(isset($_GET['success']) && $_GET['success'] === 'true'): ?>
        <script>
            alert("Computador actualizado exitosamente");
        </script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Computador</title>
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
        <h1>Editar Computador</h1>
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
    <form action="../updateComputador/<?php echo $computador['Id_computador']; ?>" method="POST">
        <label for="tipo">Tipo:</label><br>
        <select id="tipo" name="tipo" required>
            <option value="Desktop" <?php if(isset($computador['Tipo']) && $computador['Tipo'] === 'Desktop') echo 'selected'; ?>>Desktop</option>
            <option value="Laptop" <?php if(isset($computador['Tipo']) && $computador['Tipo'] === 'Laptop') echo 'selected'; ?>>Laptop</option>
        </select><br><br>

        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" value="<?php echo isset($computador['Marca']) ? $computador['Marca'] : ''; ?>"><br><br>

        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo" value="<?php echo isset($computador['Modelo']) ? $computador['Modelo'] : ''; ?>"><br><br>

        <label for="serial">Serial:</label><br>
        <input type="text" id="serial" name="serial" value="<?php echo isset($computador['Serial']) ? $computador['Serial'] : ''; ?>"><br><br>

        <label for="placaInventario">Placa de inventario:</label><br> <!-- Corregido: 'placainventario' en lugar de 'placainvetario' -->
        <input type="text" id="placaInventario" name="placaInventario" value="<?php echo isset($computador['PlacaInventario']) ? $computador['PlacaInventario'] : ''; ?>"><br><br> <!-- Corregido: 'Placainventario' en lugar de 'Placainvetario' -->

        <label for="hardware">Hardware:</label><br>
        <input type="number" id="hardware" name="hardware" value="<?php echo isset($computador['Hardware']) ? $computador['Hardware'] : ''; ?>"><br><br>

        <label for="software">Software:</label><br>
        <input type="number" id="software" name="software" value="<?php echo isset($computador['Software']) ? $computador['Software'] : ''; ?>"><br><br>

        <label for="id_ambiente">ID del Ambiente:</label>
        <select id="id_ambiente" name="id_ambiente" value="<?php echo $ambiente['Id_ambiente']; ?>" readonly>
        
            <option value="">Seleccione...</option>
            <?php
            
            include_once '../../config/db.php'; // Incluir el archivo de conexión a la base de datos
            $conn = Database::connect(); // Conectar a la base de datos
            $sql = "SELECT Id_ambiente, Nombre FROM t_ambientes";
            $resultado = $conn->query($sql);
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
        <button type="submit">Guardar Cambios</button>
    </form>
</section>

<footer>
    <p>Sena todos los derechos reservados</p>
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
