function search_art(){
  var suburb = document.forms["search"]["suburb"].value;
  var rating = document.forms["search"]["rating"].value;
  var keywords = document.forms["search"]["name"].value;

  var lat = localStorage.getItem("lat");
  var lon = localStorage.getItem("lon");
  var dist = document.forms["search"]["distance"].value;

  //Purge the store incase further searches do not wish to use geolocation.
  localStorage.removeItem("lat");
  localStorage.removeItem("lon");


  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("results").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "./php/results.php?suburb=" + suburb + "&rating=" +
                rating + "&keywords=" + keywords + "&lat=" + lat + "&lon=" + lon + "&dist=" + dist, true);
  xmlhttp.send();

  return false;
}

function find_item(id){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("results").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "./php/item.php?id=" + id, true);
  xmlhttp.send();
}
