<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/Exception.php';
require_once __DIR__ . '/PHPMailer.php';
require_once __DIR__ . '/SMTP.php';

//Settings para el envio del email
$SMTP_SERVER="smtp.gmail.com";
$SMTP_USER="some@gmail.com";
$SMTP_PASSWORD="some";

//Inputs a recibir
$nombre = $_POST['name'];

$mail = new PHPMailer(true);

//Mensaje dentro del email
$msg = "¡HOLA! mi nombre es {$nombre}";

try {
  $mail->SMTPDebug = 2;
  $mail->isSMTP();
  $mail->Host = $SMTP_SERVER;                           // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication TRUE
  $mail->Username = $SMTP_USER;                         // SMTP username
  $mail->Password = $SMTP_PASSWORD;                     // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted ssl:465  tls:587
  $mail->Port = 587;                                    
  $mail->setFrom('elqueenvia@example.com', 'enviador');          //quien lo envia? 
  $mail->addAddress('some@gmail.com', 'nahueldev'); // A quien le llega?
  $mail->Subject = 'Asunto del correo';
  $mail->Body = 'Cuerpo del correo';

  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = "Formulario web mi empresa - " . $name; //Titulo el email que ve el receptor cuando le llega desde su bandeja.
  $mail->Body = $msg;
  $mail->AltBody = 'MiEmpresa';                      

  $mail->send();
  echo 'Correo enviado exitosamente';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}


