<?php

session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'exemplo@gmail.com';
  $mail->Password = 'minha_senha';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  $mail->setFrom('exemplo@gmail.com', 'José');
  $mail->addAddress('exemplo@gmail.com', 'Chico');

  $mail->isHTML(true);
  $mail->Subject = 'Here is the subject';
  $mail->Body = "De: {$nome}<br>Email: {$email}<br>Mensagem: {$mensagem}";
  $mail->AltBody = "De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}";

  $mail->send();
  $_SESSION["success"] = "Mensagem enviada com sucesso!";
  header("Location: index.php");
} catch (Exception $e) {
  $_SESSION["danger"] = "Mensagem não enviada. Erro: " . $mail->ErrorInfo;
  header("Location: contato.php");
}