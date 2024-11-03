<?php
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
?>
