<?php
  require "./vendor/autoload.php";
  $validate = new Validations;
  $database = new Database;
  $photoPath = "";
  // session_start();

//If the user registers to the website check the data given by the user valid or not.
  
if (isset($_POST['register-btn'])) {

  if (!$validate->isValidName($_POST['firstName'], $_POST['lastName'])) {
    $_SESSION["nameErr"] = $validate->nameErr;
  }

  if (!$validate->isValidEmail($_POST['email'])) {
    $_SESSION["emailIdErr"] = $validate->emailErr;
  }

  if ($validate->isValidProPic(
    $_FILES['image']['name'],
    $_FILES['image']['type'],
    $_FILES['image']['size']
  )) {
    $photoPath = "public/assets/img/" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $photoPath);
  }
  if (!$validate->isValidProPic(
    $_FILES['image']['name'],
    $_FILES['image']['type'],
    $_FILES['image']['size']
  )) {
    $_SESSION['profilePhotoErr'] = $validate->uploadedFileErr;
  }

  if (!$validate->isValidPass($_POST['password'])) {
    $_SESSION["passwdErr"] = $validate->passwordErr;
  }
  if ($database->isExists($_POST["email"], md5($_POST["password"]))) {
    $_SESSION["emailIdErr"] = "User Email is already registered";
  }
  if ($database->checkEmail($_POST["email"])) {
    $_SESSION["emailIdErr"] = "User Email is already registered";
  } else {

    $database->registration(
      $_POST['firstName'],
      $_POST['lastName'],
      $_POST['radio'],
      $_POST['email'],
      $photoPath,
      $_POST['bio'],
      md5($_POST['password'])
    );
  }
}
require_once "./application/views/signUp.php";
