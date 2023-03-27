<?php
  require "./vendor/autoload.php";
  $database = new Database;
  $validate = new Validations;
  session_start();
  $updatedPhotoPath = "";

//In case a existing user wnats to change some information.  
if (isset($_POST["updateChanges"])) {

  //If new profile picture is set from the user side.
  if (isset($_FILES["changedPhoto"]["name"])) {
    //Checks new filled data is valid or not.
    if (
      $validate->isValidName($_POST["firstName"], $_POST["lastName"])
      && $validate->isValidProPic($_FILES["changedPhoto"]["name"],
      $_FILES["changedPhoto"]["type"], $_FILES["changedPhoto"]["size"]) 
      && $validate->isValidGender($_POST["gender"])  
    ) {
      //updated path of the profile picture.
      $updatedPhotoPath = "public/assets/img/postImages/" . $_FILES["changedPhoto"]["name"];
      move_uploaded_file($_FILES["changedPhoto"]["tmp_name"], $updatedPhotoPath);

      //Updates the user information in the database.
      $database->updateUserInfo($_POST["firstName"], $_POST["lastName"], 
      $_POST["gender"], $_SESSION["user"]["email"], $updatedPhotoPath, $_POST["bio"]);
      
      //Fetches the new updated user information from the database.
      $userData = $database->getUserInfo($_SESSION["user"]["email"]);
      $_SESSION["user"]["photo"]     = $userData["profile_photo"];
      $_SESSION["user"]["firstName"] = $userData["first_name"];
      $_SESSION["user"]["lastName"]  = $userData["last_name"];
      $_SESSION["user"]["email"]     = $userData["email"];
      $_SESSION["user"]["bio"]       = $userData["bio"];
    }
  }
  //In case user just wants to modify some personal details except the picture.
  else {
    if ($validate->isValidName($_POST["firstName"], $_POST["lastName"]) 
      && $validate->isValidGender($_POST["gender"])) {
      $database->updateUserInfo($_POST["firstName"], $_POST["lastName"], 
      $_POST["gender"], $_SESSION["user"]["email"], $_SESSION["user"]["photo"], $_POST["bio"]);

      $userData = $database->getUserInfo($_SESSION["user"]["email"]);
      $_SESSION["user"]["photo"]     = $userData["profile_photo"];
      $_SESSION["user"]["firstName"] = $userData["first_name"];
      $_SESSION["user"]["lastName"]  = $userData["last_name"];
      $_SESSION["user"]["email"]     = $userData["email"];
      $_SESSION["user"]["bio"]       = $userData["bio"];
    }
  }
}
require "./application/views/updateProfile.php";
