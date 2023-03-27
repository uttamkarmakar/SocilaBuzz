<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/assets/css/navbarStyle.css">
</head>

<body>
  <nav class="nav-content">
    <div class="user_profile">
      <img src="<?php
                // session_start();
                echo $_SESSION['user']['photo']; ?>" alt="pic" id="pro_pic">
      <span class="user_name">
        <?php
        if (isset($_SESSION['user']['firstName']) && isset($_SESSION['user']['lastName'])) {
          echo $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'];
        }
        ?>
      </span>
    </div>
    <div class="user-box">
      <div class="user-id">
        <div class="user-name">
          <p>Explore more</p>
        </div>
        <div class="dropdown-arrow"></div>
        <div class="dropdown-menu">
          <ul>
            <li><a href="">Settings</a> </li>
            <li><a href="/profile">Update Profile</a> </li>
            <li><a href="/logout">Log Out</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</body>

</html>
