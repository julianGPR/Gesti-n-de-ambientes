<?php
require("Conexion/conexion.php");
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Preparar y ejecutar la consulta SQL
    $stmt = $conexion->prepare("SELECT Clave FROM t_usuarios WHERE Correo = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($clave);
            $stmt->fetch();

            // Enviar correo con PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor de correo
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Especifica el servidor SMTP principal
                $mail->SMTPAuth = true;
                $mail->Username = 'wasaavedra87@misena.edu.co';  // Tu correo
                $mail->Password = 'SENA123/';  // Tu contraseña
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Remitente y destinatarios
                $mail->setFrom('wasaavedra87@misena.edu.co', 'Tu Nombre');
                $mail->addAddress($email);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Su Clave de Usuario';
                $mail->Body    = "Su clave es: " . $clave;
                $mail->AltBody = "Su clave es: " . $clave;

                $mail->send();
                $response['success'] = true;
                $response['message'] = 'La clave ha sido enviada a su correo electrónico.';
            } catch (Exception $e) {
                $response['message'] = "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        } else {
            $response['message'] = "El correo electrónico no existe en la base de datos.";
        }

        $stmt->close();
    } else {
        $response['message'] = "Error en la preparación de la consulta: " . $conexion->error;
    }
} else {
    $response['message'] = "Solicitud no válida";
}

$conexion->close();

echo json_encode($response);
?>
