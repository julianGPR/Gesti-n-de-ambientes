<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Relacionada</title>
    <link rel="stylesheet" href="../../styles.css"> <!-- Ajusta la ruta según la ubicación de tu archivo CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .header {
            background-color: white;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        
        .header img {
            height: 50px;
            margin-right: 10px;
        }
        
        .header h1 {
            margin: 0;
            font-size: 1em;
        }
        
        .container {
            max-width: 100%;
            margin: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Agregado para centrar los elementos */
            flex-direction: column; /* Asegura que los elementos se apilen verticalmente */
            align-items: center; /* Centra los elementos horizontalmente */
            justify-content: center; /* Centra los elementos verticalmente */
        }

        .sublist {
            display: none; /* Agregado para ocultar inicialmente el contenido de las listas */
        }
        
        h1 {
            color: black;
            margin-top: 0;
            font-size: 1.5em;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
        }
        
        li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        
        li:last-child {
            border-bottom: none;
        }
        
        .label {
            font-weight: bold;
        }
        
        .value {
            margin-left: 10px;
        }
        
        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
                padding: 10px;
            }
        
            h1 {
                font-size: 1.2em;
            }
        }

        .date-time {
            margin: 20px 20; 
            text-align: center;
        }

        .titulo{
            text-align: center;
            padding: 10px;
        }

        .instrucciones{
            padding: 15px;
            font-size: 0.9em;
        }

        .submit-btn {
            text-align: center; /* Centra horizontalmente */
            margin-top: 20px; /* Espacio entre el formulario y el botón */
        }
        
        .submit-btn input[type='submit'] {
            background-color: #4CAF50; /* Verde */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        
        .submit-btn input[type='submit']:hover {
            background-color: #45a049; /* Verde más oscuro al pasar el ratón */
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .expand {
            display: inline-block;
            width: 20px;
            height: 20px;
            text-align: center;
            border: 1px solid #000;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <form action="InstructorController.php" method="POST">
        <div class="header">
            <img src="../../assets/Logo-Sena.jpg" alt="logo">
            <h1>Gestión de Ambientes de Formación</h1>
        </div>
        <div class="container">
            <p class="date-time">Fecha: <?php echo $fecha_actual; ?> Hora: <?php echo $hora_actual; ?></p>
            <h1 class="titulo"> <?php echo $nombre; ?></h1>
            <ul>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Infraestructura:</span>
                    <ul class="sublist"></ul>
                </li>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Mobiliario:</span>
                    <ul class="sublist">
                        <span class="label">Sillas:</span>
                        <span class="value"><?php echo $sillas; ?></span><br>
                        <span class="label">Mesas:</span>
                        <span class="value"><?php echo $mesas; ?></span><br>
                        <span class="label">Tableros:</span>
                        <span class="value"><?php echo $tablero; ?></span>
                    </ul>
                </li>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Software:</span>
                    <ul class="sublist"></ul>
                </li>
                <li class="expandable">
                    <span class="expand" onclick="toggleList(this)">+</span>
                    <span class="label">Hardware:</span>
                    <ul class="sublist">
                        <?php foreach($computadores as $computador): ?>
                            <li class="hardware-item">
                                <input type="checkbox" name="checkpc[]" id="checkpc<?php echo $computador['Serial']; ?>" value="<?php echo $computador['Serial']; ?>" <?php echo ($computador['CheckPc'] == 1) ? 'checked' : ''; ?> onclick="toggleObservationField('checkpc<?php echo $computador['Serial']; ?>', 'observacion<?php echo $computador['Serial']; ?>')">
                                <span><?php echo htmlspecialchars($computador['Marca']); ?></span>
                                <span><?php echo htmlspecialchars($computador['Modelo']); ?></span>
                                <span><?php echo $computador['Serial']; ?></span>
                                <input type="text" name="observacion" id="observacion<?php echo $computador['Serial']; ?>" placeholder="Novedad encontrada" style="display:<?php echo ($computador['CheckPc'] == 1) ? 'none' : 'block'; ?>">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                
            <div class="submit-btn">
                <input type="submit" value="Enviar">
            </div>
    </form>

        <p class="instrucciones">Sr(a) Instructor(a), en caso de evidenciar novedades al interior del ambiente de formación, seleccione el item adecuado y de forma muy concisa detalle la novedad encontrada y presiona ENVIAR</p>
        <p class="instrucciones">En caso contrario solo presione ENVIAR</p>
    </div>
    <script>
        function toggleList(element) {
            var sublist = element.parentElement.querySelector(".sublist");
            sublist.style.display = sublist.style.display === "none" ? "block" : "none";
            element.innerText = sublist.style.display === "none" ? "+" : "-";
        }

        function toggleObservationField(checkboxId, observationId) {
            var checkbox = document.getElementById(checkboxId);
            var observation = document.getElementById(observationId);
            observation.style.display = checkbox.checked ? "none" : "block";
        }

        // Llamar a toggleObservationField para cada checkbox al cargar la página
        window.addEventListener('load', function() {
            <?php foreach($computadores as $computador): ?>
                toggleObservationField('checkpc<?php echo $computador['Serial']; ?>', 'observacion<?php echo $computador['Serial']; ?>');
            <?php endforeach; ?>
        });
    </script>
</body>

</html>