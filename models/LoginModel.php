<?php
require_once 'config/db.php';

class LoginModel
{
    private $db;

    public function __construct()
    {
        // Conexión a la base de datos
        $this->db = Database::connect();
    }

    public function getUserByEmail($email)
    {
        // Consulta preparada para evitar inyección SQL
        $stmt = $this->db->prepare("SELECT * FROM t_usuarios WHERE Correo = ?");
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            // Mostrar un mensaje de error si la consulta falla
            echo "Error en la preparación de la consulta: " . $this->db->error;
            return null;
        }
    }
}
?>
