<?php

include_once 'config/db.php';

class LogInModel {

    public function iniciarSesion($pin){

        $conn = Database::connect();
        $sql = "SELECT * FROM t_usuario WHERE Clave = $pin";
        
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }
}

?>
