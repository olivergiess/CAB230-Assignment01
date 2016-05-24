<?php
  session_start();

  unset($_SESSION['userAuthenticated']);
  unset($_SESSION['userEmail']);

  header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/index.php");
?>
