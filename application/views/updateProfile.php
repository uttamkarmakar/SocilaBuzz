<!-- Html code for update profile section -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/assets/css/profileStyle.css">
</head>

<body>
  <div class="wrapper">
    <div class="profile">
      <div class="content">
        <h1>Edit Profile</h1>
        <form action="/profile" method="POST" enctype="multipart/form-data">

          <fieldset>
            <div class="grid-35">
              <label for="avatar">Your Photo</label>
            </div>
            <div class="grid-65">
              <span class="photo" title="Upload your Avatar!">
                <img class="roundImage" src="<?php echo $_SESSION['user']['photo'] ?>" alt="" srcset=""></span>
              <input type="file" class="btn" name="changedPhoto" accept="image/*" />
            </div>
          </fieldset>

          <fieldset>
            <div class="grid-35">
              <label for="fname">First Name</label>
            </div>
            <div class="grid-65">
              <input type="text" id="fname" tabindex="1" name="firstName" value="<?php echo $_SESSION["user"]["firstName"] ?>" />
            </div>
          </fieldset>

          <fieldset>
            <div class="grid-35">
              <label for="lname">Last Name</label>
            </div>
            <div class="grid-65">
              <input type="text" id="lname" tabindex="2" name="lastName" value="<?php echo $_SESSION["user"]["lastName"] ?>" />
            </div>
          </fieldset>

          <fieldset>
            <div class="grid-35">
              <label for="gender">Gender</label>
            </div>
            <div class="grid-65">
              <input type="text" id="gender" tabindex="2" name="gender" value="<?php echo $_SESSION["user"]["gender"] ?>" />
            </div>
          </fieldset>

          <fieldset>


            <fieldset>
              <div class="grid-35">
                <label for="email">Email Address</label>
              </div>
              <div class="grid-65">
                <input type="email" id="email" tabindex="6" value="<?php echo $_SESSION["user"]["email"] ?>" disabled name="email" />
              </div>
            </fieldset>

            <fieldset>
              <div class="grid-35">
                <label for="bio">Bio</label>
              </div>
              <div class="grid-65">
                <textarea id="" cols="30" rows="10" name="bio" placeholder="" ?><?php echo $_SESSION["user"]["bio"] ?>
              </textarea>
              </div>
            </fieldset>

            <fieldset>

              <fieldset>
                <a href="/home" class="anchor">Back</a>
                <input type="submit" class="Btn" value="Save Changes" name="updateChanges" />
              </fieldset>

        </form>
      </div>
    </div>
  </div>
</body>

</html>
