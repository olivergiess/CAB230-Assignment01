<?php
  if(isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['email']) &&
     isset($_POST['pwd']) && isset($_POST['sex']) && isset($_POST['day']) &&
     isset($_POST['month']) && isset($_POST['year'])){

     include('php/connect.inc');
     try{
       $stmt = $pdo->prepare('INSERT INTO n8593370.users (firstname, surname, email, password, salt, gender, dob)
                              VALUES (:firstname, :surname, :email, SHA2(CONCAT(:password, :salt), 0), :salt, :gender, :dob)');

       $stmt->bindValue(':firstname', $_POST['firstname']);
       $stmt->bindValue(':surname', $_POST['surname']);
       $stmt->bindValue(':email', $_POST['email']);
       $stmt->bindValue(':password', $_POST['pwd']);
       $stmt->bindValue(':salt', bin2hex(openssl_random_pseudo_bytes(13, $cstrong)));
       $stmt->bindValue(':gender', $_POST['sex']);
       $stmt->bindValue(':dob', $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);

       echo $stmt->execute();
     }
     catch(PDOException $e){
         echo $e->getMessage();
         header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/registration.php");
         exit();
     }
     header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/login.php");
     exit();
  }

  include('php/template_top.inc');
  echo '<link rel="stylesheet" type="text/css" href="css/registration.css">
        <script type="text/javascript" src="javascript/validation.js"></script>';
  include('php/template_middle.inc');

  echo '<div id="registration">
          <form name="registration-form" onsubmit="return validate()" method="POST" action="registration.php">
            Name<br>
            <input type="text" name="firstname" class="input-field"
                   size="18"
                   placeholder="Firstname e.g. Marry"
                   pattern="[A-Za-z]{1,10}"
                   title="Your Firstname, can not be less than 1 character or greater than 10"
                   required>
            <br>

            Surname<br>
            <input type="text" name="surname" class="input-field"
                   size="18"
                   placeholder="Surname e.g. Jane"
                   pattern="[A-Za-z]{1,10}"
                   title="Your Surname, can not be less than 1 character or greater than 10"
                   required>
            <br>

            Email<br>
            <input type="email" name="email" class="input-field"
                   size="27"
                   placeholder="Email e.g. marry@domain.com"
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$"
                   title="Email address in the following format johndoe@domain.com.au or marryjane@domain.com. Note: if your email address has previously been assigned to an account it can not be re-used, contact admin"
                   required>
            <br>

            Confirm Email<br>
            <input type="email" name="confirmEmail" class="input-field"
                   size="27"
                   placeholder="Email e.g. marry@domain.com"
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$"
                   title="Must match the email you previously entered"
                   required>
            <br>

            Password<br>
            <input type="password" name="pwd" class="input-field"
                   size="18"
                   placeholder="Password e.g. Secret"
                   pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one uppercase and lowercase letter, and be of length 8 characters. Tip: it is recommended to have a multi word password such as Doorchairwall, this is far easier to remember and provides greater security"
                   required>
            <br>

            Confirm Password<br>
            <input  type="password" name="confirmPwd" class="input-field"
                    size="18"
                    placeholder="Password e.g. Secret"
                    pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must match the password you previously entered"
                    required>
            <br>

            <br><input type="radio" name="sex"  class="input-radio"value="male" checked>Male
            <br><input type="radio" name="sex" class="input-radio" value="female">Female
            <br><br>

            Date of Birth<br>
            <input type="text" name="day" class="input-field" size="2" maxlength="2"
                   placeholder="DD"
                   pattern="[0-2]+[0-9]|[3]+[0-2]"
                   title="The numerical date representing the day of your birth"
                   required>/
            <input type="text" name="month" class="input-field" size="2" maxlength="2"
                   placeholder="MM"
                   pattern="[0]+[0-9]|[1]+[0-2]"
                   title="The numerical date representing the month of your birth"
                   required>/
            <input type="text" name="year" class="input-field" size="4" maxlength="4"
                   placeholder="YY"
                   pattern="[2]+[0]+[0-9]+[0-9]|[1]+[9]+[0-9]+[0-9]"
                   title="The numerical date representing the year of your birth"
                   required>
            <br>


            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
          </form>
        </div>';

  include('php/template_bottom.inc');
?>
