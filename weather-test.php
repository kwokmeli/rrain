<?php /*Template Name: Yahoo API Template*/ ?>

<!-- OpenWeatherMap API Key: e4a97fb97ae96ac058617a4019146aaf -->

<?php get_header(); ?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div class="weather">
<span id="forecast">fwefw</span>
</div>

<script>
var x = document.getElementById("forecast");

$(document).ready(function() {
  getLocation();
});

var getJSON = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'json';
  xhr.onload = function() {
    var status = xhr.status;
    if (status == 200) {
      callback(null, xhr.response);
    } else {
      callback(status);
    }
  };
  xhr.send();
}

function getLocation() {
  // If the browser supports HTML5's Geolocation feature, get GPS coordinates
  if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(showPosition);
  } else {
      x.innerHTML = "<div class=\"box\"><div class=\"weather\">Geolocation is not supported by this browser. Unable to retrieve weather advisories. Please select a county using the Search by County method. </div></div>";
  }
}

function showPosition(position) {
  // Retrieve GPS coordinates using Geolocation
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  var url;
  var temp;

  url = "http://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lng + "&appid=e4a97fb97ae96ac058617a4019146aaf";

  // Call the OpenWeatherMap API
  getJSON(url, function weatherInfo (err, data) {
  // Convert temperature from Kelvin to Fahrenheit
    temp = Math.round(data.main.temp * 9 / 5 - 459.67);

    x.innerHTML = "Current weather for your detected location of " + data.name + ":<br>Temp: " + temp + "°F<br>Pressure: " + data.main.pressure + " millibar<br>Humidity: " + data.main.humidity +
    "%<br>";

    // Collect all conditions, if any
    for (var i=0; i<data.weather.length; i++) {
      if (i == data.weather.length - 1) {
        x.innerHTML += data.weather[i].main + "<br><br>";
      } else {
        x.innerHTML += data.weather[i].main + ", ";
      }
    }
  });
}

</script>


<?php wp_footer(); ?>
