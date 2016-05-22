<?php
  include("connect.inc");
  try{
    $suburb = $_GET['suburb'];
    $rating = $_GET['rating'];
    $location = $_GET['location'];
    $keywords = $_GET['keywords'];

    $lat = $_GET['lat'];
    $lon = $_GET['lon'];
    $maxDist = $_GET['dist'];

    //Rating will always be included so the 1 = 1 will not be required
    //it is only a palceholder so conjunction can be performed for the suburb
    //conditional.
    $queryString = 'SELECT * FROM n8593370.items WHERE 1 = 1';

    if($suburb != ""){
      $queryString .= ' AND Suburb = :suburb';
    }
    if($keywords != ""){
      $queryString .= ' AND Name LIKE :name';
    }

    $stmt = $pdo->prepare($queryString);

    if($suburb != ""){
      $stmt->bindValue(':suburb', $suburb);
    }
    if($keywords != ""){
      $stmt->bindValue(':name', "%$keywords%");
    }

    $stmt->execute();
    $results = $stmt->fetchAll();

    //Check if latitude, longitude and distance have been provided. If one of
    //does not exist or is not a valid value, sorting via distance from user
    //is void.

    if($maxDist != "" && $lat != "null" && $lon != "null"){
      include('haversine.inc');

      foreach($results as $result){
        $distance = haversineFormula($lat, $lon, $result['Latitude'], $result['Longitude']);
        if($distance > $maxDist){
          unset($results[array_search($result, $results)]);
        }
        $results = array_values($results);
      }
    }

    if(!empty($results)){
      echo '<table>
              <tr>
                <td>Name</td>
                <td>Artist</td>
                <td>Rating</td>
                <td>Street</td>
                <td>Description</td>
              </tr>';
        foreach($results as $result){
          echo "<tr onclick='find_item(" . $result['ID'] . ")'>";
            echo '<td>' . $result['Name'] . '</td>';
            echo '<td>' . $result['PrimaryMaker'] . '</td>';
            echo '<td>' . "1 out of 5" . '</td>';
            echo '<td>' . $result['StreetLocation'] . '</td>';
            echo '<td>' . $result['BriefDescription'] . '</td>';
          echo '</tr>';
        }
      echo '</table>';
    } else {
      echo '<h1>No results match your specified critera.</h1>';
    }
  }
  catch(PDOException $e){
      echo $e->getMessage();
  }
?>
