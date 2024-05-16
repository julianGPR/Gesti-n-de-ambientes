<?php

include_once 'models/AdminModel.php';

// Apartado de controlador para LOGIN------------------------------------------------------------------------
class AdminController {
    public function home() {
        include 'views/administrador/index.php';
    }
    
// Apartado de controlador para Ambientes------------------------------------------------------------------------

    public function ambientes() {
        include 'views/administrador/ambientes/index.php';
    }

    public function createAmbiente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $torre = $_POST["torre"];
            $computadores = $_POST["computadores"];
            $checkPcs = isset($_POST["checkPcs"]) ? 1 : 0;
            $tvs = $_POST["tvs"];
            $checkTvs = isset($_POST["checkTvs"]) ? 1 : 0;
            $sillas = $_POST["sillas"];
            $checkSillas = isset($_POST["checkSillas"]) ? 1 : 0;
            $mesas = $_POST["mesas"];
            $checkMesas = isset($_POST["checkMesas"]) ? 1 : 0;
            $tableros = $_POST["tableros"];
            $checkTableros = isset($_POST["checkTableros"]) ? 1 : 0;
            $nineras = $_POST["nineras"];
            $checkNineras = isset($_POST["checkNineras"]) ? 1 : 0;
            $checkInfraestructura = isset($_POST["checkInfraestructura"]) ? 1 : 0;
            $estado = 1; // Por defecto se crea activo
            $observaciones = $_POST["observaciones"];

            $adminModel = new AdminModel();
            $result = $adminModel->guardarAmbiente($nombre, $torre, $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, $observaciones);

            if ($result) {
                // Lógica para generar el contenido del QR
                $contenido_qr = "Nombre: $nombre\nTorre: $torre\nComputadores: $computadores\nTVs: $tvs\nSillas: $sillas\nMesas: $mesas\nTableros: $tableros\nNineras: $nineras\nInfraestructura: $checkInfraestructura\nObservaciones: $observaciones";

                // Lógica para generar el código QR
                $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr) .'&rand=' . uniqid();

                header("Location: ../ambientes");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el ambiente");
                exit();
            }
        } else {
            include 'views/administrador/ambientes/create.php';
        }
    }

    public function updateAmbiente($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $torre = $_POST["torre"];
            $computadores = $_POST["computadores"];
            $checkPcs = isset($_POST["checkPcs"]) ? 1 : 0;
            $tvs = $_POST["tvs"];
            $checkTvs = isset($_POST["checkTvs"]) ? 1 : 0;
            $sillas = $_POST["sillas"];
            $checkSillas = isset($_POST["checkSillas"]) ? 1 : 0;
            $mesas = $_POST["mesas"];
            $checkMesas = isset($_POST["checkMesas"]) ? 1 : 0;
            $tableros = $_POST["tableros"];
            $checkTableros = isset($_POST["checkTableros"]) ? 1 : 0;
            $nineras = $_POST["nineras"];
            $checkNineras = isset($_POST["checkNineras"]) ? 1 : 0;
            $checkInfraestructura = isset($_POST["checkInfraestructura"]) ? 1 : 0;
            $estado = $_POST["estado"];
            $observaciones = $_POST["observaciones"];

            $adminModel = new AdminModel();
            $result = $adminModel->modificarComputador($id, $nombre, $torre, $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, $observaciones);

            if ($result) {
                header("Location: ../ambientes");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el ambiente&id=$id");
                exit();
            }
        } else {
            $adminModel = new AdminModel();
            $ambiente = $adminModel->obtenerAmbientePorId($id);
            include 'views/administrador/ambientes/update.php';
        }
    }

    public function inhabilitarAmbiente($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->inhabilitarAmbiente($id);

        if ($result) {
            echo "<script>alert('Ambiente inhabilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al inhabilitar el ambiente');</script>";
        }
        
        header("Location: ../ambientes");
        exit();
    }

    public function habilitarAmbiente($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->habilitarAmbiente($id);
    
        if ($result) {
            echo "<script>alert('Ambiente habilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al habilitar el ambiente');</script>";
        }
        
        header("Location: ../ambientes");
        exit();
    }
