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
        // Corregido el nombre de la columna y la sintaxis de la consulta SQL
        $sql = "UPDATE t_ambientes SET Nombre='$nombre', Computadores='$computadores', Tv='$tv', Sillas='$sillas', Mesas='$mesas', Tablero='$tablero', Archivador='$archivador', Infraestructura='$infraestructura', Observacion='$observacion' WHERE Id_ambiente='$id'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    
    // Método para obtener un ambiente por su ID
    public function obtenerAmbientePorId($id) {
        $conn = Database::connect();
    
        // Utiliza el nombre correcto de la columna que identifica los ambientes
        $sql = "SELECT * FROM t_ambientes WHERE Id_ambiente='$id'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Retornar el ambiente encontrado
            return $result->fetch_assoc();
        } else {
            // Retornar null si no se encuentra el ambiente
            return null;
        }
    }
    
}

?>
