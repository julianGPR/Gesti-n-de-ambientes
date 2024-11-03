<?php

include_once 'models/AdminModel.php';

// Apartado de controlador para LOGIN------------------------------------------------------------------------
class AdminController {
    public function home() {
        include 'views/administrador/index.php';
    }
    
// Apartado de controlador para Ambientes------------------------------------------------------------------------

    public function areaTrabajo() {
        include 'views/administrador/ambientes/index.php';
    }


    public function createAreaTrabajo() {
        $adminModel = new AdminModel();
<<<<<<< HEAD
        $result = $adminModel->modificarAmbiente($id, $nombre, $torre, $computadores, $checkPcs, $tvs, $checkTvs, $sillas, $checkSillas, $mesas, $checkMesas, $tableros, $checkTableros, $nineras, $checkNineras, $checkInfraestructura, $estado, $observaciones);

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

// Método para mostrar la lista de usuarios
public function usuarios() {
    include 'views/administrador/usuarios/index.php';
}

// Método para crear un nuevo usuario
public function createUsuario() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $rol = $_POST["rol"];
=======
        $usuarios = $adminModel->obtenerUsuarios();
>>>>>>> actu_encargado
        
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

            $result = $adminModel->guardarAreaTrabajo($nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios);

            if ($result) {
                // Generar código QR y redirigir
                $contenido_qr = "Nombre del Área: $nombre_area\nCapacidad: $capacidad\nUbicación: $ubicacion\nResponsable: $responsable\nTipo de Área: $tipo_area\nEstado: $estado_area\nComentarios: $comentarios";
                $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr) . '&rand=' . uniqid();
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
<<<<<<< HEAD
        $result = $adminModel->guardarUsuario($nombres, $apellidos, $clave, $correo, $rol);
=======
        $result = $adminModel->inhabilitarAreaTrabajo($id);
>>>>>>> actu_encargado

        if ($result) {
            echo "<script>alert('Area inhabilitada exitosamente');</script>";
        } else {
            echo "<script>alert('Error al inhabilitar el area');</script>";
        }
        
        header("Location: ../areaTrabajo");
        exit();
    }
<<<<<<< HEAD
}

// Método para actualizar un usuario existente
public function updateUsuario($id) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $clave = $_POST["clave"];
        $correo = $_POST["correo"];
        $rol = $_POST["rol"];
=======
>>>>>>> actu_encargado

    public function habilitarAreaTrabajo($id) {
        $adminModel = new AdminModel();
<<<<<<< HEAD
        $result = $adminModel->modificarUsuario($id, $nombres, $apellidos, $clave, $correo, $rol);
=======
        $result = $adminModel->habilitarAreaTrabajo($id);
>>>>>>> actu_encargado

        if ($result) {
            echo "<script>alert('Area habilitada exitosamente');</script>";
        } else {
            echo "<script>alert('Error al habilitar el area');</script>";
        }
        
        header("Location: ../areaTrabajo");
        exit();
    }
<<<<<<< HEAD
}
public function inhabilitarUsuario($id) {
    $adminModel = new AdminModel();
    $result = $adminModel->inhabilitarUsuario($id);

    if ($result) {
        echo "<script>alert('Usuario inhabilitado exitosamente');</script>";
    } else {
        echo "<script>alert('Error al inhabilitar el usuario');</script>";
    }
    
    header("Location: ../usuarios");
    exit();
}

public function habilitarUsuario($id) {
    $adminModel = new AdminModel();
    $result = $adminModel->habilitarUsuario($id);

    if ($result) {
        echo "<script>alert('Usuario habilitado exitosamente');</script>";
    } else {
        echo "<script>alert('Error al habilitar el usuario');</script>";
    }
    
    header("Location: ../usuarios");
    exit();
}
// Apartado de controlador para REPORTES------------------------------------------------------------------------


    public function reportes() {
        include 'views/administrador/reportes/index.php';
=======
    // Apartado de controlador para COMPUTADORES------------------------------------------------------------------------

    public function computadores(){
        require 'views/administrador/computadores/index.php';
>>>>>>> actu_encargado
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
}



?>