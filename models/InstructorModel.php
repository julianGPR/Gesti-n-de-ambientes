<?php

// instructorModel.php

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

?>
