<?php /*Template Name: Traffic */ ?>
<?php get_header(); ?>

<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
  </head>

  <body>
    <div class="weather">
      <div id="traffic"></div>
    </div>
    <div id="map"></div>

    <script>
      var n1;
      var n2;

      $(document).ready(function() {
        loading();
      });

      function loading() {
        $("#traffic").append("<center>Loading traffic map, this may take a few minutes <span id=\"el1\">.</span><span id=\"el2\">.</span><span id=\"el3\">.</span></center>");
        var el1 = $("#el1");
        var el2 = $("#el2");
        var el3 = $("#el3");

        setInterval(function() {
          if (el1.css("visibility") == "visible" && el2.css("visibility") == "visible" && el3.css("visibility") == "visible") {
              el1.css("visibility", "hidden");
              el2.css("visibility", "hidden");
              el3.css("visibility", "hidden");
          } else if (el1.css("visibility") == "hidden" && el2.css("visibility") == "hidden" && el3.css("visibility") == "hidden") {
            el1.css("visibility", "visible");
          } else if (el2.css("visibility") == "hidden" && el3.css("visibility") == "hidden") {
            el2.css("visibility", "visible");
          } else {
            el3.css("visibility", "visible");
          }
        }, 500);
      }

      function getLocation() {
        // If the browser supports HTML5's Geolocation feature, get GPS coordinates
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(showPosition);
        // If the browser does not support HTML5's Geolocation feature, display an error
        } else {
            x.innerHTML = "<div class=\"box\"><div class=\"weather\">Geolocation is not supported by this browser. Unable to load traffic map. </div></div>";
        }
      }

      function showPosition(position) {
        // Retrieve GPS coordinates using Geolocation
        n1 = position.coords.latitude;
        n2 = position.coords.longitude;

        // Apply Google Map to site
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 14,
          center: {lat: n1, lng: n2}
        });

        // Overlay traffic information on Google Map
        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSykqDuOehJu_UbdtF9lG-vRXZ9wI9Gx4&callback=getLocation">
    </script>

  </body>
</html>


<?php wp_footer(); ?>
