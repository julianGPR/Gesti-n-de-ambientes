<?php

require_once 'models/FacturasModel.php';
require_once 'models/ClientesModel.php';
require_once 'models/ProductoModel.php';
require_once 'libs/tcpdf/tcpdf.php';

class FacturasController {

    public function index() {
        session_start();
        $facturasModel = new FacturasModel();
        $facturas = $facturasModel->obtenerFacturas();

        include 'views/administrador/facturas/index.php';
    }

    public function create() {
        session_start();
        $clientesModel = new ClientesModel();
        $productosModel = new ProductoModel();

        $clientes = $clientesModel->obtenerTodosLosClientes();
        $productos = $productosModel->obtenerTodosLosProductos();

        include 'views/administrador/facturas/create.php';
    }

    public function store() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $facturasModel = new FacturasModel();
    
            $id_cliente = $_POST['id_cliente'];
            $fecha = $_POST['fecha'];
            $productos = $_POST['productos'];
            $cantidades = $_POST['cantidades'];
            $aplicar_iva = isset($_POST['aplicar_iva']) ? true : false;
            $aplicar_descuento = isset($_POST['aplicar_descuento']) ? true : false;
            $porcentaje_descuento = isset($_POST['descuento']) ? floatval($_POST['descuento']) : 0;
    
            if (empty($productos) || count($productos) == 0) {
                $_SESSION['mensaje'] = "Debe agregar al menos un producto.";
                $_SESSION['tipo_mensaje'] = "warning";
                header("Location: create");
                exit();
            }
    
            $subtotal = 0;
            $detalles = [];
    
            foreach ($productos as $key => $id_producto) {
                $cantidad = intval($cantidades[$key]);
                $productoData = $facturasModel->obtenerProductoPorId($id_producto);
    
                if ($cantidad > $productoData['stock']) {
                    $_SESSION['mensaje'] = "La cantidad ingresada excede el stock disponible del producto.";
                    $_SESSION['tipo_mensaje'] = "danger";
                    header("Location: create");
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
    
            $facturaId = $facturasModel->crearFactura($id_cliente, $fecha, $subtotal, $iva, $descuento, $total);
    
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
    
            $_SESSION['mensaje'] = "Factura creada con éxito.";
            $_SESSION['tipo_mensaje'] = "success";
            header("Location: index");
            exit();
        }
    }

    public function detalle($id_factura = null) {
        session_start();

        if (!$id_factura) {
            $_SESSION['mensaje'] = "ID de factura no proporcionado.";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: index");
            exit();
        }

        $facturasModel = new FacturasModel();
        $factura = $facturasModel->obtenerFacturaPorId($id_factura);
        $detalles = $facturasModel->obtenerDetallesPorFacturaId($id_factura);

        if (!$factura) {
            $_SESSION['mensaje'] = "Factura no encontrada.";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: index");
            exit();
        }

        include 'views/administrador/facturas/detalle.php';
    }

    public function generarPDF($id_factura = null) {
        session_start();

        if (!$id_factura) {
            $_SESSION['mensaje'] = "ID de factura no proporcionado.";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: index");
            exit();
        }

        $facturasModel = new FacturasModel();
        $factura = $facturasModel->obtenerFacturaPorId($id_factura);
        $detalles = $facturasModel->obtenerDetallesPorFacturaId($id_factura);

        if (!$factura) {
            $_SESSION['mensaje'] = "Factura no encontrada.";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: index");
            exit();
        }

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Gafra');
        $pdf->SetTitle('Factura #' . $factura['id']);
        $pdf->SetSubject('Detalle de Factura');
        $pdf->SetMargins(15, 15, 15);
        $pdf->AddPage();

        $html = '...'; // Contenido del PDF

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('Factura_' . $factura['id'] . '.pdf', 'I');
        exit();
    }
}
?>
