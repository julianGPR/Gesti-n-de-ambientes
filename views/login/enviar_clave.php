<?php
$to = 'fltovar9@misena.edu.co';
$subject = 'Prueba de correo';
$message = 'Este es un mensaje de prueba.';
$headers = "From: tovarfredy1928@gmail.com\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado con éxito.";
} else {
    echo "Hubo un error al enviar el correo electrónico.";
}
?>
