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

    public function guardarUsuario($nombres, $apellidos, $correo, $pin, $rol) {
        $conn = Database::connect();

        $sql = "INSERT INTO t_usuarios (Nombres, Apellidos, Correo, Clave, Rol)
                VALUES ('$nombres', '$apellidos', '$correo', $pin, $rol)";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarUsuario($id, $nombres, $apellidos, $correo, $pin, $rol){
        $conn = Database::connect();

        $sql = "UPDATE t_usuarios SET Nombres='$nombres', Apellidos='$apellidos', Correo='$correo', Clave='$pin', Rol='$rol' WHERE Id_usuario='$id'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerUsuarioPorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM t_usuarios WHERE Id_usuario='$id'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function insertarReporte($observacion, $id_usuario, $id_ambiente) {
        $conn = Database::connect();
        $fechaHora = date("Y-m-d H:i:s"); // Obtenemos la fecha y hora actual
        
        // Insertar la observación en la tabla de reportes
        $query = "INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Estado, Observaciones) VALUES ('$fechaHora', '$id_usuario', '$id_ambiente', 'Pendiente', '$observacion')";
        $result = $conn->query($query);
        $conn->close();
        return $result;
    }
}
?>