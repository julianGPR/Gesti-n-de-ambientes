<?php

include_once 'config/db.php';

class instructorModel{

    public function leerQR($qr_content){
        $conn = Database::connect();
        $sql = "SELECT * FROM t_ambientes WHERE id_ambiente = '$qr_content'";

        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

}
?>