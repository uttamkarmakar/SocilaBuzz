<?php
  $url = parse_url($_SERVER["REQUEST_URI"])["path"];
  $url = rtrim($url);
  // var_dump ($_SERVER);
  
  switch($url) {
    case '/':
      require_once "application/controllers/login.php";
      break; 
    case '/login':
      require_once "application/controllers/login.php";
      break;
    case '/signup':
      require_once "application/controllers/signUp.php";
      break;
    case '/landingpage':
      require_once "application/controllers/landingPage.php";
      break;
    case '/logout' :
      require_once "application/controllers/login.php";
      break;
    case '/home' :
      require_once "application/controllers/home.php";
      break;
    case '/profile' :
      require_once "application/controllers/updateProfile.php";
      break;
    case '/recoveraccount' :
      require_once "application/controllers/recoverAccount.php";
      break;
    case '/resetpassword' :
      require_once "application/controllers/resetPassword.php";
      break;
    case '/posts' :
      require_once "application/controllers/posts.php";
      break;
    default:
      require_once "application/controllers/error.php";
  }
  
?>

