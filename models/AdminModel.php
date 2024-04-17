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

    public function modificarAmbiente($id, $nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion){
        $conn = Database::connect();
        $sql = "UPDATE t_ambientes SET Nombre='$nombre', Computadores='$computadores', Tv='$tv', Sillas='$sillas', Mesas='$mesas', Tablero='$tablero', Archivador='$archivador', Infraestructura='$infraestructura', Observacion='$observacion' WHERE Id_ambiente='$id'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function inhabilitarAmbiente($id) {
        $conn = Database::connect();
        $sql = "UPDATE t_ambientes SET Estado = 'Inhabilitado' WHERE Id_ambiente='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function habilitarAmbiente($id) {
        $conn = Database::connect();
        $sql = "UPDATE t_ambientes SET Estado = 'Habilitado' WHERE Id_ambiente='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    

    public function obtenerAmbientePorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM t_ambientes WHERE Id_ambiente='$id'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>
