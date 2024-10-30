<?php

<<<<<<< HEAD
// instructorModel.php

=======
<<<<<<< HEAD
// instructorModel.php

include_once 'config/db.php';

class instructorModel {

    public function leerQR($qr_content) {
        $conn = Database::connect();
        $sql = "SELECT t_ambientes.*, 
                       t_computadores.Serial as SerialComputador, 
                       t_computadores.CheckPc as CheckPcs, 
                       t_computadores.Marca as MarcaComputador, 
                       t_computadores.Modelo as ModeloComputador
                FROM t_ambientes
                INNER JOIN t_computadores ON t_ambientes.Id_Ambiente = t_computadores.Id_Ambiente
                WHERE t_ambientes.id_ambiente = '$qr_content'";
        
        $result = $conn->query($sql);
        
        // Verificar si la consulta SQL fue exitosa
        if (!$result) {
            die("Error en la consulta SQL: " . $conn->error);
        }
        
        $ambientes = []; // Array para almacenar los ambientes con sus respectivos computadores
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Crear un array asociativo para cada ambiente con sus datos
                $ambiente = [
                    'Nombre' => $row['Nombre'],
                    'SerialComputador' => $row['SerialComputador'],
                    'MarcaComputador' => $row['MarcaComputador'],
                    'ModeloComputador' => $row['ModeloComputador'],
                    'CheckPc' => $row['CheckPcs'],
                    'Tvs' => $row['Tvs'],
                    'Sillas' => $row['Sillas'],
                    'Mesas' => $row['Mesas'],
                    'Tableros' => $row['Tableros'],
                    'Nineras' => $row['Nineras'],
                    'CheckInfraestructura' => $row['CheckInfraestructura'],
                    'Observaciones' => $row['Observaciones']
                ];
    
                // Agregar el ambiente al array de ambientes
                $ambientes[] = $ambiente;
            }
        }
    
        return $ambientes;
    }

    
    
    
}

?>
=======
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
include_once 'config/db.php';

class instructorModel {

    public function leerQR($qr_content) {
        $conn = Database::connect();
        $sql = "SELECT AreaTrabajo.*, 
                       t_computadores.Serial as SerialComputador, 
                       t_computadores.CheckPc as CheckPcs, 
                       t_computadores.Marca as MarcaComputador, 
                       t_computadores.Modelo as ModeloComputador
                FROM AreaTrabajo
                INNER JOIN t_computadores ON AreaTrabajo.id_area = t_computadores.id_area
                WHERE AreaTrabajo.id_area = '$qr_content'";
        
        $result = $conn->query($sql);
        
        // Verificar si la consulta SQL fue exitosa
        if (!$result) {
            die("Error en la consulta SQL: " . $conn->error);
        }
        
        $ambientes = []; // Array para almacenar los ambientes con sus respectivos computadores
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Crear un array asociativo para cada ambiente con sus datos
                $area = [
                    'nombre_area' => $row['nombre_area'],
                    'SerialComputador' => $row['SerialComputador'],
                    'MarcaComputador' => $row['MarcaComputador'],
                    'ModeloComputador' => $row['ModeloComputador'],
                    'CheckPc' => $row['CheckPcs'],
                    'capacidad' => $row['capacidad'],
                    'ubicacion' => $row['ubicacion'],
                    'responsable' => $row['responsable'],
                    'tipo_area' => $row['tipo_area'],
                    'equipo_disponible' => $row['equipo_disponible'],
                    'estado_area' => $row['estado_area'],
                    'fecha_creacion' => $row['fecha_creacion'],
                    'comentarios' => $row['comentarios'],
                ];
    
                // Agregar el ambiente al array de ambientes
                $ambientes[] = $area;
            }
        }
    
        return $ambientes;
    }

    
    
    
}
<<<<<<< HEAD

?>
=======
?>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
