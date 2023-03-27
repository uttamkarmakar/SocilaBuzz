<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
  </script>
  <script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="../../public/assets/css/homeStyle.css">
</head>

<body>
  <?php require_once "navbar.php" ?>
  <section class="create-post">
    <img class="create-post__avatar" src="
    <?php
    //  session_start();  
     echo $_SESSION['user']['photo'] ?>" 
     alt="myphoto" />
    <form id="create-post-form" class="create-post__form" action="/home" 
    method="post" enctype="multipart/form-data">
      <div class="create-post__text-wrap">
        <textarea aria-label="Write something about you..." id="create-post-txt"
         oninput="this.parentNode.dataset.replicatedValue = this.value" placeholder="Hey <?php echo $_SESSION['user']['firstName'] . " Write something about you..." ?>" name="post_content"></textarea>
      </div>

      <div class="create-post__media-wrap" id="create-post-media-wrap"></div>

      <div class="create-post__buttons">
        <div class="create-post__assets-buttons">
          <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
            <img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/camera-tumblr.svg" alt="" />
            Photo
            <input type="file" name="post_image" id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
            <img src="#" alt="" id="imagePreview">
          </button>
        </div>
        <button class="post-btn" type="submit" id="post" name="user_post">POST</button>
      </div>
    </form>
  </section >

<section id="main-container"> 
  
   </section>
  <div class="button-container">
    <button id="div1">Load more</button>
  </div>
  <script src="../../public/assets/js/homeScript.js"></script>
  <script src="../../public/assets/js/ajax.js"></script>
  </script>
</body>

</html>
