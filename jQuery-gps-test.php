<?php /*Template Name: GPS Tester - jQuery*/ ?>
<?php get_header(); ?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<html>
<body>

<!-- <p id="page"> -->
<span id="events"><div class="weather"><center><button id="button1">Get Weather Advisories</button><button id="button2">Search Weather Advisories</button></center></div></span>
<br><br>
<p id="main"></p>
<!-- </p> -->

<script>
// Retrieve user's GPS coordinates
$(document).ready(function() {
  $("#button1").click(function() {
    $("p").text("getting location");
    getLocation();
  });

  $("#button2").click(function() {
    $("p").show();
  })
});


//getLocation();
var weatherURL;
var x = document.getElementById("main");
var state;

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
  if (navigator.geolocation) {
    $("p").text("browser supports geolocation");
    $("p").append("<br>");
    navigator.geolocation.getCurrentPosition(showPosition);
  // If the browser does not support HTML5's Geolocation feature, display an error.
  } else {
    x.innerHTML = "<div class=\"box\"><div class=\"weather\">Geolocation is not supported by this browser. Unable to retrieve weather advisories.</div></div>";
  }
}

function showPosition(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".concat(lat).concat(",").concat(lng).concat("&key=AIzaSyA78weTXhC2ea-y4QT4B_B7g4KrvStkeC0");

  $("p").append(position.coords.latitude);
  $("p").append("fweifowefj");
  $("p").append(url + "<br>");

  $.getJSON(url, function(result) {
    $.each(result, function(i, field) {
      $("p").append(field + " ");
    });
  });

}


// function showPosition(position) {
//   // Retrieve GPS coordinates using Geolocation.
//   var lat = position.coords.latitude;
//   var lng = position.coords.longitude;
//   // Reverse lookup location information using Google's Geocodes.
//   // Maximum of 2,500 hits/day, 5 hits/second.
//   var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".concat(lat).concat(",").concat(lng).concat("&key=AIzaSyA78weTXhC2ea-y4QT4B_B7g4KrvStkeC0");
//
//   // Perform AJAX call to retreive Geocode JSON.
//   getJSON(url, function locationInfo (err, data) {
//     if (err != null) {
//       console.log('Error: ' + err);
//     } else {
//       var country = data.results[0].address_components[6].short_name;
//
//       // Check country location of user
//       if (country === 'US') {
//         state = data.results[0].address_components[5].short_name;
//         weatherURL = "https://alerts.weather.gov/cap/".concat(state.toLowerCase()).concat(".php?x=1");
//         getText(weatherURL, function(err, data) {
//           var parser;
//           var xmlDoc;
//           var eventNumber;
//           var locations;
//           var x = document.getElementById("main");
//
//           if (err != null) {
//             console.log('Error: ' + err);
//           } else {
//             // Parse the weather advisory XML
//             parser = new DOMParser();
//             xmlDoc = parser.parseFromString(data, "text/xml");
//
//             // Find the total number of weather advisories + 1 (the header counts as an XML event)
//             eventNumber = xmlDoc.getElementsByTagName("id").length;
//
//             if (eventNumber == 1) {
//               x.innerHTML = "<div class=\"box\"><div class=\"weather\">There are no current weather advisories.</div</div>"
//             } else {
//               // For each weather advisory, gather and print all information
//               for (i = 1; i < eventNumber; i++) {
//                 locations = xmlDoc.getElementsByTagNameNS("urn:oasis:names:tc:emergency:cap:1.1", "areaDesc")[i-1].childNodes[0].nodeValue;
//                 locations = locations.replace(/; /g, "<br>");
//                 x.innerHTML = "<div class=\"box\"><div class=\"weather\">"
//                   + "<b>" + locations + "</b>" + "<br><br><a href=\""
//                   + xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue + "\">"
//                   + xmlDoc.getElementsByTagName("title")[i].childNodes[0].nodeValue + "</a><br><b>Published</b>: "
//                   + xmlDoc.getElementsByTagName("published")[i-1].childNodes[0].nodeValue + " | <b>Updated</b>: "
//                   + xmlDoc.getElementsByTagName("updated")[i-1].childNodes[0].nodeValue + "<br><br>"
//                   + xmlDoc.getElementsByTagName("summary")[i-1].childNodes[0].nodeValue;
//                 x.innerHTML += "</div></div>";
//               }
//             }
//           }
//         });
//       } else {
//         x.innerHTML = "<div class=\"box\"><div class=\"weather\">You are not located in the U.S. Unable to retrieve weather advisories.</div></div>";
//       }
//     }
//   });
// }


//weatherURL = "https://alerts.weather.gove/cap/".concat(state).concat(".php?x=1");
//weatherURL = "https://alerts.weather.gov/cap/ca.php?x=1";

// getText(weatherURL, function(err, data) {
//   var parser;
//   var xmlDoc;
//   var eventNumber;
//   var x;
//   var locations;
//
//   x = document.getElementById("events");
//   if (err != null) {
//     console.log('Error: ' + err);
//   } else {
//     //console.log(data)
//     parser = new DOMParser();
//     xmlDoc = parser.parseFromString(data, "text/xml");
//
//     eventNumber = xmlDoc.getElementsByTagName("id").length;
//
//     if (eventNumber == 1) {
//       x.innerHTML += "<div class=\"box\"><div class=\"weather\">There are no current weather advisories.</div</div>"
//     } else {
//       for (i = 1; i < eventNumber; i++) {
//         locations = xmlDoc.getElementsByTagNameNS("urn:oasis:names:tc:emergency:cap:1.1", "areaDesc")[i-1].childNodes[0].nodeValue;
//         locations = locations.replace(/; /g, "<br>");
//         x.innerHTML += "<div class=\"box\"><div class=\"weather\">"
//           + "<b>" + locations + "</b>" + "<br><br><a href=\""
//           + xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue + "\">"
//           + xmlDoc.getElementsByTagName("title")[i].childNodes[0].nodeValue + "</a><br><b>Published</b>: "
//           + xmlDoc.getElementsByTagName("published")[i-1].childNodes[0].nodeValue + " | <b>Updated</b>: "
//           + xmlDoc.getElementsByTagName("updated")[i-1].childNodes[0].nodeValue + "<br><br>"
//           + xmlDoc.getElementsByTagName("summary")[i-1].childNodes[0].nodeValue;
//         x.innerHTML += "</div></div>";
//       }
//     }
//   }
// });
</script>

</body>
</html>

<?php wp_footer(); ?>