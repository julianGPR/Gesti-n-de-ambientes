<?php
include_once 'config/db.php';

class LoginModel {

    public function ingreso($password){
        $conn = Database::connect();
        $sql = "SELECT * FROM t_usuarios WHERE clave = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $password); // Corregir aquí
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Verificar la contraseña (puedes utilizar una función de hash como password_verify())
            if (password_verify($password, $row['clave'])) {
                // Inicio de sesión exitoso
                return true;
            } else {
                // Las credenciales son incorrectas
                return false;
            }
        } else {
            // El usuario no existe
            return false;
        }
    }
}



?>