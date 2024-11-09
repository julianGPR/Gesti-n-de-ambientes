<?php
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
        <div class="tabla-ambientes tabla-scroll">
        <table class="table table-striped table-hover">
  <thead>
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
                            echo "<td>" . $row['nombre_responsable'] . "</td>"; // Muestra el nombre del responsable
                            echo "<td>" . $row['tipo_area'] . "</td>";
                            echo "<td>" . $row['equipo_disponible'] . "</td>";
                            echo "<td>" . $row['estado_area'] . "</td>";
                            echo "<td>" . $row['fecha_creacion'] . "</td>";
                            echo "<td>" . $row['comentarios'] . "</td>";
                            echo "<td>";
                            if ($row['estado_area'] !== 'Inhabilitado') {
                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAreaTrabajo/';
                                echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
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
            $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                paging: true,
                pageLength: 10
            });
        });

        function confirmarInhabilitar(id) {
            if (confirm("¿Estás seguro de que deseas inhabilitar esta área?")) {
                window.location.href = "inhabilitarAreaTrabajo/" + id;
            }
        }

        function confirmarHabilitar(id) {
            if (confirm("¿Estás seguro de que deseas habilitar esta área?")) {
                window.location.href = "habilitarAreaTrabajo/" + id;
            }
        }
    </script>

</body>

</html>
<!-- fin del contenido principal -->
<?php require_once "views/administrador/Vista/parte_inferior.php" ?> 