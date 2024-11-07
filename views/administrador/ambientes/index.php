<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
?>
<?php require_once "views/administrador/Vista/parte_superior.php" ?> 
<!-- nicio del contenido principal -->
    <div class="container">
        <h1>Gestion de Inventarios Gafra</h1>
    </div>
    </div>
        <div class="filtro-y-crear">
            <div class="crear-area">
                <?php
                $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAreaTrabajo/';
                ?>
                <ul>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nueva area de trabajo</a></li>
                </ul>
            </div>
        </div>
       <div class="tabla-ambientes tabla-scroll" style="max-width: 950px; overflow-x: auto; margin: 0 auto;">
    <table class="table table-striped table-hover table-bordered" style="width: 100%;">
  <thead class="table-dark">
    <tr> 
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Responsable</th>
      <th scope="col">Tipo de Area</th>
      <th scope="col">Equipo disponible</th>
      <th scope="col">Estado area</th>
      <th scope="col">Fecha de creacion</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Accion</th>                                                                                                                                                  
    </tr>
  </thead>
  <tbody>
  <?php
                    $query = "SELECT * FROM AreaTrabajo";

                    if (!empty($filtros)) {
                        $query .= " WHERE " . implode(" AND ", $filtros);
                    }

                    $result = $db->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_area'] . "</td>";
                            echo "<td>" . $row['nombre_area'] . "</td>";
                            echo "<td>" . $row['capacidad'] . "</td>";
                            echo "<td>" . $row['ubicacion'] . "</td>";
                            echo "<td>" . $row['responsable'] . "</td>";
                            echo "<td>" . $row['tipo_area'] . "</td>";
                            echo "<td>" . $row['equipo_disponible'] . "</td>";
                            echo "<td>" . $row['estado_area'] . "</td>";
                            echo "<td>" . $row['fecha_creacion'] . "</td>";
                            echo "<td>" . $row['comentarios'] . "</td>";
                            echo "<td>";
                            if ($row['estado_area'] !== 'Inhabilitado') {
                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAreaTrabajo/';
                                echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";

                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
                                echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-generar-qr' boton-accion ><img src='../assets/qr-code.svg'></a>";
                            } else {
                                echo "<a href='#' onclick='confirmarHabilitar(" . $row['id_area'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
                            }
                            if ($row['estado_area'] !== 'Inhabilitado') {
                                echo "<a href='#' onclick='confirmarInhabilitar(" . $row['id_area'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No hay registros</td></tr>";
                    }

                    $db->close();
                    ?>
  </tbody>
</table>
    
    </section>
    <script>
        $(document).ready(function() {
            var table = $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                paging: true,
                pageLength: 10
            });

            // Escuchar eventos de clic en los botones de mostrar/ocultar columnas
            $('button.toggle-vis').on('click', function(e) {
                e.preventDefault();

                // Obtener el índice de la columna desde el atributo data-column del botón
                var columnIdx = $(this).attr('data-column');

                // Alternar la visibilidad de la columna
                table.column(columnIdx).visible(!table.column(columnIdx).visible());
            });
        });
    </script>
    <script>
        function confirmarInhabilitar(id) {
            if (confirm("¿Estás seguro de que deseas inhabilitar esta area?")) {
                window.location.href = "inhabilitarAreaTrabajo/" + id;
            }
        }

        function confirmarHabilitar(id) {
            if (confirm("¿Estás seguro de que deseas habilitar este area?")) {
                window.location.href = "habilitarAreaTrabajo/" + id;
            }
        }
    </script>

</body>

</html>
<!-- fin del contenido principal -->
<?php require_once "views/administrador/Vista/parte_inferior.php" ?> 