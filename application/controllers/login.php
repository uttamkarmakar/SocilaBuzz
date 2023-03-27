<?php

 require "./vendor/autoload.php";
 $database = new Database();
 
 //When the user hits the login button.
 if (isset($_POST['login-btn'])) {

   //Checking whether the email id is alreadt registered in the database or not.
   if ( $database->isExists($_POST['email'], md5($_POST['password'])) ) {
    
     //Fetches the existing user data and stores in the $userData variable.
     $userData = $database->getUserInfo($_POST['email']);
     session_start();
     //Stores the user data in session variables to use the data in various pages.
     $_SESSION['user']['photo']     = $userData['profile_photo'];
     $_SESSION['user']['firstName'] = $userData['first_name'];
     $_SESSION['user']['lastName']  = $userData['last_name'];
     $_SESSION['user']['gender']    = $userData['gender'];
     $_SESSION['user']['email']     = $userData['email'];
     $_SESSION['user']['bio']       = $userData['bio'];
     header("Location: /home");
   }

   else {
     $_SESSION['loginErr'] = "Please give the correct credentials";
   }
 }
 require "./application/views/login.php";   
?> 
