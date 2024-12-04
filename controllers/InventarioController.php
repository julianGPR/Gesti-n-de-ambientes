<?php
require_once 'models/InventarioModel.php';

class InventarioController {
    private $inventarioModel;

    public function __construct() {
        $this->inventarioModel = new InventarioModel();
    }

    // Listar todas las entradas para el encargado
    public function listarEntradas() {
        session_start();
        $entradas = $this->inventarioModel->obtenerEntradas();
        include 'views/encargado/listadoInventario/index.php';
    }

    // Listar todas las entradas para el administrador
    public function listarEntradasAdministrador($tipo_area = null) {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $tipo_area = $data['tipo_area'] ?? null;
        }
        $entradas = $this->inventarioModel->obtenerEntradas($tipo_area);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            echo json_encode(['entradas' => $entradas]);
            exit;
        }

        include 'views/administrador/listadoInventario/index.php';
    }

    // Crear una nueva entrada
    public function crearEntrada() {
        session_start();
        $id_usuario = $_SESSION['Id_usuario'];

        $proveedores = $this->inventarioModel->obtenerProveedores();
        $tiposDeArea = ['Tubería', 'Ensamble', 'Corte', 'Satélite'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proveedor_id = $_POST["proveedor_id"];
            $cantidad = $_POST["cantidad"];
            $precio_unitario = $_POST["precio_unitario"];
            $unidad_medida = $_POST["unidad_medida"];
            $ubicacion = $_POST["ubicacion"];
            $fecha_entrada = $_POST["fecha_entrada"];
            $observaciones = $_POST["observaciones"];
            $nombre = $_POST["nombre"];
            $tipo_area = $_POST["tipo_area"];
            $id_area = $this->inventarioModel->obtenerIdAreaPorTipo($tipo_area);

            try {
                $resultado = $this->inventarioModel->crearEntrada($id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $nombre, $id_area);

                if ($resultado) {
                    $_SESSION['mensaje'] = "Entrada de inventario creada con éxito.";
                    $_SESSION['tipo_mensaje'] = "success";
                    header("Location: ../inventario/listarEntradas");
                    exit();
                } else {
                    $_SESSION['mensaje'] = "Error al guardar la entrada de inventario.";
                    $_SESSION['tipo_mensaje'] = "danger";
                }
            } catch (Exception $e) {
                $_SESSION['mensaje'] = "Error: " . $e->getMessage();
                $_SESSION['tipo_mensaje'] = "danger";
            }
        }

        include 'views/encargado/listadoInventario/create.php';
    }

    // Editar una entrada
    public function editarEntrada($id) {
        session_start();

        $id_usuario = $_SESSION['Id_usuario'];
        $proveedores = $this->inventarioModel->obtenerProveedores();
        $tiposDeArea = ['Tubería', 'Ensamble', 'Corte', 'Satélite'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proveedor_id = $_POST['proveedor_id'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];
            $unidad_medida = $_POST['unidad_medida'];
            $ubicacion = $_POST['ubicacion'];
            $fecha_entrada = $_POST['fecha_entrada'];
            $observaciones = $_POST['observaciones'];
            $nombre = $_POST['nombre'];
            $tipo_area = $_POST['tipo_area'];
            $id_area = $this->inventarioModel->obtenerIdAreaPorTipo($tipo_area);

            try {
                $resultado = $this->inventarioModel->actualizarEntrada($id, $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $nombre, $id_area);

                if ($resultado) {
                    $_SESSION['mensaje'] = "Entrada de inventario actualizada con éxito.";
                    $_SESSION['tipo_mensaje'] = "success";
                    header("Location: ../listarEntradas");
                    exit();
                } else {
                    $_SESSION['mensaje'] = "Error al actualizar la entrada de inventario.";
                    $_SESSION['tipo_mensaje'] = "danger";
                }
            } catch (Exception $e) {
                $_SESSION['mensaje'] = "Error: " . $e->getMessage();
                $_SESSION['tipo_mensaje'] = "danger";
            }
        }

        $entrada = $this->inventarioModel->obtenerEntradaPorId($id);
        include 'views/encargado/listadoInventario/update.php';
    }

    // Eliminar una entrada
    public function eliminarEntrada($id) {
        session_start();
        try {
            $resultado = $this->inventarioModel->eliminarEntrada($id);
            if ($resultado) {
                $_SESSION['mensaje'] = "Entrada eliminada con éxito.";
                $_SESSION['tipo_mensaje'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al eliminar la entrada.";
                $_SESSION['tipo_mensaje'] = "danger";
            }
        } catch (Exception $e) {
            $_SESSION['mensaje'] = "Error: " . $e->getMessage();
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: /inventario");
        exit();
    }
}
