<?php
  include("connect.inc");
  try{
    $id = $_GET['id'];

    $stmt = $pdo->prepare('SELECT *
                           FROM n8593370.items
                           WHERE ID = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch();


    echo  '<div style="margin: auto; padding: 0 18%;"><img src="
            http://maps.googleapis.com/maps/api/staticmap?center=' . $item['Latitude'] . ',' . $item['Longitude'] . '&zoom=14&size=700x300&sensor=false">
          </div>
          <div>
            <br>
              <p>
                Title: ' . $item['Name'] . '
              </p>
              <br>
              <p>
                Average User Rating: ' . '
              </p>
              <br>
              <p>
                Theme: ' . $item['ArtTheme'] . '
              </p>
              <br>
              <p>
                Location: ' . $item['StreetLocation'] . ' in ' . $item['Suburb'] . '
              </p>
              <br>
              <p>
                Description: ' . $item['BriefDescription'] . '
              </p>
          </div>
          <div id="reviews">

          </div>';

  } catch(PDOException $e) {
      echo $e->getMessage();
  }
 ?>
