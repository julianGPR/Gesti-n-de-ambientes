<?php

include_once 'models/InstructorModel.php';

class InstructorController {

    public function home() {
        include 'views/instructor/index.php';
    }

    public function readQR($id) {
        $qr_content = $id;

        $instructorModel = new InstructorModel(); // Corregido: 'InstructorModel' en mayúscula
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
            $observacion = htmlspecialchars($result["Observacion"]); // Corregido: 'observasion' a 'observacion'
            
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("d/m/Y");
            $hora_actual = date("H:i");

            // Incluir la vista
            include 'views/instructor/reportes/index.php';
        } else {
            echo "No se encontró información relacionada para el código QR escaneado.";
        }
    }
}

?>
