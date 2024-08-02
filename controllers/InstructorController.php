<?php

include_once 'models/InstructorModel.php';

class InstructorController {

    public function home() {
        include 'views/instructor/index.php';
    }

    public function readQR($id) {
<<<<<<< HEAD
        $qr_content = $id;
    
        $instructorModel = new InstructorModel();
        $result = $instructorModel->leerQR($qr_content);
    
        if ($result) {
            $nombre = htmlspecialchars($result[0]["Nombre"]); // Tomamos el nombre del primer resultado
            $computadores = array_map(function($item) {
                return [
                    'Serial' => $item['SerialComputador'],
                    'Marca' => $item['MarcaComputador'],
                    'Modelo' => $item['ModeloComputador'],
                    'CheckPc' => $item['CheckPc']
                ];
            }, $result); // Obtenemos un array con los números de serie, la marca, el modelo y el estado de CheckPcs

            $tv = htmlspecialchars($result[0]["Tvs"]);
            $sillas = htmlspecialchars($result[0]["Sillas"]);
            $mesas = htmlspecialchars($result[0]["Mesas"]);
            $tablero = htmlspecialchars($result[0]["Tableros"]);
            $archivador = htmlspecialchars($result[0]["Nineras"]);
            $infraestructura = htmlspecialchars($result[0]["CheckInfraestructura"]);
            $observacion = htmlspecialchars($result[0]["Observaciones"]);
    
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("d/m/Y");
            $hora_actual = date("H:i");
    
            include 'views/instructor/reportes/index.php';
        } else {
            echo "No se encontró información relacionada para el código QR escaneado.";
        }
    }
    
    }

?>
=======
        
            $qr_content = $id;
    
            $instructorModel = new instructorModel();
            $result = $instructorModel->leerQR($qr_content);
    
            if ($result) {
                $nombre = htmlspecialchars($result["Nombre"]);
                $estado = htmlspecialchars($result["Estado"]);
                $computadoras = htmlspecialchars($result["Computadores"]);
                $tv = htmlspecialchars($result["Tv"]);
                $sillas = htmlspecialchars($result["Sillas"]);
                $mesas = htmlspecialchars($result["Mesas"]);
                $tablero = htmlspecialchars($result["Tablero"]);
                $archivador = htmlspecialchars($result["Archivador"]);
                $infraestructura = htmlspecialchars($result["Infraestructura"]);
                $observasion = htmlspecialchars($result["Observacion"]);
                
                date_default_timezone_set('America/Bogota');
                $fecha_actual = date("d/m/Y");
                $hora_actual = date("H:i");


                $view = "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Información Relacionada</title>
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
                
                </style>
                </head>
                <body>
                    <div class='header'>
                        <img src='../../assets/Logo-Sena.jpg' alt='logo'>
                        <h1>Gestión de Ambientes de Formación</h1>
                    </div>
                    <div class='container'>
                        <p class='date-time'>Fecha: $fecha_actual Hora: $hora_actual</p>
                        <h1 class='titulo'>Ambiente $nombre</h1>
                        <ul>
                            <li>
                                <span class='label'>Computadores:</span>
                                <span class='value'>$computadoras</span>
                            </li>
                            <li>
                                <span class='label'>Televisores:</span>
                                <span class='value'>$tv</span>
                            </li>
                            <li>
                                <span class='label'>Sillas:</span>
                                <span class='value'>$sillas</span>
                            </li>
                            <li>
                                <span class='label'>Mesas:</span>
                                <span class='value'>$mesas</span>
                            </li>
                            <li>
                                <span class='label'>Tablero:</span>
                                <span class='value'>$tablero</span>
                            </li>
                            </li>
                            <li>
                                <span class='label'>Archivador:</span>
                                <span class='value'>$archivador</span>
                            </li>
                            <li>
                                <span class='label'>Infraestructura:</span>
                                <span class='value'>$infraestructura</span>
                            </li>
                            <li>
                                <span class='label'>Observasion:</span>
                                <span class='value'>$observasion</span>
                            </li>
                            <li>
                                <span class='label'>Estado:</span>
                                <span class='value'>$estado</span>
                            </li>
                        </ul>

                        <div class='submit-btn'>
                            <input type='submit' value='Enviar'>
                        </div>

                        <b><p class='instrucciones'> Sr(a) Instructor(a), en caso de evidenciar novedades al inerior del ambiente de formacion, seleccione el item adecuado y de forma muy concisa detalle la novedad encontrada y presiona ENVIAR</p>
                        <b><p class='instrucciones'> En caso contrario solo presione ENVIAR </p>
                    </div>
                </body>
                </html>";

                echo $view;
            } else {
                echo "No se encontró información relacionada para el código QR escaneado.";
            }
    }
    

}
?>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
