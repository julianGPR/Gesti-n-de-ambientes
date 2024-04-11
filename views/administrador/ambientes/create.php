<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Ambiente</title>
</head>
<body>
</div>
    
    <h1>Agregar Nuevo Ambiente</h1>
    <div class="datetime">
        <p id="fecha"><?php echo date('d/m/Y'); ?></p>
        <p id="hora"><?php echo date('H:i'); ?></p>
    </div>
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
</body>
</html>
