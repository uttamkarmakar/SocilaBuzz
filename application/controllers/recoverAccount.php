<?php
  require "./vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;

//If the user wants recover account.  
if (isset($_POST['recover-submit'])) {
  $database = new Database(); 
  $userData = $database->getUserInfo($_POST["email"]);
  if ($userData != NULL ) {
    $userName = $userData['last_name'];
    // $token = $userData['token'];
    $mail = new PHPMailer(true);
    //telling PHPMailer class to use the custom SMTP configuration defined.
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "uttamkarmakar400@gmail.com";
    $mail->Password = "wsodxydwyhyhahqt";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->setFrom('uttamkarmakar400@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = "mail from uttam karmakar";
    $mail->Body = "Hi,$userName. Click here to reset your password 
    <a href ='socialbuzz.com/resetpassword'>Click here</a>";
    $mail->send();
  } else {
    echo "mail sending failed";
  }
}
require "./application/views/recoverAccount.php";
