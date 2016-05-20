function comp(){
  //Selects do not need validation due to default values and thus do not require
  //to be checked.
  var suburb = document.forms["search"]["suburb"].value;
  var rating = document.forms["search"]["rating"].value;
  var location = document.forms["search"]["location"].value;
  var name = document.forms["search"]["name"].value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("results").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "./php/results.php?suburb=" + suburb + "&rating=" + rating + "&location=" + location + "&name=" + name, true);
  xmlhttp.send();
}
