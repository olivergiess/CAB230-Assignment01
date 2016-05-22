<?php
  if(isset($_GET['art'])){
    include("connect.inc");
    try{
      
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }
 ?>


<div style="margin: auto; padding: 0 18%;"><img src="
  http://maps.googleapis.com/maps/api/staticmap?center=-27.54388889,152.9627778&zoom=14&size=700x300&sensor=false">
</div>
<div>
  <br>
    <p>
      Title: Industrial Artefacts
    </p>
    <br>
    <p>
      Average User Rating: 4
    </p>
    <br>
    <p>
      Theme: Urban Development
    </p>
    <br>
    <p>
      Location: Rocks Riverside Park; Counihan Road, Seventeen Mile Rocks/Brisbane/Queensland/Australia
    </p>
    <br>
    <p>
      Description: These are not artworks but various pieces of industrial
      artefacts found on site and mounted throughout the park. They include
      Conveyor Structure (Horizontal); Pinion; Raw Mill; and Machine Covers.
    </p>
</div>
<div id="reviews">
  <table>
    <tr>
      <td>
        Name
      </td>
      <td>
        Stars
      </td>
      <td>
        Review
      </td>
    </tr>

    <tr>
      <td class="data">
        Cassie Johnson
      </td>
      <td class="data">
        4
      </td>
      <td class="data">
        My boyfriend showed me all different art around the city on our date,
        this was one of my favourites!
      </td>
    </tr>

    <tr>
      <td class="data">
        Marry Jane
      </td>
      <td class="data">
        5
      </td>
      <td class="data">
        Omg absolutely loved it, can't wait to take my friends!!
      </td>
    </tr>

    <tr>
      <td class="data">
        John Jeffries
      </td>
      <td class="data">
        3
      </td>
      <td class="data">
        Was a nice piece of art, but I wouldn't go back to it.
      </td>
    </tr>
  </table>
</div>
