<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    $usuarioOlvida = $_POST['correo'];
    $caracteres = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','%','$');
    $contrasenaRecuperada="";
    

    for ($i=0; $i < 8 ; $i++) { 
        $aleatorio=rand(0,36);
        $contrasenaRecuperada=$contrasenaRecuperada.$caracteres[$aleatorio];
    }
    $contrasenaRecuperadaENC = md5($contrasenaRecuperada);

require_once("connect.php");
	$sql = $conexion->prepare("UPDATE usuarios SET contrasena='$contrasenaRecuperadaENC' WHERE mail='$usuarioOlvida'");
    $sql->execute();
    $sql->close();



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
    $mail->addAddress($usuarioOlvida);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Restaurar credenciales';
    $mail->Body    = 'Hola, aqui tienes las credenciales actualizadas, por favor no conteste a este correo. '."<br>".$contrasenaRecuperada;

    $mail->send();
    header("Location: iniciarSesion.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
