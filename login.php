<?php
  if (isset($_POST['login'])){
    if($_POST['username'] != "" && $_POST['password'] != ""){
      if(checkPassword($_POST['username'], $_POST['password'])){
        session_start();
        $_SESSION['isUser'] = true;
        header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/index.php");
        exit();
      } else {
        header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/login.php");
      }
    }
  }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Brisbane Art</title>

      <link rel="stylesheet" type="text/css" href="css-style-v1.0.css">
  </head>

  <body>

    <div id="header">
      <?php
        include('php/menu.inc');
      ?>
    </div>

    <div id="content">
      <div id="login-form">
        <form name="login" method="POST" action="login.php">
          Email
          <p>
          <input type="text" name="email" class="input-field" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$" required>
          <p>
          Password
          <p>
          <input type="password" name="password" class="input-field" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          <p>
          <input type="submit" class="login-button" value="Log In">
          <button type="button" class="register-button" onclick="window.location.href='registration.html'">Register
          </button>
        </form>
      </div>
    </div>
  </body>
</html>
