<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Brisbane Art</title>
    <link rel="stylesheet" type="text/css" href="css-style-v1.0.css">
    <script src="javascript/ajax.js"></script>
    <script src="javascript/geolocation.js"></script>
  </head>

  <body>
    <div id="header">
      <?php
        include('php/menu.inc');
      ?>
    </div>

    <div id="content">
      <div id="search-form">
        <form name="search" onsubmit="return search_art()">
          <button type="button" name="location" onclick="getLocationConstant()">Geolocate Me!</button>
          <select name="distance" class="select-field">
            <option value="">Distance</option>
            <option value="5">5km</option>
            <option value="10">10km</option>
            <option value="25">25km</option>
            <option value="50">50km</option>
            <option value="100">100km</option>
          </select>

          <?php
            include('php/suburbs.php');
          ?>

          <select name="rating" class="select-field">
            <option value="1">1 Star</option>
            <option value="2">2 Star</option>
            <option value="3">3 Star</option>
            <option value="4">4 Star</option>
            <option value="5">5 Star</option>
          </select>

          <input type="text" formaction="search_art()" name="name" class="input-field"></input>

          <button type="button" name="right-button" onclick="search_art()">Search</button>
        </form>
      </div>

      <div id="results">
      </div>
    </div>
  </body>
</html>
