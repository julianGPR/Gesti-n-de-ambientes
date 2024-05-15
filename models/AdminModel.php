<?php
include_once 'config/db.php';

class AdminModel {
    public function guardarAmbiente($nombre, $torre, $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, $observaciones) {
        $conn = Database::connect();

        $sql = "INSERT INTO t_ambientes (Nombre, Torre, Computadores, CheckPcs, Tvs, CheckTvs, Sillas, CheckSillas, Mesas, CheckMesas, Tableros, CheckTableros, Nineras, CheckNineras, CheckInfraestructura, Estado, Observaciones)
                VALUES ('$nombre', '$torre', $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, '$observaciones')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarAmbiente($id, $nombre, $torre, $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, $observaciones) {
        $conn = Database::connect();
        $sql = "UPDATE t_ambientes SET Nombre='$nombre', Torre='$torre', Computadores=$computadores, CheckPcs=$checkPcs, Tvs=$tvs, CheckTvs=$checkTvs, Sillas=$sillas, CheckSillas=$checkSillas, Mesas=$mesas, CheckMesas=$checkMesas, Tableros=$tableros, CheckTableros=$checkTableros, Nineras=$nineras, CheckNineras=$checkNineras, CheckInfraestructura=$checkInfraestructura, Estado='$estado', Observaciones='$observaciones' WHERE Id_ambiente=$id";

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
    

    public function guardarUsuario($nombres, $apellidos, $clave, $rol) {
        $conn = Database::connect();

        $sql = "INSERT INTO t_usuarios (Nombres, Apellidos, Clave, Rol)
                VALUES ('$nombres', '$apellidos', $clave, '$rol')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarUsuario($id, $nombres, $apellidos, $clave, $rol) {
        $conn = Database::connect();

        $sql = "UPDATE t_usuarios SET Nombres='$nombres', Apellidos='$apellidos', Clave=$clave, Rol='$rol' WHERE Id_usuario=$id";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerUsuarioPorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM t_usuarios WHERE Id_usuario=$id";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function insertarReporte($observacion, $id_usuario, $id_ambiente) {
        $conn = Database::connect();
        $conn = Database::connect();
        $fechaHora = date("Y-m-d H:i:s"); // Obtenemos la fecha y hora actual
        
        // Insertar la observación en la tabla de reportes
        $query = "INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Estado, Observaciones) VALUES ('$fechaHora', '$id_usuario', '$id_ambiente', 'Pendiente', '$observacion')";
        $result = $conn->query($query);
        $conn->close();
        $result = $conn->query($query);
        $conn->close();
        return $result;
    }

}
?>