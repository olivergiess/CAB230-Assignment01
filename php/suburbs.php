<?php
  include('connect.inc');
  try{
    $results = $pdo->query('SELECT DISTINCT Suburb
                            FROM n8593370.items');

    echo '<select name="suburb" class="select-field">
      <option value="">Suburb</option>';

      foreach($results as $result){
        $suburb = $result['Suburb'];
        $suburbName = explode('/', $suburb);

        echo '<option value="' . $suburb . '">' . $suburbName[0] . '</option>';
      }

    echo '</select>';
  }
  catch(PDOException $e){
      echo $e->getMessage();
  }
?>
