<?php
  //Destroy the active session and redirect the user to the home page.
  session_unset();
  session_destroy();
  header ('Location: /');
?>
