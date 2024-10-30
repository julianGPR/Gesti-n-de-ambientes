<?php

include_once 'models/AdminModel.php';

<<<<<<< HEAD
// Apartado de controlador para LOGIN------------------------------------------------------------------------
class AdminController {
=======
<<<<<<< HEAD
// Apartado de controlador para LOGIN------------------------------------------------------------------------
class AdminController {
=======
class AdminController {

>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    public function home() {
        include 'views/administrador/index.php';
    }
    
<<<<<<< HEAD
// Apartado de controlador para Ambientes------------------------------------------------------------------------
=======
<<<<<<< HEAD
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
            echo json_encode(["success" => true]);
            header("Location: ../ambientes");
            exit();
        } else {
            echo json_encode(["success" => false]);
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
        $observaciones = $_POST["observaciones"];

        $adminModel = new AdminModel();
        $result = $adminModel->modificarAmbiente($id, $nombre, $torre, $observaciones);

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
        $nuevoIdAmbiente = isset($_POST["id_ambiente"]) ? $_POST["id_ambiente"] : null; // Corregido para manejar el caso en que id_ambiente no esté definido
        $checkPc = isset($_POST["checkPc"]) ? 1 : 0;
        $hardware = isset($_POST["hardware"]) ? 1 : 0;
        $software = isset($_POST["software"]) ? 1 : 0;
        $observaciones = isset($_POST["observaciones"]) ? $_POST["observaciones"] : ''; // Corregido para manejar el caso en que observaciones no esté definido

        $adminModel = new AdminModel();
        $result = $adminModel->modificarComputador($id, $tipo, $marca, $modelo, $serial, $placaInventario, $nuevoIdAmbiente, $checkPc, $hardware, $software, $observaciones);

        if ($result) {
            // Redirigir a la lista de computadores si la actualización fue exitosa
            header("Location: ../computadores");
            exit();
        } else {
            // Manejar el caso en que ocurra un error al actualizar el computador
            header("Location: index.php?error=Error al actualizar el computador&id=$id");
            exit();
        }
    } else {
        // Obtener los datos del computador existente
        $adminModel = new AdminModel();
        $computador = $adminModel->obtenerComputadorPorId($id);

        if ($computador) {
            // Obtener los datos del ambiente asociado al computador
            $idAmbiente = $computador['Id_ambiente'];
    
            // Obtener los datos del ambiente
            $ambiente = $adminModel->obtenerAmbientePorId($idAmbiente);
    
            // Renderizar el formulario de actualización con los datos del computador y del ambiente
            include 'views/administrador/computadores/update.php';
        } else {
            // Manejar el caso en que el computador no existe
            echo "Error: El computador especificado no existe.";
        }
    }
}
// Apartado de controlador para USUARIOS------------------------------------------------------------------------



// Apartado de controlador para REPORTES------------------------------------------------------------------------


    public function reportes() {
        include 'views/administrador/reportes/index.php';
=======
    public function ambientes() {
        include 'views/administrador/ambientes/index.php';
    }
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

public function areaTrabajo() {
    include 'views/administrador/ambientes/index.php';
}


public function createAreaTrabajo() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_area = $_POST["nombre_area"];
        $capacidad = $_POST["capacidad"];
        $ubicacion = $_POST["ubicacion"];
        $responsable = $_POST["responsable"];
        $tipo_area = $_POST["tipo_area"];
        $equipo_disponible = $_POST["equipo_disponible"];
        $estado_area = $_POST["estado_area"];
        $fecha_creacion = $_POST["fecha_creacion"];
        $comentarios = $_POST["comentarios"];

        $adminModel = new AdminModel();
        $result = $adminModel->guardarAreaTrabajo($nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios);

        if ($result) {
            // Generar el contenido del QR
            $contenido_qr = "Nombre del Área: $nombre_area\nCapacidad: $capacidad\nUbicación: $ubicacion\nResponsable: $responsable\nTipo de Área: $tipo_area\nEstado: $estado_area\nComentarios: $comentarios";
            
            // Generar el código QR
            $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr) .'&rand=' . uniqid();
            echo json_encode(["success" => true]);
            header("Location: ../areaTrabajo");
            exit();
        } else {
            echo json_encode(["success" => false]);
            header("Location: index.php?error=Error al crear el área de trabajo");
            exit();
        }
    } else {
        include 'views/administrador/ambientes/create.php';
    }
}


public function updateAreaTrabajo($id) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_area = $_POST["nombre_area"];
        $capacidad = $_POST["capacidad"];
        $ubicacion = $_POST["ubicacion"];
        $responsable = $_POST["responsable"];
        $tipo_area = $_POST["tipo_area"];
        $equipo_disponible = $_POST["equipo_disponible"];
        $estado_area = $_POST["estado_area"];
        $comentarios = $_POST["comentarios"];

        $adminModel = new AdminModel();
        $result = $adminModel->modificarAreaTrabajo($id, $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios);

        if ($result) {
            // Reemplazamos la URL por la ruta completa de redirección
            echo "
                <script>
                    alert('Editado con éxito');
                    window.location.href = '/dashboard/gestion%20de%20ambientes/admin/areaTrabajo';
                </script>
            ";
            exit();
        } else {
            // Mostrar una alerta de error y volver a la página anterior
            echo "
                <script>
                    alert('Error al actualizar el área de trabajo');
                    window.history.back();
                </script>
            ";
            exit();
        }
    } else {
        $adminModel = new AdminModel();
        $areaTrabajo = $adminModel->obtenerAreaTrabajoPorId($id);
        include 'views/administrador/ambientes/update.php';
    }
}

