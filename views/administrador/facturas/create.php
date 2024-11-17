<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear Factura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }
        .table {
            margin-top: 2rem;
        }
        .total-container {
            margin-top: 1.5rem;
        }
        .descuento-container {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Nueva Factura</h2>

        <form action="../store" method="POST">
            <!-- Datos del Cliente -->
            <div class="form-group">
                <label for="id_cliente">Cliente</label>
                <select name="id_cliente" class="form-control" required>
                    <option value="">Seleccione un cliente</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['id']; ?>">
                            <?php echo $cliente['nombre']; ?> - <?php echo $cliente['email']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Fecha de Factura -->
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <!-- Productos y Detalles -->
            <h4>Productos</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="productos-list">
                    <tr>
                        <td>
                            <select name="productos[]" class="form-control producto-select" onchange="actualizarStockDisponible(this)" required>
                                <option value="">Seleccione un producto</option>
                                <?php foreach ($productos as $producto): ?>
                                    <option value="<?php echo $producto['id_producto']; ?>" 
                                            data-stock="<?php echo $producto['stock']; ?>" 
                                            data-precio="<?php echo $producto['precio']; ?>">
                                        <?php echo $producto['nombre']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="stock-disponible">0</td>
                        <td>
                            <input type="number" name="cantidades[]" class="form-control cantidad-input" min="1" max="0" oninput="calcularSubtotal(this)" required>
                        </td>
                        <td class="precio-unitario">0.00</td>
                        <td class="subtotal">0.00</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="agregarFila()">Agregar Producto</button>

            <!-- Opciones de IVA y Descuento -->
            <div class="form-group">
                <label>
                    <input type="checkbox" id="aplicar-iva" name="aplicar_iva" onchange="actualizarTotales()"> Aplicar IVA (19%)
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" id="aplicar-descuento" name="aplicar_descuento" onchange="toggleDescuento()"> Aplicar Descuento
                </label>
            </div>
            <div class="form-group descuento-container" id="descuento-container">
                <label for="descuento">Porcentaje de Descuento (%)</label>
                <input type="number" id="descuento" name="descuento" class="form-control" value="0" oninput="actualizarTotales()" min="0" max="100">
            </div>

            <!-- Totales -->
            <div class="total-container">
                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input type="text" name="subtotal" class="form-control" id="subtotal" readonly value="0.00">
                </div>
                <div class="form-group">
                    <label for="iva">IVA</label>
                    <input type="text" name="iva" class="form-control" id="iva" readonly value="0.00">
                </div>
                <div class="form-group">
                    <label for="descuento-total">Descuento</label>
                    <input type="text" name="descuento-total" class="form-control" id="descuento-total" readonly value="0.00">
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" name="total" class="form-control" id="total" readonly value="0.00">
                </div>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-success">Guardar Factura</button>
        </form>
    </div>

    <!-- Scripts -->
    <script>
        function actualizarStockDisponible(select) {
            const stock = select.options[select.selectedIndex].getAttribute('data-stock');
            const precio = select.options[select.selectedIndex].getAttribute('data-precio');
            const fila = select.closest('tr');
            fila.querySelector('.stock-disponible').textContent = stock || 0;
            fila.querySelector('.precio-unitario').textContent = parseFloat(precio || 0).toFixed(2);
            fila.querySelector('.cantidad-input').setAttribute('max', stock || 0);
            fila.querySelector('.subtotal').textContent = parseFloat(0).toFixed(2);
            actualizarTotales();
        }

        function calcularSubtotal(input) {
            const fila = input.closest('tr');
            const cantidad = parseFloat(input.value) || 0;
            const precioUnitario = parseFloat(fila.querySelector('.precio-unitario').textContent) || 0;
            const subtotal = cantidad * precioUnitario;
            fila.querySelector('.subtotal').textContent = subtotal.toFixed(2);
            actualizarTotales();
        }

        function toggleDescuento() {
            const descuentoContainer = document.getElementById('descuento-container');
            descuentoContainer.style.display = document.getElementById('aplicar-descuento').checked ? 'block' : 'none';
            actualizarTotales();
        }

        function actualizarTotales() {
            let subtotal = 0;
            document.querySelectorAll('.subtotal').forEach(cell => {
                subtotal += parseFloat(cell.textContent) || 0;
            });

            const aplicarIva = document.getElementById('aplicar-iva').checked;
            const aplicarDescuento = document.getElementById('aplicar-descuento').checked;

            let descuento = aplicarDescuento ? (subtotal * (parseFloat(document.getElementById('descuento').value) || 0)) / 100 : 0;
            let iva = aplicarIva ? subtotal * 0.19 : 0;

            const total = subtotal + iva - descuento;

            document.getElementById('subtotal').value = subtotal.toFixed(2);
            document.getElementById('iva').value = iva.toFixed(2);
            document.getElementById('descuento-total').value = descuento.toFixed(2);
            document.getElementById('total').value = total.toFixed(2);
        }

        function agregarFila() {
            const nuevaFila = document.querySelector('#productos-list tr').cloneNode(true);
            nuevaFila.querySelectorAll('input, select').forEach(input => input.value = '');
            nuevaFila.querySelector('.stock-disponible').textContent = '0';
            nuevaFila.querySelector('.precio-unitario').textContent = parseFloat(0).toFixed(2);
            nuevaFila.querySelector('.subtotal').textContent = parseFloat(0).toFixed(2);
            document.getElementById('productos-list').appendChild(nuevaFila);
        }

        function eliminarFila(button) {
            const fila = button.closest('tr');
            fila.remove();
            actualizarTotales();
        }

        document.addEventListener('DOMContentLoaded', () => {
            actualizarTotales();
        });
    </script>
</body>
</html>
