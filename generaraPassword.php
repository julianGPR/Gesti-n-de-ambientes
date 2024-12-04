<?php
// Archivo temporal para generar contraseñas encriptadas

$claveNueva = "nuevaClave123"; // Nueva contraseña
$hashedPassword = password_hash($claveNueva, PASSWORD_BCRYPT);

echo "Contraseña encriptada: " . $hashedPassword;
?>
