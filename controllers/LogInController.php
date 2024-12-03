<?php
require_once 'models/LoginModel.php';

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function home()
    {
        require_once 'views/login/index.php';
    }

    public function login()
    {
        if (!isset($_SESSION)) {
            session_start(); // Asegúrate de iniciar la sesión si no ha sido iniciada
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['login'];
            $password = $_POST['password'];

            // Obtener usuario por correo electrónico
            $user = $this->loginModel->getUserByEmail($email);

            // Validar las credenciales
            if ($user && password_verify($password, $user['Clave'])) { 
                $_SESSION['user'] = $user;
                $_SESSION['Id_usuario'] = $user['Id_usuario'];

                // Redirigir según el rol del usuario
                switch ($user['Rol']) {
                    case 'Administrador':
                        header("Location: /gafra/admin/home");
                        exit();
                    case 'Encargado':
                        header("Location: /gafra/encargado/home");
                        exit();
                    default:
                        $_SESSION['error_message'] = "Rol no válido.";
                        header("Location: /gafra/login");
                        exit();
                }
            } else {
                $_SESSION['error_message'] = "La contraseña o correo son incorrectos. Inténtalo de nuevo.";
                header("Location: /gafra/login");
                exit();
            }
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Método no permitido.";
        }
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Limpiar la sesión
        session_unset();
        session_destroy();

        // Prevenir el caché
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Redirigir al inicio de sesión
        header("Location: /gafra/login");
        exit();
    }
}
?>
