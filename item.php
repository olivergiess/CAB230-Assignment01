<?php
  if(isset($_GET['name'])){
    $name = $_GET['name'];
    session_start();
    include("php/connect.inc");

    if(isset($_POST['rating']) && $_POST['review'] != ""){
      if($_SESSION['userAuthenticated']){
        try{
          $cleantext = htmlspecialchars($_POST['review'], ENT_QUOTES);

          $stmt = $pdo->prepare('INSERT INTO n8593370.reviews (name, email, rating, review)
                                 VALUES (:name, :email, :rating, :review)');
          $stmt->bindValue(':name', $name);
          $stmt->bindValue(':email', $_SESSION['userEmail']);
          $stmt->bindValue(':rating', $_POST['rating']);
          $stmt->bindValue(':review', $cleantext);
          $stmt->execute();

          $stmt = $pdo->prepare('SELECT rating FROM n8593370.reviews WHERE name = :name');
          $stmt->bindValue(':name', $name);
          $stmt->execute();

          $ratings = $stmt->fetchAll();

          $sum = 0;
          $frequency = 0;
          foreach($ratings as $rating){
            $sum += $rating['rating'];
            $frequency += 1;
          }

          $stmt = $pdo->prepare('UPDATE n8593370.items
                                 SET AverageRating = :avgrating
                                 WHERE Name = :name');
          $stmt->bindValue(':avgrating', $sum / $frequency);
          $stmt->bindValue(':name', $name);
          $stmt->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }


      }else{
        header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/login.php");
        exit();
      }
    }

    try{
      $stmt = $pdo->prepare('SELECT *
                             FROM n8593370.items
                             WHERE name = :name');
      $stmt->bindValue(':name', $name);
      $stmt->execute();
      $item = $stmt->fetch();

      $stmt = $pdo->prepare('SELECT *
                             FROM n8593370.reviews
                             WHERE name = :name');
      $stmt->bindValue(':name', $item['Name']);
      $stmt->execute();
      $reviews = $stmt->fetchAll();
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    include('php/template_top.inc');
    echo '<link rel="stylesheet" type="text/css" href="css/item.css">';
    include('php/template_middle.inc');

    echo  '<div id="info">
             <table class="item-table">
               <tr>
                 <td>Title:</td>
                 <td> ' . $item['Name'] . '</td>
               </tr>
               <tr>
                 <td>Average User Rating:</td>
                 <td>' . $item['AverageRating'] . '</td>
               </tr>
               <tr>
                 <td>Theme:</td>
                 <td> ' . $item['ArtTheme'] . '</td>
               </tr>
               <tr>
                 <td>Location:</td>
                 <td> ' . $item['StreetLocation'] . ' in ' . $item['Suburb'] . '</td>
               </tr>
               <tr>
                 <td>Description:</td>
                 <td> ' . $item['BriefDescription'] . '</td>
               </tr>
             </table>
           </div>

           <div id="reviews">
             <form method="POST" action="item.php?name=' . $name . '">
               <select name="rating" class="select-field">
                 <option value="1">1 Star</option>
                 <option value="2">2 Star</option>
                 <option value="3">3 Star</option>
                 <option value="4">4 Star</option>
                 <option value="5">5 Star</option>
               </select>
               <input name="review" type="text" maxlength="256">
               <input type="submit" value="Add Review">
             </form>
             <table>
              <tr>
                <td>Rating</td>
                <td>Description</td>
                <td>User</td>
              </tr>';

              foreach($reviews as $review){
                echo '<tr>
                        <td>' . $review['rating'] . '</td>
                        <td>' . $review['review'] . '</td>
                        <td>' . $review['email'] . ' </td>
                      </tr>';
              }

      echo '  </table>
            </div>';

    include('php/template_bottom.inc');
 } else {
   header("Location: http://{$_SERVER['HTTP_HOST']}/assignment/search.php");
   exit();
 }
?>
