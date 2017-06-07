<?php /*Template Name: weather-page-v3*/ ?>
<?php get_header(); ?>

fwefwefewf

<html>
<body>

<!--<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>-->

<p id="page"></p>

<script>

getLocation();

var x = document.getElementById("page");

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


}
</script>

</body>
</html>

<?php wp_footer(); ?>
