<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/assets/css/loginStyle.css">
</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form " action="/login" method="post">
        <h2>SIGN IN TO YOUR ACCOUNT</h2>
        <input type="email" required placeholder="User Email" id="user" autocomplete="off" name="email" />
        <input oninput="return formvalid()" type="password" required placeholder="Password" id="pass" 
        autocomplete="off" name="password" />
        <button type="submit" name="login-btn" id="login">SIGN IN</button>
        <?php
        if (isset($_SESSION['loginErr'])) {
          echo $_SESSION['loginErr'];
          unset($_SESSION['loginErr']);
        }
        ?>
        <p class="message"><a href="/recoveraccount">Forgot your password?</a></p>
      </form>
      <p>Don't have an account?</p>
      <a href="/signup" name>Sign up</a>
    </div>
  </div>
  <script src="../../public/assets/js/loginScript.js"></script>
</body>

</html>
