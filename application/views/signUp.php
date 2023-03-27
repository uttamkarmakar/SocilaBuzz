<!-- Html for signup page -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/assets/css/signupStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <div class="register-page">
    <div class="form">
      <form class="login-form " action="/signup" method="POST" enctype="multipart/form-data">
        <h2>CREATE ACCOUNT WITH US</h2>

        <input type="text" required placeholder="Firstname" id="fname" 
        autocomplete="off" name="firstName" />
        <div id="fname_check"></div>

        <?php
        if (isset($_SESSION["nameErr"])) {
          echo $_SESSION["nameErr"];
          unset($_SESSION["nameErr"]);
        }

        ?>
        <input type="text" required placeholder="lastname" id="lname" 
        autocomplete="off" name="lastName" />

        <div id="lname_check"></div>

        <?php
          if (isset($_SESSION["nameErr"])) {
            echo $_SESSION["nameErr"];
            unset($_SESSION["nameErr"]);
          }
        ?>

        <input type="password" required placeholder="Password" id="pass" 
        autocomplete="off" name="password" />
        <div id="pass_check"></div>
        <?php
        if (isset($_SESSION["passwdErr"])) {
          echo $_SESSION["passwdErr"];
          unset($_SESSION["passwdErr"]);
        }
        ?>
        <input name="email" id="email" placeholder="name@example.com" 
        title="Enter a valid email address" />
        <div id="email_check"></div>
        <?php

        if (isset($_SESSION["emailIdErr"])) {
          echo $_SESSION["emailIdErr"];
          unset($_SESSION["emailIdErr"]);
        }
        ?>
        <div class="gender-flex">
          <label>Gender</label>
          <input type='radio' id='male' name='radio' value="male">
          <label for='male'>Male</label>
          <input type='radio' id='female' name='radio' value="female">
          <label for='female'>Female</label>
        </div>
        <input name="image" id="file" type="file" accept="image/*" 
        placeholder="Profile Image" title="Upload your profile image." />
        <small>Uplodad your profile photo.</small><br>
        <label for="bio">Bio</label><br>
        <textarea id="txtid" name="bio" rows="3" cols="44" maxlength="255"></textarea>
        </span>
        <button type="submit" name="register-btn" id="submit-btn">REGISTER</button>
        <p>Already have an account?</p>
        <a href="/login">Sign in</a>
      </form>
    </div>
  </div>
  <!-- <script src="../../public/assets/js/loginScript.js"></script> -->
  <script src="../../public/assets/js/signupScript.js"></script>
</body>

</html>
