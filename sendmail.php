<?php

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$availability = $_POST['availability'];
$schooling = $_POST['schooling'];
$experience = $_POST['experience'];
$classes = $_POST['classes'];
$citiesWork = $_POST['citiesWork'];
$assunto = "Inscrição Jedis Academy";

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;

$mail->SMTPOptions = array(
  'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
  )
);

try {
  $mail->Host = 'smtp.jedisacademy.com.br';
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->Username = 'site@jedisacademy.com.br';
  $mail->Password = '123@Mudar';

  $mail->setFrom('site@jedisacademy.com.br');
  $mail->addReplyTo('site@jedisacademy.com.br');
  $mail->Subject = $assunto;

  $mail->addAddress('contato@jedis.com.br', $assunto);

  $body .= "<h2>Inscrição Jedis Academy</h2>";
  $body .= "<strong>Nome:</strong> $name <br/><br/>";
  $body .= "<strong>E-mail:</strong> $email <br/><br/>";
  $body .= "<strong>Idade:</strong> $age <br/><br/>";
  $body .= "<strong>Telefone:</strong> $phone <br/><br/>";
  $body .= "<strong>Cidade e Estado:</strong> $city <br/><br/>";
  $body .= "<strong>Possui disponibilidade para se dedicar ao curso?</strong> $availability <br/><br/>";
  $body .= "<strong>Nível de escolaridade:</strong> $schooling <br/><br/>";
  $body .= "<strong>Qual experiência em desenvolvimento?</strong> $experience <br/><br/>";
  $body .= "<strong>Qual turma vai se cadastrar?</strong> $classes <br/><br/>";
  $body .= "<strong>Quais cidades você tem disponibilidade para trabalhar?</strong> $citiesWork <br/><br/>";
  $body .= "<br>";
  $body .= "----------------------------";
  $body .= "<br>";
  $body .= "Enviado em <strong>" . date("h:m:i d/m/Y") . " por " . $_SERVER['REMOTE_ADDR'] . "</strong>";
  $body .= "<br>";
  $body .= "----------------------------";

  $mail->msgHTML($body);
  $mail->CharSet = 'UTF-8';
  $mail->send();

  $mail->ClearAllRecipients();

  $body2 .= "<h2>Boas vindas à Jedis Academy</h2>";
  $body2 .= "Prepare-se para um mundo novo! <strong>#jedisacademy</strong><br/><br/><br/><br/>";
  $body2 .= "<strong>Endereço:</strong><br/><br/>";
  $body2 .= "Av. Afonso Pena, 100 - Funcionários<br/>";
  $body2 .= "Belo Horizonte - MG, 30130-008<br/><br/>";
  $body2 .= "<strong>Telefone::</strong><br/><br/>";
  $body2 .= "(31) 3254-9921<br/><br/><br/>";
  $body2 .= "<a href='mailto:contato@jedisacademy.com.br' target='_blank'>contato@jedisacademy.com.br</a><br/>";
  $body2 .= "<a href='https://www.linkedin.com/company/jedis/' target='_blank' rel='noopener noreferrer'>/company/jedisacademy</a><br/>";
  $body2 .= "<a href='https://www.instagram.com/_jedisacademy/' target='_blank' rel='noopener noreferrer'>_jedisacademy</a><br/>";

  $mail->addAddress($email, 'Boas vindas à Jedis Academy');
  $mail->msgHTML($body2);
  $mail->CharSet = 'UTF-8';
  $mail->send();
  
  echo "Mensagem enviada com sucesso";
} catch (Exception $e) {
  echo "Mailer Error: " . $mail->ErrorInfo;
}


