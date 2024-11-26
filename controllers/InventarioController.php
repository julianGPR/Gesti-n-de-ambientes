<?php
require_once 'models/InventarioModel.php';

class InventarioController {
    private $inventarioModel;

    public function __construct() {
        $this->inventarioModel = new InventarioModel();
    }

    // Listar todas las entradas para el encargado
    public function listarEntradas() {
        $entradas = $this->inventarioModel->obtenerEntradas();
        include 'views/encargado/listadoInventario/index.php';
    }

    // Listar todas las entradas para el administrador, con filtro opcional de tipo de área
    public function listarEntradasAdministrador($tipo_area = null) {
        // Si la solicitud es POST, intentamos obtener el tipo de área desde los datos enviados por AJAX
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $tipo_area = $data['tipo_area'] ?? null;
        }
    
        // Obtener las entradas de inventario filtradas por tipo de área (si se proporciona)
        $entradas = $this->inventarioModel->obtenerEntradas($tipo_area);
    
        // Si es una solicitud AJAX, respondemos en formato JSON
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            echo json_encode(['entradas' => $entradas]);
            exit; // Terminamos la ejecución para no cargar la vista HTML
        }
    
        // Para solicitudes normales, cargamos la vista
        include 'views/administrador/listadoInventario/index.php';
    }
    

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
            
            // Obtener el id_area basado en el tipo de área
            $id_area = $this->inventarioModel->obtenerIdAreaPorTipo($tipo_area);
    
            try {
                $resultado = $this->inventarioModel->crearEntrada(
                    $id_usuario, 
                    $proveedor_id, 
                    $cantidad, 
                    $precio_unitario, 
                    $unidad_medida, 
                    $ubicacion, 
                    $fecha_entrada, 
                    $observaciones, 
                    $nombre, 
                    $id_area // Pasar el id del área
                );
    
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
        
        if (!isset($_SESSION['Id_usuario'])) {
            echo "Error: Usuario no autenticado.";
            exit();
        }
        
        $id_usuario = $_SESSION['Id_usuario'];
        $proveedores = $this->inventarioModel->obtenerProveedores();
        
        // Definir los tipos de área manualmente o desde la base de datos (según tu estructura de base de datos)
        $tiposDeArea = ['Tubería', 'Ensamble', 'Corte', 'Satélite'];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los valores del formulario
            $proveedor_id = $_POST['proveedor_id'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];
            $unidad_medida = $_POST['unidad_medida'];
            $ubicacion = $_POST['ubicacion'];
            $fecha_entrada = $_POST['fecha_entrada'];
            $observaciones = $_POST['observaciones'];
            $nombre = $_POST['nombre'];
            $tipo_area = $_POST['tipo_area']; // Valor seleccionado de tipo de área
    
            // Obtener el id_area basado en el tipo de área
            $id_area = $this->inventarioModel->obtenerIdAreaPorTipo($tipo_area);
    
            // Actualizar la entrada en el modelo
            try {
                $resultado = $this->inventarioModel->actualizarEntrada(
                    $id, 
                    $id_usuario, 
                    $proveedor_id, 
                    $cantidad, 
                    $precio_unitario, 
                    $unidad_medida, 
                    $ubicacion, 
                    $fecha_entrada, 
                    $observaciones, 
                    $nombre, 
                    $id_area // Pasar el id del área
                );
    
                if ($resultado) {
                    header("Location: ../listarEntradas");
                    exit();
                } else {
                    echo "Error al actualizar la entrada de inventario.";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Obtener la entrada de inventario actual para editar
            $entrada = $this->inventarioModel->obtenerEntradaPorId($id);
    
            // Incluir la vista de edición
            include 'views/encargado/listadoInventario/update.php';
        }
    }
    
    
    
    
    // Eliminar una entrada
    public function eliminarEntrada($id) {
        $this->inventarioModel->eliminarEntrada($id);
        header("Location: /inventario");
    }

    // Método para actualizar el área de trabajo (para el administrador)
    public function updateAreaTrabajo($id) {
        $adminModel = new AdminModel();
        $usuarios = $adminModel->obtenerUsuarios(); // Obtenemos la lista de usuarios para el campo "responsable"
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Procesar el formulario de actualización
            $nombre_area = $_POST["nombre_area"];
            $capacidad = $_POST["capacidad"];
            $ubicacion = $_POST["ubicacion"];
            $responsable = $_POST["responsable"];
            $tipo_area = $_POST["tipo_area"];
            $equipo_disponible = $_POST["equipo_disponible"];
            $estado_area = $_POST["estado_area"];
            $comentarios = $_POST["comentarios"];
            
    
            $result = $adminModel->modificarAreaTrabajo($id, $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios);
    
            if ($result) {
                echo "<script>
                        alert('Editado con éxito');
                        window.location.href = '/gafra/admin/areaTrabajo';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Error al actualizar el área de trabajo');
                        window.history.back();
                      </script>";
                exit();
            }
        } else {
            // Cargar los datos del área de trabajo y los usuarios
            $areaTrabajo = $adminModel->obtenerAreaTrabajoPorId($id);
            include 'views/administrador/ambientes/update.php';
        }
    }
    
}
