<?php /*Template Name: GPS Tester*/ ?>
<?php get_header(); ?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<html>
<body>

<span id="events"><div class="weather"><center>Loading weather advisories <span id="el1">.</span><span id="el2">.</span><span id="el3">.</span></center></div></span>

<script>
$(document).ready(function() {
    var el1 = $("#el1");
    var el2 = $("#el2");
    var el3 = $("#el3");

    // Set blinking animation for loading symbol
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
});

// Retrieve user's GPS coordinates
getLocation();
var x = document.getElementById("events");

// Function to retrieve Google's geocode JSON
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

// Function to retrieve weather advisory XML
var getText = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'text';
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
  // If the browser supports HTML5's Geolocation feature, get GPS coordinates.
  if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(showPosition);
  // If the browser does not support HTML5's Geolocation feature, display an error.
  } else {
      x.innerHTML = "<div class=\"box\"><div class=\"weather\">Geolocation is not supported by this browser. Unable to retrieve weather advisories.</div></div>";
  }
}

function showPosition(position) {
  // Retrieve GPS coordinates using Geolocation.
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  // Reverse lookup location information using Google's Geocodes.
  // Maximum of 2,500 hits/day, 5 hits/second.
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".concat(lat).concat(",").concat(lng).concat("&key=AIzaSyA78weTXhC2ea-y4QT4B_B7g4KrvStkeC0");

  // Perform AJAX call to retrieve Geocode JSON.
  getJSON(url, function locationInfo (err, data) {
    var state;
    var statename;
    var weatherURL;

    if (err != null) {
      console.log('Error: ' + err);
      x.innerHTML = "<div class=\"box\"><div class=\"weather\">Error " + err + " when retrieving geolocation data. Please try again. </div></div>";
    } else {
      var country = data.results[0].address_components[6].short_name;
console.log(data);
      // Check country location of user
      if (country === 'US') {
        state = data.results[0].address_components[5].short_name;
        statename = data.results[0].address_components[5].long_name;
        weatherURL = "https://alerts.weather.gov/cap/".concat(state.toLowerCase()).concat(".php?x=1");
        getText(weatherURL, function(err, data) {
          var parser;
          var xmlDoc;
          var eventNumber;
          var locations;

          if (err != null) {
            console.log('Error: ' + err);
            x.innerHTML = "<div class=\"box\"><div class=\"weather\">Error " + err + " when retrieving weather advisories. Please try again. </div></div>";
          } else {
            // Parse the weather advisory XML
            parser = new DOMParser();
            xmlDoc = parser.parseFromString(data, "text/xml");
console.log(xmlDoc);
            // Find the total number of weather advisories + 1 (the header counts as an XML event)
            eventNumber = xmlDoc.getElementsByTagName("id").length;

            if (xmlDoc.getElementsByTagName("title")[1].childNodes[0].nodeValue == "There are no active watches, warnings or advisories") {
              x.innerHTML = "<div class=\"box\"><div class=\"weather\"><center>There are no active watches, warnings, or advisories for the state of " + statename + ".</center>";
            } else {
              // For each weather advisory, gather and print all information
              x.innerHTML = "";
              for (i = 1; i < eventNumber; i++) {
                locations = xmlDoc.getElementsByTagNameNS("urn:oasis:names:tc:emergency:cap:1.1", "areaDesc")[i-1].childNodes[0].nodeValue;
                locations = locations.replace(/; /g, "<br>");
                x.innerHTML += "<div class=\"box\"><div class=\"weather\">"
                  + "<b>" + locations + "</b>" + "<br><br><a href=\""
                  + xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue + "\">"
                  + xmlDoc.getElementsByTagName("title")[i].childNodes[0].nodeValue + "</a><br><b>Published</b>: "
                  + xmlDoc.getElementsByTagName("published")[i-1].childNodes[0].nodeValue + " | <b>Updated</b>: "
                  + xmlDoc.getElementsByTagName("updated")[i-1].childNodes[0].nodeValue + "<br><br>"
                  + xmlDoc.getElementsByTagName("summary")[i-1].childNodes[0].nodeValue;
                x.innerHTML += "</div></div>";
              }
            }
          }
        });
      } else {
        x.innerHTML = "<div class=\"box\"><div class=\"weather\">You are not located in the U.S. Unable to retrieve weather advisories.</div></div>";
      }
    }
  });
}
</script>
</body>
</html>

<?php wp_footer(); ?>