// Apartado de controlador para COMPUTADORES------------------------------------------------------------------------

    public function computadores(){
        require 'views/administrador/computadores/index.php';
    }
    public function createComputador() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = $_POST["tipo"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $serial = $_POST["serial"];
            $placaInventario = $_POST["placaInventario"];
            $id_ambiente = $_POST["id_ambiente"];
            $checkPc = isset($_POST["checkPc"]) ? 1 : 0;
            $hardware = isset($_POST["hardware"]) ? 1 : 0;
            $software = isset($_POST["software"]) ? 1 : 0;
            $observaciones = $_POST["observaciones"];

            $adminModel = new AdminModel();
            $result = $adminModel->guardarComputador($tipo, $marca, $modelo, $serial, $placaInventario, $id_ambiente, $checkPc, $hardware, $software, $observaciones);

            if ($result) {
                header("Location: ../computadores");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el computador");
                exit();
            }
        } else {
            include 'views/administrador/computadores/create.php';
        }
    }

    public function updateComputador($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = $_POST["tipo"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $serial = $_POST["serial"];
            $placaInventario = $_POST["placaInventario"];
            $id_ambiente = $_POST["Id_ambiente"];
            $checkPc = isset($_POST["checkPc"]) ? 1 : 0;
            $hardware = isset($_POST["hardware"]) ? 1 : 0;
            $software = isset($_POST["software"]) ? 1 : 0;
            $observaciones = $_POST["observaciones"];

            $adminModel = new AdminModel();
            $result = $adminModel->modificarComputador($id, $tipo, $marca, $modelo, $serial, $placaInventario, $id_ambiente, $checkPc, $hardware, $software, $observaciones);

            if ($result) {
                header("Location: ../computadores");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el computador&id=$id");
                exit();
            }
        } else {
            $adminModel = new AdminModel();
            $computador = $adminModel->obtenerComputadorPorId($id);
            include 'views/administrador/computadores/update.php';
        }
    }

// Apartado de controlador para USUARIOS------------------------------------------------------------------------

    public function usuarios() {
        include 'views/administrador/usuarios/index.php';
    }

    public function createUsuario(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo = $_POST["correo"];
            $pin = $_POST["pin"];
            $rol = $_POST["Rol"];

            $adminModel = new AdminModel();
            $result = $adminModel->guardarUsuario($nombres, $apellidos, $correo, $pin, $rol);

            if ($result) {
                header("Location: ../usuarios");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el usuario");
                exit();
            }
        } else {
            include 'views/administrador/usuarios/create.php';
        }

    }

    public function updateUsuario($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo = $_POST["correo"];
            $pin = $_POST["pin"];
            $rol = $_POST["Rol"];
    
            $adminModel = new AdminModel();
            $result = $adminModel->modificarUsuario($id, $nombres, $apellidos, $correo, $pin, $rol);
    
            if ($result) {
                header("Location: ../usuarios");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el usuario&id=$id");
                exit();
            }
        } else {
            $adminModel = new AdminModel();
            $usuario = $adminModel->obtenerUsuarioPorId($id);
            include 'views/administrador/usuarios/update.php';
        }
    }
// Apartado de controlador para REPORTES------------------------------------------------------------------------


    public function reportes() {
        include 'views/administrador/reportes/index.php';
    }

    public function generateQR($id) {
        $id_ambiente = $id;

        $contenido_qr = $id_ambiente;

        $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr);

        // Muestra el QR en la página
        echo "<img src='" . $qrCodeAPIURL . "' alt='QR Code'>";

    }


    public function enviarInforme() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["observacion"])) {
            // Obtener los datos del formulario
            $observacion = $_POST["observacion"];
            $id_usuario = $_SESSION["id_usuario"]; // Obtener el ID del usuario de la sesión
            $id_ambiente = $_POST["id_ambiente"]; // Obtener el ID del ambiente del formulario
    
            // Llamar al método para agregar el informe en el modelo
            $this->agregarReporte($observacion, $id_usuario, $id_ambiente);
            // Redirigir al instructor a alguna página
            header("Location: ../home");
            exit();
        } else {
            // Manejar el caso en que no se haya enviado un formulario POST
            echo "Error: Método de solicitud incorrecto.";
        }
    }
    
    public function agregarReporte($observacion, $id_usuario, $id_ambiente) {
        $adminModel = new AdminModel();
        $result = $adminModel->insertarReporte($observacion, $id_usuario, $id_ambiente);
        if ($result) {
            // Redireccionar de vuelta a la página de reportes del instructor
            header("Location: ../reportes");
            exit();
        } else {
            // Manejar el caso en que ocurra un error al agregar el reporte
            echo "<script>alert('Error al agregar el reporte');</script>";
            exit();
        }
    }

}



?>