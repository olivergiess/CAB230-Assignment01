<?php
  function checkPassword($email, $password){
    include('connect.inc');
    try{
      $stmt = $pdo->prepare('SELECT *
                            FROM n8593370.users
                            WHERE email = :email AND password = SHA2(CONCAT(:password, salt), 0)');
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':password', $password);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }
?>
