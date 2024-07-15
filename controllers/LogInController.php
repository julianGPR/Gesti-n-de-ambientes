<?php
require_once 'models/LoginModel.php';

class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function home() {
        require_once 'views/login/index.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['login'];
            $password = $_POST['password'];

            $user = $this->loginModel->getUserByEmail($email);

            // Verificación temporal de contraseña en texto plano
            if ($user && $password === $user['Clave']) {
                // Iniciar sesión y redirigir según el rol
                session_start();
                $_SESSION['user'] = $user;

                switch ($user['Rol']) {
                    case 'Administrador':
                        header("Location: /dashboard/gestion%20de%20ambientes/admin/home");
                        exit();
                    case 'Instructor':
                        header("Location: /dashboard/gestion%20de%20ambientes/instructor/home");
                        exit();
                    case 'Encargado':
                        header("Location: /dashboard/gestion%20de%20ambientes/encargado/home");
                        exit();
                    default:
                        header("Location: /dashboard/gestion%20de%20ambientes/login");
                        exit();
                }
                
            } else {
                echo "Correo o clave incorrecta";
            }
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Método no permitido.";
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        // Headers para deshabilitar la caché
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        header("Location: /dashboard/gestion%20de%20ambientes/login"); // Redirigir al inicio de sesión después de cerrar sesión
        exit();
    }
}
?>
