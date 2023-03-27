<?php
  require "./vendor/autoload.php";
  session_start();
  $validate = new Validations;
  $database = new Database;

//If the user wants to post some contents in the website's home page.
if (isset($_POST['user_post'])) {

  //Stores the path of the posted images
  $photoPath = "public/assets/img/postImages/" . $_FILES['post_image']['name'];
  move_uploaded_file($_FILES['post_image']['tmp_name'], $photoPath);
  //Stores the text and the image content in the database.
  $database->userPosts(htmlspecialchars($_POST['post_content'],ENT_QUOTES), $photoPath, $_SESSION['user']['email']);
  header('location: /home');
}

require_once "./application/views/home.php";
