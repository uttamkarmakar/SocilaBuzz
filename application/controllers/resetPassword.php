<?php
  require "./vendor/autoload.php";
  $validate = new Validations;
  $database = new Database;
  
//When the user updates the password.  
if (isset($_POST['update'])) {
  //Checking the updated password is valid or not.
  if ($validate->isValidPass($_POST["newpassword"])) {

    //If the new password and confirm password fields are same then update the password.
    if ($_POST["newpassword"] === $_POST["confirm_password"]) {
      $database->updateUserPassword(md5($_POST["newpassword"]), $_POST['email']);
      header("Location:/login");
    }
  } 
  else {
    $_SESSION['passMsg'] = "Please set the password in valid format at least 
    one number,alphabet,special character(At least 8 characters)";
    header("Location:/resetpassword");
  }
}
require "./application/views/resetPassword.php";
