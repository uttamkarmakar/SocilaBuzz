<!-- Html structure which will be load by the Ajax call -->

<?php for ($i = 0; $i < count($userPost); $i++) { ?>
  <article class="post">
    <img class="post__avatar" src="<?php echo $userPost[$i]['profile_photo']; ?>" 
    alt="/profile image" />

    <div class="post__content">
      <header class="post__header">
        <p class="post__user">
          <?php
            echo $userPost[$i]['first_name'] . " " .
            $userPost[$i]['last_name'];
          ?>
        </p>
      </header>
      <div class="post__body">
        <img class="post__img" src="<?php echo $userPost[$i]['post_image'] ?>" alt="" />
        <?php echo $userPost[$i]['post_content'] ?>
      </div>

      <script src="https://use.fontawesome.com/fe459689b4.js"></script>

    </div>
  </article>

<?php } ?>