public function inhabilitarAreaTrabajo($id) {
    $adminModel = new AdminModel();
    $result = $adminModel->inhabilitarAreaTrabajo($id);

    if ($result) {
        echo "<script>alert('Area inhabilitada exitosamente');</script>";
    } else {
        echo "<script>alert('Error al inhabilitar el area');</script>";
    }
    
    header("Location: ../areaTrabajo");
    exit();
}

public function habilitarAreaTrabajo($id) {
    $adminModel = new AdminModel();
    $result = $adminModel->habilitarAreaTrabajo($id);

    if ($result) {
        echo "<script>alert('Area habilitada exitosamente');</script>";
    } else {
        echo "<script>alert('Error al habilitar el area');</script>";
    }
    
    header("Location: ../areaTrabajo");
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
        $nuevoIdAmbiente = isset($_POST["id_ambiente"]) ? $_POST["id_ambiente"] : null; // Corregido para manejar el caso en que id_ambiente no esté definido
        $checkPc = isset($_POST["checkPc"]) ? 1 : 0;
        $hardware = isset($_POST["hardware"]) ? 1 : 0;
        $software = isset($_POST["software"]) ? 1 : 0;
        $observaciones = isset($_POST["observaciones"]) ? $_POST["observaciones"] : ''; // Corregido para manejar el caso en que observaciones no esté definido

        $adminModel = new AdminModel();
        $result = $adminModel->modificarComputador($id, $tipo, $marca, $modelo, $serial, $placaInventario, $nuevoIdAmbiente, $checkPc, $hardware, $software, $observaciones);

        if ($result) {
            // Redirigir a la lista de computadores si la actualización fue exitosa
            header("Location: ../computadores");
            exit();
        } else {
            // Manejar el caso en que ocurra un error al actualizar el computador
            header("Location: index.php?error=Error al actualizar el computador&id=$id");
            exit();
        }
    } else {
        // Obtener los datos del computador existente
        $adminModel = new AdminModel();
        $computador = $adminModel->obtenerComputadorPorId($id);

        if ($computador) {
            // Obtener los datos del ambiente asociado al computador
            $idAmbiente = $computador['Id_ambiente'];
    
            // Obtener los datos del ambiente
            $ambiente = $adminModel->obtenerAreaTrabajoPorId($idAmbiente);
    
            // Renderizar el formulario de actualización con los datos del computador y del ambiente
            include 'views/administrador/computadores/update.php';
        } else {
            // Manejar el caso en que el computador no existe
            echo "Error: El computador especificado no existe.";
        }
    }
}
// Apartado de controlador para USUARIOS------------------------------------------------------------------------



// Apartado de controlador para REPORTES------------------------------------------------------------------------


    public function reportes() {
<<<<<<< HEAD
        include 'views/administrador/reportes/index.php';
=======
        // Lógica para manejar el apartado de reportes
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    }

    public function generateQR($id) {
        $id_area = $id;

        $contenido_qr = $id_area;

        $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr);

        // Muestra el QR en la página
        echo "<img src='" . $qrCodeAPIURL . "' alt='QR Code'>";

    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06


    public function enviarInforme() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["observacion"])) {
            // Obtener los datos del formulario
            $observacion = $_POST["observacion"];
            $id_usuario = $_SESSION["id_usuario"]; // Obtener el ID del usuario de la sesión
<<<<<<< HEAD
            $id_area = $_POST["id_area"]; // Obtener el ID del ambiente del formulario
    
            // Llamar al método para agregar el informe en el modelo
            $this->agregarReporte($observacion, $id_usuario, $id_area);
=======
            $id_ambiente = $_POST["id_ambiente"]; // Obtener el ID del ambiente del formulario
    
            // Llamar al método para agregar el informe en el modelo
            $this->agregarReporte($observacion, $id_usuario, $id_ambiente);
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
            // Redirigir al instructor a alguna página
            header("Location: ../home");
            exit();
        } else {
            // Manejar el caso en que no se haya enviado un formulario POST
            echo "Error: Método de solicitud incorrecto.";
        }
    }
    
<<<<<<< HEAD
    public function agregarReporte($observacion, $id_usuario, $id_area) {
        $adminModel = new AdminModel();
        $result = $adminModel->insertarReporte($observacion, $id_usuario, $id_area);
=======
    public function agregarReporte($observacion, $id_usuario, $id_ambiente) {
        $adminModel = new AdminModel();
        $result = $adminModel->insertarReporte($observacion, $id_usuario, $id_ambiente);
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
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



<<<<<<< HEAD
?>
=======
?>
=======
}
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
