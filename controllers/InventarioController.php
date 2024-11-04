<?php
require_once 'models/InventarioModel.php';

class InventarioController {
    private $inventarioModel;

    public function __construct() {
        $this->inventarioModel = new InventarioModel();
    }

    // Listar todas las entradas
    public function listarEntradas() {
        $entradas = $this->inventarioModel->obtenerEntradas();
        include 'views/encargado/listadoInventario/index.php';
    }

    // Mostrar formulario para crear una entrada
    public function crearEntrada() {
        session_start();
        $id_usuario = $_SESSION['Id_usuario'];
        
        // Obtener la lista de proveedores
        $proveedores = $this->inventarioModel->obtenerProveedores();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proveedor_id = $_POST["proveedor_id"];
            $cantidad = $_POST["cantidad"];
            $precio_unitario = $_POST["precio_unitario"];
            $unidad_medida = $_POST["unidad_medida"];
            $ubicacion = $_POST["ubicacion"];
            $fecha_entrada = $_POST["fecha_entrada"];
            $observaciones = $_POST["observaciones"];
    
            try {
                $resultado = $this->inventarioModel->crearEntrada($id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones);
    
                if ($resultado) {
                    header("Location: ../inventario/listarEntradas");
                    exit();
                } else {
                    echo "Error al guardar la entrada de inventario.";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            include 'views/encargado/listadoInventario/create.php';
        }
    }

    // Mostrar formulario para editar una entrada
    public function editarEntrada($id) {
        session_start();
    
        // Verificar que el usuario está autenticado
        if (!isset($_SESSION['Id_usuario'])) {
            echo "Error: Usuario no autenticado.";
            exit();
        }
    
        $id_usuario = $_SESSION['Id_usuario']; // ID del usuario actual en sesión
        $proveedores = $this->inventarioModel->obtenerProveedores();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturar datos del formulario
            $proveedor_id = $_POST['proveedor_id'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];
            $unidad_medida = $_POST['unidad_medida'];
            $ubicacion = $_POST['ubicacion'];
            $fecha_entrada = $_POST['fecha_entrada'];
            $observaciones = $_POST['observaciones'];
    
            // Actualizar la entrada en el inventario y registrar al responsable actual
            $resultado = $this->inventarioModel->actualizarEntrada($id, $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones);
    
            // Verifica el resultado de la actualización
            if ($resultado) {
                // Redirigir a la vista principal de inventario si se guardaron los cambios
                header("Location: ../listarEntradas");
                exit();
            } else {
                echo "Error al actualizar la entrada de inventario.";
            }
        } else {
            // Cargar los datos de la entrada y pasar a la vista
            $entrada = $this->inventarioModel->obtenerEntradaPorId($id);
            include 'views/encargado/listadoInventario/update.php';
        }
    }

    // Eliminar una entrada
    public function eliminarEntrada($id) {
        $this->inventarioModel->eliminarEntrada($id);
        header("Location: /inventario");
    }
}
?>
