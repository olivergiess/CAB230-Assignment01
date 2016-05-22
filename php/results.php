<?php
  include("connect.inc");
  try{
    $suburb = $_GET['suburb'];
    $rating = $_GET['rating'];
    $location = $_GET['location'];
    $name = $_GET['name'];

    //Need to come back later and add the ability to refine the searchs.
    //Search will need to be refined by Geolocation, Name (using the LIKE keyword)
    //and refine by rating.
    $stmt = $pdo->prepare('SELECT * FROM n8593370.art WHERE Suburb = :suburb');
    $stmt->bindValue(':suburb', $suburb);
    $stmt->execute();
    $results = $stmt->fetchAll();

                          //   .
                          // For this parameter I will need to create a table of reviews
                          // the foreign key will link to the primary key of the
                          // art work and so rating will have to link through it.
                          //  'AND Rating >= ' . $rating .
                          //  'AND Name = ' . $name

    echo '<table>
            <tr>
              <td>Name</td>
              <td>Creator</td>
              <td>Street</td>
              <td>Description</td>
            </tr>';
      foreach($results as $result){
        echo "<tr onclick='window.location href='index.html';'>";
          echo '<td>' . $result['Name Title'] . '</td>';
          echo '<td>' . $result['Primary Maker name only'] . '</td>';
          echo '<td>' . $result['Street Location'] . '</td>';
          echo '<td>' . $result['Brief Description'] . '</td>';
        echo '</tr>';
      }
    echo '</table>';
  }
  catch(PDOException $e){
      echo $e->getMessage();
  }
?>
