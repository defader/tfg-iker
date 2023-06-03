<?php
require_once("connect.php");
	$nombre = $_POST['nombre'];
	$correo = $_POST['mail'];
	$contrasena = $_POST['contrasena'];
    $contrasena=md5($contrasena);



	$sql = $conexion->prepare("INSERT INTO usuarios (nombre,mail,contrasena) VALUES (?,?,?)");
    $sql->bind_param("sss",$nombre,$correo,$contrasena);
    $sql->execute();
    $sql->close();
  

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

?>

<?php

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'xakeadesarrollo@outlook.es';                     //SMTP username
    $mail->Password   = 'Defader69';                               //SMTP password
    $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('xakeadesarrollo@outlook.es', 'Equipo de Xakea');
    $mail->addAddress($correo);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bienvenido '.$nombre;
    $mail->Body    = 'Hola, gracias por confiar en Xakea, desde aqui te deseamos una cómoda pero intensa experiencia.';

    $mail->send();
    header("Location: iniciarSesion.html"); 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
