<?php

include_once 'config/db.php';

class AdminModel {
    public function guardarAmbiente($nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion) {
        $conn = Database::connect();

        $sql = "INSERT INTO t_ambientes (Nombre, Computadores, Tv, Sillas, Mesas, Tablero, Archivador, Infraestructura, Observacion)
                VALUES ('$nombre', $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, '$observacion')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>