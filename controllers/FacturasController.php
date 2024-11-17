<?php

require_once 'models/FacturasModel.php';
require_once 'models/ClientesModel.php';
require_once 'models/ProductoModel.php';
require_once 'libs/tcpdf/tcpdf.php';


class FacturasController {

    public function index() {
        $facturasModel = new FacturasModel();
        $facturas = $facturasModel->obtenerFacturas();

        include 'views/administrador/facturas/index.php';
    }

    public function create() {
        $clientesModel = new ClientesModel();
        $productosModel = new ProductoModel();

        $clientes = $clientesModel->obtenerTodosLosClientes();
        $productos = $productosModel->obtenerTodosLosProductos();

        include 'views/administrador/facturas/create.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $facturasModel = new FacturasModel();
    
            // Obtener datos del formulario
            $id_cliente = $_POST['id_cliente'];
            $fecha = $_POST['fecha'];
            $productos = $_POST['productos'];
            $cantidades = $_POST['cantidades'];
            $aplicar_iva = isset($_POST['aplicar_iva']) ? true : false;
            $aplicar_descuento = isset($_POST['aplicar_descuento']) ? true : false;
            $porcentaje_descuento = isset($_POST['descuento']) ? floatval($_POST['descuento']) : 0;
    
            if (empty($productos) || count($productos) == 0) {
                header("Location: create?error=Debe agregar al menos un producto.");
                exit();
            }
    
            // Calcular subtotal, descuento, IVA y total
            $subtotal = 0;
            $detalles = [];
    
            foreach ($productos as $key => $id_producto) {
                $cantidad = intval($cantidades[$key]);
                $productoData = $facturasModel->obtenerProductoPorId($id_producto);
    
                if ($cantidad > $productoData['stock']) {
                    header("Location: create?error=La cantidad ingresada excede el stock disponible del producto.");
                    exit();
                }
    
                $precio_unitario = $productoData['precio'];
                $subtotal_producto = $precio_unitario * $cantidad;
    
                $subtotal += $subtotal_producto;
    
                $detalles[] = [
                    'id_producto' => $id_producto,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precio_unitario,
                    'subtotal' => $subtotal_producto
                ];
            }
    
            $descuento = $aplicar_descuento ? ($subtotal * ($porcentaje_descuento / 100)) : 0;
            $iva = $aplicar_iva ? ($subtotal * 0.19) : 0;
            $total = $subtotal + $iva - $descuento;
    
            // Crear factura
            $facturaId = $facturasModel->crearFactura($id_cliente, $fecha, $subtotal, $iva, $descuento, $total);
    
            // Insertar detalles de la factura
            foreach ($detalles as $detalle) {
                $facturasModel->crearDetalleFactura(
                    $facturaId, 
                    $detalle['id_producto'], 
                    $detalle['cantidad'], 
                    $detalle['precio_unitario'], 
                    $detalle['subtotal'], 
                    $descuento
                );
    
                $facturasModel->actualizarStockProducto($detalle['id_producto'], $detalle['cantidad']);
            }
    
            header("Location: index");
            exit();
        }
    }

    public function detalle($id_factura = null) {
        if (!$id_factura) {
            header("HTTP/1.0 400 Bad Request");
            echo "ID de factura no proporcionado.";
            exit();
        }

        $facturasModel = new FacturasModel();
    
        // Verificar si la factura existe
        $factura = $facturasModel->obtenerFacturaPorId($id_factura);
        $detalles = $facturasModel->obtenerDetallesPorFacturaId($id_factura);
    
        if (!$factura) {
            header("HTTP/1.0 404 Not Found");
            echo "Factura no encontrada.";
            exit();
        }
    
        include 'views/administrador/facturas/detalle.php';
    }

    public function generarPDF($id_factura = null) {
        if (!$id_factura) {
            header("HTTP/1.0 400 Bad Request");
            echo "ID de factura no proporcionado.";
            exit();
        }
    
        $facturasModel = new FacturasModel();
        
        // Obtener datos de la factura y sus detalles
        $factura = $facturasModel->obtenerFacturaPorId($id_factura);
        $detalles = $facturasModel->obtenerDetallesPorFacturaId($id_factura);
    
        if (!$factura) {
            header("HTTP/1.0 404 Not Found");
            echo "Factura no encontrada.";
            exit();
        }
    
        // Crear un nuevo PDF
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tu Empresa');
        $pdf->SetTitle('Factura #' . $factura['id']);
        $pdf->SetSubject('Detalle de Factura');
        $pdf->SetMargins(15, 15, 15);
        $pdf->AddPage();
    
        // Contenido del PDF
        $html = '
            <h2 style="text-align:center;">Factura #' . htmlspecialchars($factura['id']) . '</h2>
            <h4>Información del Cliente</h4>
            <p><strong>Nombre:</strong> ' . htmlspecialchars($factura['cliente_nombre']) . '</p>
            <p><strong>Documento/NIT:</strong> ' . htmlspecialchars($factura['documento_nit']) . '</p>
            <p><strong>Email:</strong> ' . htmlspecialchars($factura['cliente_email']) . '</p>
            <p><strong>Teléfono:</strong> ' . htmlspecialchars($factura['cliente_telefono']) . '</p>
            
            <h4>Información de la Factura</h4>
            <p><strong>Fecha:</strong> ' . htmlspecialchars($factura['fecha']) . '</p>
            <p><strong>Subtotal:</strong> ' . number_format($factura['subtotal'], 2) . ' COP</p>
            <p><strong>IVA:</strong> ' . number_format($factura['iva'], 2) . ' COP</p>
            <p><strong>Descuento:</strong> ' . number_format($factura['descuento'], 2) . ' COP</p>
            <p><strong>Total:</strong> ' . number_format($factura['total'], 2) . ' COP</p>
    
            <h4>Detalles de los Productos</h4>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($detalles as $detalle) {
            $html .= '
                    <tr>
                        <td>' . htmlspecialchars($detalle['producto_nombre']) . '</td>
                        <td>' . htmlspecialchars($detalle['cantidad']) . '</td>
                        <td>' . number_format($detalle['precio_unitario'], 2) . ' COP</td>
                        <td>' . number_format($detalle['subtotal'], 2) . ' COP</td>
                    </tr>';
        }
    
        $html .= '
                </tbody>
            </table>';
    
        // Agregar contenido al PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Salida del PDF
        $pdf->Output('Factura_' . $factura['id'] . '.pdf', 'I');
        exit();
    }
}
