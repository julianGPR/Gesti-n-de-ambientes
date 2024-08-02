<?php

// instructorModel.php

include_once 'config/db.php';

class encargadoModel {

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
