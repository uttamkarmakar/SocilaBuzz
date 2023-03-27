<?php
  require "./vendor/autoload.php";
  session_start();
  $validate = new Validations;
  $database = new Database;
  //Stores the posts of various users
  $userPost = $database->getPostsContent($_POST['limit']);
 
if (isset($_POST["action"])) {
  print_r($_POST["action"]);
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  $user_id = $_SESSION['user']['email'];

  switch ($action) {
    case 'like':
      $sql = "INSERT INTO rating_info(user_id,post_id,rating_action)
          VALUES ($user_id,'$post_id','like')
          ON DUPLICATE KEY UPDATE rating_action = 'like';";
      break;
    case 'dislike':
      $sql = "INSERT INTO rating_info(user_id,post_id,rating_action)
          VALUES ($user_id,$post_id,'dislike')
          ON DUPLICATE KEY UPDATE rating_action = 'like';";
      break;
    case 'unlike':
      $sql = "DELETE FROM rating_info WHERE user_id = '$user_id' AND post_id
          '$post_id';";
      break;
    case 'undislike':
      $sql = "DELETE FROM rating_info WHERE user_id = '$user_id' AND post_id
          '$post_id';";
      break;
    default:
      break;
  }
}
require "./application/views/posts.php";
