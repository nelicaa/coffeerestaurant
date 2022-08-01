<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 1; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = '587'; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'nelica.stojadinovic1@gmail.com';
$mail->Password = 'neca3006';
$mail->setFrom('nelica.stojadinovic1@gmail.com', 'Nelica');
$mail->addAddress($email, $ime);
$mail->Subject = "Neuspeli login na sajtu coffee&restaurant";
$mail->Body ="Neko je pokusao da se uloguje na vas profil. Profil je zakljucan.";
$rez=$mail->send();

?>