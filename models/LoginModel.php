<?php
<<<<<<< HEAD
require_once 'config/db.php';

class LoginModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM t_usuarios WHERE Correo = ?");
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            
            return $user;
        } else {
            // Depuración
            echo "Error en la preparación de la consulta: " . $this->db->error;
            return null;
        }
    }
}
=======

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

>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
?>
