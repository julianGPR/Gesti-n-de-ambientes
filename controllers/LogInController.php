<?php

include_once 'models/LogInModel.php';

class LogInController {

    public function inicio() {
        include 'view';
    }

    public function InicioSesion(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(empty($_POST["pin"])) {
                echo "Los campos están vacíos";
                return;
            } else {
            
                $pin = $_POST["pin"];
                $LogInModel = new LogInModel();
                $result = $LogInModel->iniciarSesion($pin);

                if($result) {
                    $usuario = $result;
                    $nombre = $usuario['Nombres'];
                    $apellido = $usuario['Apellidos'];
        
                    session_start();
                    $_SESSION["Nombres"] = $nombre;
                    $_SESSION["Apellidos"] = $apellido;
        
                    header("location: /dashboard/gestion%20de%20ambientes/instructor/home/");
                    exit;
                    
                } else {
                    echo "Los datos son incorrectos";
                }
            }

        }
    }
}
?>
