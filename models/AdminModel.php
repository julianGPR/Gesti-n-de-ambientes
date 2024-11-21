

<?php
include_once 'config/db.php';

class AdminModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }
    // Guardar una nueva área de trabajo
    public function guardarAreaTrabajo($nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios) {
        $conn = Database::connect();
        $sql = "INSERT INTO AreaTrabajo (nombre_area, capacidad, ubicacion, responsable, tipo_area, equipo_disponible, estado_area, fecha_creacion, comentarios) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisssssss", $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios);
        return $stmt->execute();
    }

    // Actualizar un área de trabajo existente
    public function modificarAreaTrabajo($id, $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios) {
        $conn = Database::connect();
        $sql = "UPDATE AreaTrabajo SET nombre_area=?, capacidad=?, ubicacion=?, responsable=?, tipo_area=?, equipo_disponible=?, estado_area=?, comentarios=? WHERE id_area=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sissssssi", $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios, $id);
        return $stmt->execute();
    }

    // Obtener un área de trabajo por su ID
    public function obtenerAreaTrabajoPorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM AreaTrabajo WHERE id_area=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Obtener usuarios para seleccionar como responsable
    public function obtenerUsuarios() {
        $conn = Database::connect();
        $sql = "SELECT Id_usuario, Nombres FROM t_usuarios";
        $result = $conn->query($sql);
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    // Obtener tipos de área disponibles
    public function obtenerTiposDeArea() {
        $conn = Database::connect();
        $sql = "SELECT DISTINCT tipo_area FROM AreaTrabajo";
        $result = $conn->query($sql);
        $tiposDeArea = [];
        while ($row = $result->fetch_assoc()) {
            $tiposDeArea[] = $row['tipo_area'];
        }
        return $tiposDeArea;
    }
    public function inhabilitarAreaTrabajo($id) {
        $conn = Database::connect();
        $sql = "UPDATE AreaTrabajo SET estado_area = 'Inhabilitado' WHERE Id_area='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function habilitarAreaTrabajo($id) {
        $conn = Database::connect();
        $sql = "UPDATE AreaTrabajo SET estado_area = 'Habilitado' WHERE Id_area='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function obtenerNumeroTotalFacturas() {
        $sql = "SELECT COUNT(*) AS total_facturas FROM facturas";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total_facturas'] ?? 0;
    }
    

    public function obtenerFacturacionTotal() {
        $sql = "SELECT SUM(total) AS facturacion_total FROM facturas";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['facturacion_total'] ?? 0;
    }

    public function obtenerFacturacionPromedioPorCliente() {
        $sql = "
            SELECT c.nombre AS nombre_cliente, AVG(f.total) AS facturacion_promedio 
            FROM facturas f
            JOIN clientes c ON f.id_cliente = c.id
            GROUP BY c.id, c.nombre
        ";
        $result = $this->conn->query($sql);
        $clientes = [];
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row; // Incluye nombre del cliente y promedio
        }
        return $clientes;
    }
    
    

    public function obtenerNumeroFacturasPorCliente() {
        $sql = "SELECT id_cliente, COUNT(*) AS numero_facturas FROM facturas GROUP BY id_cliente";
        $result = $this->conn->query($sql);
        $clientes = [];
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
        return $clientes;
    }

    public function obtenerFacturacionPorMes() {
        $sql = "SELECT DATE_FORMAT(fecha, '%Y-%m') AS mes, SUM(total) AS facturacion FROM facturas GROUP BY mes";
        $result = $this->conn->query($sql);
        $facturacion = [];
        while ($row = $result->fetch_assoc()) {
            $facturacion[] = $row;
        }
        return $facturacion;
    }
    
    public function obtenerProductosVendidos() {
        $sql = "
            SELECT p.nombre AS nombre_producto, SUM(df.cantidad) AS cantidad_vendida
            FROM detalles_factura df
            JOIN productos p ON df.id_producto = p.id_producto
            GROUP BY p.nombre
            ORDER BY cantidad_vendida DESC
            LIMIT 5
        ";
        $result = $this->conn->query($sql);
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }
    public function obtenerVentasTotalesPorProducto() {
        $sql = "
            SELECT p.nombre AS producto, SUM(df.subtotal) AS ventas_totales
            FROM detalles_factura df
            JOIN productos p ON df.id_producto = p.id_producto
            GROUP BY p.nombre
            ORDER BY ventas_totales DESC
            LIMIT 5
        ";
        $result = $this->conn->query($sql);
    
        $ventas = [];
        while ($row = $result->fetch_assoc()) {
            $ventas[] = $row;
        }
        return $ventas;
    }
    public function obtenerFacturasPorMes() {
        $sql = "SELECT DATE_FORMAT(fecha, '%Y-%m') AS mes, COUNT(*) AS cantidad, SUM(total) AS total_ventas
                FROM facturas
                GROUP BY mes
                ORDER BY mes";
        $result = $this->conn->query($sql);
        $facturasPorMes = [];
        while ($row = $result->fetch_assoc()) {
            $facturasPorMes[] = $row; // Incluye mes, cantidad y total_ventas
        }
        return $facturasPorMes;
    }
    

}

?>
