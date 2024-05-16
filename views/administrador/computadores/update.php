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
        
        <label for="tipo">Tipo de Computador:</label><br>
        <select id="tipo" name="tipo" required>
            <option value="">Seleccione...</option>
            <option value="Desktop" <?php if(isset($computador['Tipo']) && $computador['Tipo'] === '1') echo 'selected'; ?>>Desktop</option>
            <option value="Laptop" <?php if(isset($computador['Tipo']) && $computador['Tipo'] === '2') echo 'selected'; ?>>Laptop</option>
        </select><br><br>
        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" value="<?php echo isset($computador['Marca']) ? $computador['Marca'] : ''; ?>" required><br><br>

        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo" value="<?php echo isset($computador['Modelo']) ? $computador['Modelo'] : ''; ?>" required><br><br>

        <label for="serial">Serial:</label><br>
        <input type="text" id="serial" name="serial" value="<?php echo isset($computador['Serial']) ? $computador['Serial'] : ''; ?>" required><br><br>

        <label for="placaInventario">Placa de Inventario:</label><br>
        <input type="text" id="placaInventario" name="placaInventario" value="<?php echo isset($computador['PlacaInventario']) ? $computador['PlacaInventario'] : ''; ?>" required><br><br>

        <label for="id_ambiente">Ambiente:</label><br>
        <select id="id_ambiente" name="id_ambiente" required>
                <?php
                // Realizar la consulta para obtener los ambientes disponibles
                $query = "SELECT Id_ambiente, Nombre FROM t_ambientes";
                $result = $conn->query($query);

                // Verificar si la consulta fue exitosa
                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y generar las opciones
                    while ($row = $result->fetch_assoc()) {
                        $idAmbiente = $row['Id_ambiente'];
                        $nombreAmbiente = $row['Nombre'];
                        // Imprimir opción HTML para cada ambiente
                        echo "<option value='$idAmbiente'>$nombreAmbiente</option>";
                    }
                } else {
                    // En caso de que no haya ambientes disponibles
                    echo "<option value=''>No hay ambientes disponibles</option>";
                }
                ?>
        </select><br><br>
        <label for="hardware">Hardware:</label><br>
        <input type="number" id="hardware" name="hardware" value="<?php echo isset($computador['Hardware']) ? $computador['Hardware'] : ''; ?>"><br><br>

        <label for="software">Software:</label><br>
        <input type="number" id="software" name="software" value="<?php echo isset($computador['Software']) ? $computador['Software'] : ''; ?>"><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" name="observaciones" rows="4" cols="50"><?php echo isset($computador['Observaciones']) ? $computador['Observaciones'] : ''; ?></textarea><br><br>

        <button type="submit">Guardar Cambios</button>
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
