<?php

include_once 'models/LoginModel.php';

// Apartado de controlador para LOGIN------------------------------------------------------------------------
class LoginController {

    public function home() {
        include 'views/login/index.php';
    }

    public function inicioSesion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST["password"];

            $LoginModel = new LoginModel();
            $login_success = $LoginModel->ingreso($password);

            if ($login_success) {
                // Inicio de sesión exitoso, redirigir a la página de inicio
                header("Location: ../administrador");
                exit();
            } else {
                // Las credenciales son incorrectas, redirigir a la página de inicio de sesión nuevamente
                header("Location: home"); // Corregir aquí si es necesario
                exit();
            }
        }
    }
}


?>