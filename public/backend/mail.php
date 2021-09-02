<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ob_start();

include '../../config/config.php';

$email = $_POST["email"];


#sget User Selection
$setUser = $mysqli->query("SELECT * FROM tb_user WHERE email='$email'");
$getUser = $setUser->num_rows;

$myuser = $setUser->fetch_object();

if($getUser==1){

  $data = 'Untuk mengubah Password anda, Silakan <a href="localhost/LechyProject/public/asset/password/new_password.php?id='.$myuser->id_user.'">Klik Disini untuk mengubah password</a>';

  // Load Composer's autoloader
  require 'vendor/autoload.php';

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "selvyerhita@gmail.com";                     // SMTP username
    $mail->Password   = "lftjgjaztewziagi";                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('selvyerhita@gmail.com', 'Admin');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo('selvyerhita@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Verify Mail';
    $mail->Body    = $data;
    $mail->AltBody = '';

    $mail->send();

    header("Location:../forget_password.php?alert=3");
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
