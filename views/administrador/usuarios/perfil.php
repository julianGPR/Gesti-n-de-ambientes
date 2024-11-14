<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perfil de Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #ddd;
        }
        .profile-sidebar {
            text-align: center;
            border-right: 1px solid #e9ecef;
        }
        .profile-sidebar h3 {
            font-size: 20px;
            font-weight: bold;
        }
        .profile-sidebar p {
            margin: 0;
            color: #777;
        }
        .form-section {
            padding: 20px;
        }
        .btn-save {
            background-color: #007bff;
            color: #fff;
        }
        .btn-save:hover {
            background-color: #0056b3;
        }
        .progress-bar-custom {
            height: 8px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row profile-container">
            <!-- Sidebar del perfil -->
            <div class="col-md-4 profile-sidebar">
                <?php
                if (!empty($usuario['foto_perfil'])) {
                    echo '<img src="' . $usuario['foto_perfil'] . '" alt="Foto de perfil" class="profile-img">';
                } else {
                    echo '<img src="../assets/icon-5355896_1280.png" alt="Foto de perfil" class="profile-img">';
                }
                ?>
                <h3><?php echo htmlspecialchars($usuario['Nombres'] . ' ' . $usuario['Apellidos']); ?></h3>
                <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['Correo']); ?></p>
                <p><strong>Rol:</strong> <?php echo htmlspecialchars($usuario['Rol']); ?></p>
                <p><strong>Estado:</strong> <?php echo htmlspecialchars($usuario['Estado']); ?></p>
            </div>

            <!-- Formulario de edición del perfil -->
            <div class="col-md-8 form-section">
                <h4>Editar Perfil</h4>
                <form action="/dashboard/gestion%20de%20ambientes/usuarios/actualizarPerfil" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo htmlspecialchars($usuario['Nombres']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($usuario['Apellidos']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" value="<?php echo htmlspecialchars($usuario['Correo']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="especialidad">Especialidad</label>
                        <input type="text" class="form-control" name="especialidad" id="especialidad" value="<?php echo htmlspecialchars($usuario['Especialidad']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_perfil">Foto de Perfil</label>
                        <input type="file" class="form-control-file" name="foto_perfil" id="foto_perfil">
                    </div>
                    <button type="submit" class="btn btn-save">Guardar Cambios</button>
                </form>

                <!-- Barra de progreso de ejemplo -->
                <div class="mt-5">
                    <h5>Estado del Proyecto</h5>
                    <p>Diseño Web</p>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-info progress-bar-custom" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>Desarrollo Backend</p>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-warning progress-bar-custom" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>Implementación API</p>
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-custom" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
