<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer-master/src/Exception.php';
require '../vendor/PHPMailer-master/src/PHPMailer.php';
require '../vendor/PHPMailer-master/src/SMTP.php';

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {

    // Define as variáveis do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Configura o objeto PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'seu-email@gmail.com'; // Insira aqui o seu e-mail
    $mail->Password = 'sua-senha'; // Insira aqui a sua senha
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Define os destinatários
    $mail->setFrom($email, $name);
    $mail->addAddress('comercial@fetransportes.log.br', 'Site F.E. Transportes'); 
    // Define o assunto e a mensagem
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Tenta enviar o e-mail
    try {
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo 'Não foi possível enviar a mensagem. Erro: ' . $mail->ErrorInfo;
    }
}
?>