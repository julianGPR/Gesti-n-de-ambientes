<?php

include_once 'models/InstructorModel.php';

class InstructorController {

    public function home() {
        include 'views/instructor/index.php';
    }

    public function readQR($id) {
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
