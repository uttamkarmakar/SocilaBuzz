<!-- Html structure for reset password page -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/assets/css/resetStyle.css">
</head>

<body>
  <form action="/resetpassword" method="post">
    <p>
      <label for="username">Username</label>
      <input id="username" name="email" type="text" type="email">
    </p>
    <p>
      <label for="password"> Password</label>
      <input id="password" name="newpassword" type="password">
      <span>Enter a password longer than 8 characters</span>
    </p>
    <p>
      <label for="confirm_password">Confirm Password</label>
      <input id="confirm_password" name="confirm_password" type="password">
      <span>Please confirm your password</span>
    </p>
    <p>
      <input id="submit" type="submit" value="SUBMIT" name="update">
    </p>
  </form>
</body>

</html>