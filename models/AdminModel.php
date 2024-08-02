<?php
<<<<<<< HEAD
include_once 'config/db.php';


// Apartado de Modelo para AMBIENTES-----------------------------------------------------------------------
    class AdminModel {
        public function guardarAmbiente($nombre, $torre, $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, $observaciones) {
            $conn = Database::connect(); // Conectar a la base de datos
    
            $sql = "INSERT INTO t_ambientes (Nombre, Torre, Computadores, CheckPcs, Tvs, CheckTvs, Sillas, CheckSillas, Mesas, CheckMesas, Tableros, CheckTableros, Nineras, CheckNineras, CheckInfraestructura, Estado, Observaciones)
                    VALUES ('$nombre', '$torre', $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, '$estado', '$observaciones')";
    
            if ($conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        
    
        public function modificarAmbiente($id, $nombre, $torre, $observaciones) {
            $conn = Database::connect();
            $sql = "UPDATE t_ambientes SET Nombre='$nombre', Torre='$torre', Observaciones='$observaciones' WHERE Id_ambiente=$id";
    
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
        
// Apartado de Modelo para COMPUTADORES------------------------------------------------------------------------

public function guardarComputador($tipo, $marca, $modelo, $serial, $placaInventario, $id_ambiente, $checkPc, $hardware, $software, $observaciones) {
    $conn = Database::connect();

    $sql = "INSERT INTO t_computadores (Tipo, Marca, Modelo, Serial, PlacaInventario, Id_ambiente, CheckPc, Hardware, Software, Observaciones)
            VALUES ('$tipo', '$marca', '$modelo', '$serial', '$placaInventario', $id_ambiente, $checkPc, '$hardware', '$software', '$observaciones')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
public function modificarComputador($id, $tipo, $marca, $modelo, $serial, $placaInventario, $nuevoIdAmbiente, $checkPc, $hardware, $software, $observaciones) {
    $conn = Database::connect();

    // Verificar la existencia del nuevo ID de ambiente solo si se proporciona
    if ($nuevoIdAmbiente !== null) {
        $verificarExistencia = $conn->query("SELECT Id_ambiente FROM t_ambientes WHERE Id_ambiente = '$nuevoIdAmbiente'");
        if ($verificarExistencia->num_rows > 0) {
            // Si el nuevo ID de ambiente existe, proceder con la actualización del computador
            $sql = "UPDATE t_computadores SET Tipo='$tipo', Marca='$marca', Modelo='$modelo', Serial='$serial', PlacaInventario='$placaInventario', Id_ambiente='$nuevoIdAmbiente', CheckPc='$checkPc', Hardware='$hardware', Software='$software', Observaciones='$observaciones' WHERE Id_computador='$id'";
            if ($conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        } else {
            // Si el nuevo ID de ambiente no existe, manejar el error o devolver false según sea necesario
            return false;
        }
    } else {
        // Si no se proporciona un nuevo ID de ambiente, actualizar el computador sin verificar la existencia
        $sql = "UPDATE t_computadores SET Tipo='$tipo', Marca='$marca', Modelo='$modelo', Serial='$serial', PlacaInventario='$placaInventario', Id_ambiente=NULL, CheckPc='$checkPc', Hardware='$hardware', Software='$software', Observaciones='$observaciones' WHERE Id_computador='$id'";
=======

include_once 'config/db.php';

class AdminModel {
    public function guardarAmbiente($nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion) {
        $conn = Database::connect();

        $sql = "INSERT INTO t_ambientes (Nombre, Computadores, Tv, Sillas, Mesas, Tablero, Archivador, Infraestructura, Observacion)
                VALUES ('$nombre', $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, '$observacion')";

>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
<<<<<<< HEAD
}

public function obtenerComputadorPorId($id) {
    $conn = Database::connect();
    $sql = "SELECT * FROM t_computadores WHERE Id_computador='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Apartado de Modelo para Reportes------------------------------------------------------------------------


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
=======

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

}
?>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
