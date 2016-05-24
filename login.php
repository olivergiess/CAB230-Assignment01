<?php
  include('php/authentication.inc');

  if (isset($_POST['login'])){
    if($_POST['email'] != "" && $_POST['password'] != ""){
      if(checkPassword($_POST['email'], $_POST['password'])){
        include('php/connect.inc');
        try{
          $stmt = $pdo->prepare('SELECT firstname FROM n8593370.users WHERE email = :email');
          $stmt->bindValue(':email', $_POST['email']);
          $stmt->execute();
        } catch (PDOException $e){
            echo '<br><br><br>' . $e->getMessage();
            header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/login.php");
            exit();
        }

        session_start();

        $_SESSION['userAuthenticated'] = true;
        $_SESSION['userEmail'] = $_POST['email'];
        $_SESSION['userName'] = $stmt->fetchColumn();

        header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/index.php");
        exit();
      } else {
        header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/login.php");
      }
    }
  }

  include('php/template_top.inc');
  echo '<link rel="stylesheet" type="text/css" href="css/login.css">';
  include('php/template_middle.inc');

  echo '<div id="login-form">
          <form name="login" method="POST" action="login.php">
            Email
            <br>
            <input type="text" name="email" class="input-field" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$" required>
            <br>
            Password
            <br>
            <input type="password" name="password" class="input-field" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <br>
            <input type="submit" name="login" value="Log In">
            <button type="button" onclick="window.location.href=\'registration.php\'">Register
            </button>
          </form>
        </div>';

  include('php/template_bottom.inc');
?>
