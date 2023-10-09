<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//https://www.hostinger.com/tutorials/send-emails-using-php-mail#How_to_Use_PHPMailer_to_Send_Emails

require 'vendor/autoload.php'; // Asegúrate de incluir el archivo de autoload de PHPMailer

class EmailSender {
    private $to;
    private $subject;
    private $message;

    public function __construct($to, $subject, $message) {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function sendEmail() {
        $mail = new PHPMailer(true);

        try {
            // Configurar el servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Configura el servidor SMTP que deseas usar
            $mail->SMTPAuth = true;
            $mail->Username = 'your_username'; // Tu nombre de usuario SMTP
            $mail->Password = 'your_password'; // Tu contraseña SMTP
            $mail->SMTPSecure = 'tls'; // TLS o SSL según corresponda
            $mail->Port = 587; // Puerto SMTP

            // Configurar el remitente y el destinatario
            $mail->setFrom('your_email@example.com', 'Your Name'); // Tu dirección de correo y nombre
            $mail->addAddress($this->to); // Dirección de correo del destinatario

            // Configurar el asunto y el contenido del correo
            $mail->Subject = $this->subject;
            $mail->isHTML(true); // Habilitar contenido HTML
            $mail->Body = $this->message;

            // Enviar el correo electrónico
            $mail->send();

            return true; // El correo se envió con éxito
        } catch (Exception $e) {
            return false; // Hubo un error en el envío del correo
        }
    }
}

// Uso de la clase EmailSender
$css = "<style>@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;700&display=swap');
body { font-family: 'Oswald', 'sans-serif'; }</style>";

$message = $css . "
<html>
<head>
    <title>Lanyards for you</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
</head>
<body>
<div class='background' style='position: relative; width: 100%; background: rgb(245,245,245); padding: 2vw 0;'>
<div class='background2' style='width: 70%; overflow-x: hidden; min-width: 300px; margin: 0 auto; position: relative; background: white; margin-top: 4vw; margin-bottom: 4vw;'>

  <div class='header' style='position: relative; background: rgb(63,152,237); background: linear-gradient(90deg, rgba(63,152,237,0.9) 0%, rgba(69,79,177,0.9) 53%, rgba(69,79,177,0.9) 75%, rgb(196, 56, 149) 100%);'>
    <img  alt='Imagen' style='display: block; width: 40%; margin-left: 2vw;' src='https://lanyardsforyou.com/Pages/General/Menu/Logo.png'>
  </div>

  <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(2.0vw + 1.0em);'>
    <h1 style='font-family: Oswald, sans-serif; font-size: calc(1.2vw + 0.8em); position: relative; margin: 0 auto; letter-spacing: 0px; color: #664A99; text-align: center;'>HELLO AND WELCOME TO LANYARDS FOR YOU</h1>
    <h2 style='font-family: Oswald, sans-serif; font-weight: 300; font-size: calc(1.1vw + 0.7em); position: relative; margin: 0 auto; letter-spacing: 0px; color: #664A99; text-align: center; margin-top: calc(0.2vw + 0.2em);'>We're glad to have you here</h2>
  </div>

  <div class='imgEmail' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(0.8vw + 0.8em);'>
    <img style='position: relative; width: 100%;' alt='' src='https://lanyardsforyou.com/Pages/Index/Slider/Slide2.png'>
  </div>

  <div class='titleContainer' style='position: relative; width: 85%; margin: 0 auto; margin-top: calc(1.4vw + 0.4em);'>
    <h3 style='font-family: Oswald, sans-serif; font-weight: 500; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px; color: black; text-align: center;'>We welcome you to our community</h3>
    <h4 style='font-family: Oswald, sans-serif; font-weight: 200; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px; color: black; text-align: center; width: 60%;'>Please make a note of your account info to access:</h4>

    <h4 style='font-family: Oswald, sans-serif; font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px; color: black; text-align: center; margin-top: calc(0.3vw + 0.3em);'>username: XXXXX</h4>
    <h4 style='font-family: Oswald, sans-serif; font-weight: 400; font-size: calc(0.9vw + 0.5em); position: relative; margin: 0 auto; letter-spacing: 0px; color: black; text-align: center; margin-top: calc(0.2vw + 0.2em);'>password: XXXXX </h4>

    <h3 style='font-family: Oswald, sans-serif; font-weight: 300; font-size: calc(1vw + 0.6em); position: relative; margin: 0 auto; letter-spacing: 0px; color: black; text-align: center; margin-top: calc(0.4vw + 0.4em);'>lanyardsforyou</h3>
  </div>

  <div class='footer' style='position: relative; background: #555FA8; width: 100%; margin-top: calc(1.8vw + 0.8em); height: calc(7.8vw + 5.9em);'>
    <img alt='Imagen' style='display: block; width: calc(4.8vw + 2.9em); position: absolute; top: 1vw; left: 1vw; padding: 1vw 0; margin: 0 auto;' src='https://lanyardsforyou.com/Pages/General/Menu/Logo.png'>
  </div>

    </div>
</div>
</body>
</html>";

// Uso de la clase EmailSender
$email = new EmailSender('recipient@example.com', 'Subject of the Email', $message);
if ($email->sendEmail()) {
    echo 'Email sent successfully!';
} else {
    echo 'Email sending failed.';
}
?>
