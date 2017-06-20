<?php /*Template Name: GPS Tester*/ ?>
<?php get_header(); ?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<p>fwefwefewf</p>

<html>
<body>

<!--<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>-->

<p id="page"></p>

<script>

getLocation();

var x = document.getElementById("page");

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
};

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude +
    //"<br>Longitude: " + position.coords.longitude;

    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".concat(lat).concat(",").concat(lng).concat("&key=AIzaSyA78weTXhC2ea-y4QT4B_B7g4KrvStkeC0");
    //x.innerHTML = "url: " + url;
    getJSON(url, function(err, data) {
      if (err != null) {
        console.log('Error: ' + err);
      } else {
        var country = data.results[0].address_components[6].short_name;
        if (country === 'US') {
          var state = data.results[0].address_components[5].short_name;
          console.log(state);

        } else {
          x.innerHTML = "You are not located in the U.S.";
        }
      }
    });

}
</script>


</body>
</html>

<?php wp_footer(); ?>
