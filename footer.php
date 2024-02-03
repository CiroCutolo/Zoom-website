<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header-part.css?<?php echo rand();?>">
    <title>Document</title>
</head>
<body>
<footer>
<div class="lineaOmbra"></div>
  <div class="row">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-youtube"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
  </div>
  <p id="demo"></p>
  <div> ©2024 Gruppo 22. Design by Gruppo 22 </div>
  </footer>
</body>
<script>
const x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

var lat;
var long;

function showPosition(position) {
   lat = position.coords.latitude;
   long = position.coords.longitude;
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;


  //Create query for the API.
  var latitude = "latitude=" + lat;
  var longitude = "&longitude=" + long;
  var query = latitude + longitude + "&localityLanguage=en";
  const Http = new XMLHttpRequest();
  var citta = "nulla";
  var bigdatacloud_api =
    "https://api.bigdatacloud.net/data/reverse-geocode-client?";
  bigdatacloud_api += query;
  Http.open("GET", bigdatacloud_api);
  Http.send();
  Http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      //return myObj.city;
      x.innerHTML=myObj.city;
    }
  }
}

getLocation();

</script>

</html>