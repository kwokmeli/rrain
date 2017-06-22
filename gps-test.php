<?php /*Template Name: GPS Tester*/ ?>
<?php get_header(); ?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>



<html>
<body>

<!--<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>-->

<p id="page">
<span id="events"></span>

</p>

</div></div>

<script>
getLocation();

var x = document.getElementById("page");
var state;

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
    getJSON(url, function locationInfo (err, data) {
      if (err != null) {
        console.log('Error: ' + err);
      } else {
        var country = data.results[0].address_components[6].short_name;

        if (country === 'US') {
          state = data.results[0].address_components[5].short_name;
          console.log(state);
        } else {
          x.innerHTML = "You are not located in the U.S.";
        }
      }
    });
}



var weatherURL = "https://alerts.weather.gov/cap/ny.php?x=1";


getText(weatherURL, function(err, data) {
  var parser;
  var xmlDoc;
  var eventNumber;
  var x;
  var locations;

  x = document.getElementById("events");
  if (err != null) {
    console.log('Error: ' + err);
  } else {
    console.log(data)
    parser = new DOMParser();
    xmlDoc = parser.parseFromString(data, "text/xml");

    eventNumber = xmlDoc.getElementsByTagName("id").length;

    if (eventNumber == 1) {
      x.innerHTML += "<div class=\"box\"><div class=\"weather\">There are no current weather advisories.</div</div>"
    } else {
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


</script>


</body>
</html>

<?php wp_footer(); ?>
