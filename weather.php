<?php /* Template Name: Weather */ ?>
<?php get_header(); ?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<html>
<body>

<div class="weather">
  <center>
    <div id="countySelect"><br>Select a county to get additional weather advisories.<br><br></div>
    <div class="dropdown">
    <button id="search">SEARCH BY COUNTY</button>
      <div id="counties" class="content">
        <a class="countyLinks" id="WAC001">Adams</a>
        <a class="countyLinks" id="WAC003">Asotin</a>
        <a class="countyLinks" id="WAC005">Benton</a>
        <a class="countyLinks" id="WAC007">Chelan</a>
        <a class="countyLinks" id="WAC009">Clallam</a>
        <a class="countyLinks" id="WAC011">Clark</a>
        <a class="countyLinks" id="WAC013">Columbia</a>
        <a class="countyLinks" id="WAC015">Cowlitz</a>
        <a class="countyLinks" id="WAC017">Douglas</a>
        <a class="countyLinks" id="WAC019">Ferry</a>
        <a class="countyLinks" id="WAC021">Franklin</a>
        <a class="countyLinks" id="WAC023">Garfield</a>
        <a class="countyLinks" id="WAC025">Grant</a>
        <a class="countyLinks" id="WAC027">Grays Harbor</a>
        <a class="countyLinks" id="WAC029">Island</a>
        <a class="countyLinks" id="WAC031">Jefferson</a>
        <a class="countyLinks" id="WAC033">King</a>
        <a class="countyLinks" id="WAC035">Kitsap</a>
        <a class="countyLinks" id="WAC037">Kittitas</a>
        <a class="countyLinks" id="WAC039">Klickitat</a>
        <a class="countyLinks" id="WAC041">Lewis</a>
        <a class="countyLinks" id="WAC043">Lincoln</a>
        <a class="countyLinks" id="WAC045">Mason</a>
        <a class="countyLinks" id="WAC047">Okanogan</a>
        <a class="countyLinks" id="WAC049">Pacific</a>
        <a class="countyLinks" id="WAC051">Pend Oreille</a>
        <a class="countyLinks" id="WAC053">Pierce</a>
        <a class="countyLinks" id="WAC055">San Juan</a>
        <a class="countyLinks" id="WAC057">Skagit</a>
        <a class="countyLinks" id="WAC059">Skamania</a>
        <a class="countyLinks" id="WAC061">Snohomish</a>
        <a class="countyLinks" id="WAC063">Spokane</a>
        <a class="countyLinks" id="WAC065">Stevens</a>
        <a class="countyLinks" id="WAC067">Thurston</a>
        <a class="countyLinks" id="WAC069">Wahkiakum</a>
        <a class="countyLinks" id="WAC071">Walla Walla</a>
        <a class="countyLinks" id="WAC073">Whatcom</a>
        <a class="countyLinks" id="WAC075">Whitman</a>
        <a class="countyLinks" id="WAC077">Yakima</a>
      </div>
    </div>
    <br><br>
    <div id="currentWeather"></div>
  </center>
  <span id="events"></span>
</div>

<script>
$(document).ready(function() {
  // Automatically detect location and provide corresponding weather advisories
  $("#countySelect").css("visibility", "hidden");
  $("#search").css("visibility", "hidden");
  $("#currentWeather").css("visibility", "hidden");
  loading();
  getLocation();

  // Trigger dropdown menu to manually select county
  $("#search").click(function(event) {
    event.stopPropagation();
    if ($("#counties").css("visibility") == "visible") {
      $("#counties").css("visibility", "hidden");
    } else {
      $("#counties").css("visibility", "visible");
    }
  });

  // Hide dropdown menu if user clicks away
  $(document).click(function() {
    if ($("#counties").css("visibility") == "visible") {
      $("#counties").css("visibility", "hidden");
    }
  });

  // Retrieve weather advisories for manually selected county
  $("a.countyLinks").click(function(event) {
    var countyCode;
    var countyName;
    var weatherURL;

    $("#events").text("");
    $("#loading").text("");
    loading();
    countyCode = $(this).attr("id");
    countyName = $(event.target).text();
    $("#counties").css("visibility", "hidden");
    weatherURL = "https://alerts.weather.gov/cap/wwaatmget.php?x=" + countyCode + "&y=1";
    getText(weatherURL, function(err, data) {
      var parser;
      var xmlDoc;
      var eventNumber;
      var locations;

      if (err != null) {
        x.innerHTML = "<div class=\"box\"><div class=\"weather\">Error " + err + " when retrieving weather advisories. Please try again. </div></div>";
        showDropdown();
      } else {
        // Parse the weather advisory XML
        parser = new DOMParser();
        xmlDoc = parser.parseFromString(data, "text/xml");
        // Find the total number of weather advisories + 1 (the header counts as an XML event)
        eventNumber = xmlDoc.getElementsByTagName("id").length;

        if (xmlDoc.getElementsByTagName("title")[1].childNodes[0].nodeValue == "There are no active watches, warnings or advisories") {
          x.innerHTML = "<div class=\"box\"><div class=\"weather\"><center>There are no active watches, warnings, or advisories for " + countyName + " County.</center>";
        } else {
          // For each weather advisory, gather and print all information
          x.innerHTML = "<center> Showing weather advisories for " + countyName + " County. </center>";
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
  })
});

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

// Set blinking animation for loading symbol
function loading() {
  $("#events").append("<center>Loading weather advisories <span id=\"el1\">.</span><span id=\"el2\">.</span><span id=\"el3\">.</span></center>");
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
  } else {
      x.innerHTML = "<div class=\"box\"><div class=\"weather\">Geolocation is not supported by this browser. Unable to retrieve weather advisories. Please select a county using the Search by County method. </div></div>";
      showDropdown();
  }
}

function showPosition(position) {
  var temp, humidity, weatherLocation;
  var condition = "";
  // Retrieve GPS coordinates using Geolocation
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  // Reverse lookup location information using Google's Geocodes
  // Maximum of 2,500 calls/day, 5 calls/second
  var googleUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng +"&key=AIzaSyA78weTXhC2ea-y4QT4B_B7g4KrvStkeC0";
  // Retrieve current weather data via OpenWeatherMap's API
  // Maximum of 60 calls/minute
  var openWeatherUrl = "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lng + "&appid=e4a97fb97ae96ac058617a4019146aaf";

  getJSON(openWeatherUrl, function weatherInfo (err, data) {
console.log(data);
    // TODO: Handle undefined values from OpenWeatherMap
    // Convert temperature from Kelvin to Fahrenheit
    temp = Math.round(data.main.temp * 9 / 5 - 459.67);
    humidity = data.main.humidity;
    weatherLocation = data.name;

    // Collect all conditions, if any
    if (data.weather.length == 0) {
      condition = "N/A";
    } else {
      for (var i=0; i<data.weather.length; i++) {
        if (i == data.weather.length - 1) {
          condition += data.weather[i].main;
        } else {
          condition += data.weather[i].main + ", ";
        }
      }
    }
    // Perform AJAX call to retrieve Geocode JSON
    getJSON(googleUrl, function locationInfo (err, data) {
      var countyAbbr;
      var countyCode;
      var countyName;
      var state;
      var weatherURL;
      countyCode = "nonUS";

      // Check for errors when retrieving geocode data
      if ( err != null ) {
        x.innerHTML = "<div class=\"box\"><div class=\"weather\">An error occured when retrieving geolocation data. Please try again or select a county using the Search by County method. </div></div>";
      } else {
        // Safari on iOS: XMLHttpRequest.responseType is always type text
        if ( typeof data == 'string' ) {
          data = JSON.parse(data);
        }
  console.log(data);

        if ( data.status != "OK" ) {
          x.innerHTML = "<div class=\"box\"><div class=\"weather\">Geocode error " + data.status + " when retrieving geolocation data. Please try again or select a county using the Search by County method. </div></div>";
        } else {
          // Check if user is in Washington
          // Look through all address_components of results[0] to find state
          for (i = 0; i<data.results[0].address_components.length; i++) {
            // If Washington State has been found
            if (data.results[0].address_components[i].short_name == "WA") {
              // Look through all address_components of results[0] to find Washington State county
              for (j=0; j<data.results[0].address_components.length; j++) {
                // If a county has been found, parse out the county name
                if (/(?= County)/g.test(data.results[0].address_components[j].long_name)) {
                  countyName = data.results[0].address_components[j].long_name.split(" ");
                  countyAbbr = "";
                  for (k=0; k<countyName.length - 1; k++) {
                    if ( k > 0 ) {
                      countyAbbr += " ";
                    }
                    countyAbbr += countyName[k];
                  }

                  // Determine the correct weather.gov county code
                  switch (countyAbbr) {
                    case "Adams":
                      countyCode = "WAC001";
                      break;
                    case "Asotin":
                      countyCode = "WAC003";
                      break;
                    case "Benton":
                      countyCode = "WAC005";
                      break;
                    case "Chelan":
                      countyCode = "WAC007";
                      break;
                    case "Clallam":
                      countyCode = "WAC009";
                      break;
                    case "Clark":
                      countyCode = "WAC011";
                      break;
                    case "Columbia":
                      countyCode = "WAC013";
                      break;
                    case "Cowlitz":
                      countyCode = "WAC015";
                      break;
                    case "Douglas":
                      countyCode = "WAC017";
                      break;
                    case "Ferry":
                      countyCode = "WAC019";
                      break;
                    case "Franklin":
                      countyCode = "WAC021";
                      break;
                    case "Garfield":
                      countyCode = "WAC023";
                      break;
                    case "Grant":
                      countyCode = "WAC025";
                      break;
                    case "Grays Harbor":
                      countyCode = "WAC027";
                      break;
                    case "Island":
                      countyCode = "WAC029";
                      break;
                    case "Jefferson":
                      countyCode = "WAC031";
                      break;
                    case "King":
                      countyCode = "WAC033";
                      break;
                    case "Kitsap":
                      countyCode = "WAC035";
                      break;
                    case "Kittitas":
                      countyCode = "WAC037";
                      break;
                    case "Klickitat":
                      countyCode = "WAC039";
                      break;
                    case "Lewis":
                      countyCode = "WAC041";
                      break;
                    case "Lincoln":
                      countyCode = "WAC043";
                      break;
                    case "Mason":
                      countyCode = "WAC045";
                      break;
                    case "Okanogan":
                      countyCode = "WAC047";
                      break;
                    case "Pacific":
                      countyCode = "WAC049";
                      break;
                    case "Pend Oreille":
                      countyCode = "WAC051";
                      break;
                    case "Pierce":
                      countyCode = "WAC053";
                      break;
                    case "San Juan":
                      countyCode = "WAC055";
                      break;
                    case "Skagit":
                      countyCode = "WAC057";
                      break;
                    case "Skamania":
                      countyCode = "WAC059";
                      break;
                    case "Snohomish":
                      countyCode = "WAC061";
                      break;
                    case "Spokane":
                      countyCode = "WAC063";
                      break;
                    case "Stevens":
                      countyCode = "WAC065";
                      break;
                    case "Thurston":
                      countyCode = "WAC067";
                      break;
                    case "Wahkiakum":
                      countyCode = "WAC069";
                      break;
                    case "Walla Walla":
                      countyCode = "WAC071";
                      break;
                    case "Whatcom":
                      countyCode = "WAC073";
                      break;
                    case "Whitman":
                      countyCode = "WAC075";
                      break;
                    case "Yakima":
                      countyCode = "WAC077";
                      break;
                    default:
                      countyCode = "invalidCounty";
                  }
                }
              }
            }
          }

          x.innerHTML = "<center>" + weatherLocation + "<br>Temp: " + temp + "°F<br>Humidity: " + humidity + "%<br>Condition: " + condition + "<br><br>";

          if (countyCode == "nonUS") {
            x.innerHTML += "<div class=\"box\"><div class=\"weather\">Unable to retrieve weather advisories for locations outside Washington state. Please select a county using the Search by County method. </div></div>";
          } else if (countyCode == "invalidCounty") {
            x.innerHTML += "<div class=\"box\"><div class=\"weather\">Unable to retrieve weather advisories for your county. Please try again or select a county using the Search by County method. </div></div>";
          } else {
            weatherURL = "https://alerts.weather.gov/cap/wwaatmget.php?x=" + countyCode + "&y=1";

            getText(weatherURL, function(err, data) {
              var parser;
              var xmlDoc;
              var eventNumber;
              var locations;

              if (err != null) {
                x.innerHTML += "<div class=\"box\"><div class=\"weather\">Error " + err + " when retrieving weather advisories. Please try again or select a county using the Search by County method. </div></div>";
              } else {
                // Parse the weather advisory XML
                parser = new DOMParser();
                xmlDoc = parser.parseFromString(data, "text/xml");

                // Find the total number of weather advisories + 1 (the header counts as an XML event)
                eventNumber = xmlDoc.getElementsByTagName("id").length;

                if (xmlDoc.getElementsByTagName("title")[1].childNodes[0].nodeValue == "There are no active watches, warnings or advisories") {
                  x.innerHTML += "<div class=\"box\"><div class=\"weather\"><center>There are no active watches, warnings, or advisories for " + countyAbbr + " County.</center>";
                } else {
                  // For each weather advisory, gather and print all information
                  // x.innerHTML = "<center>" + weatherLocation + "<br>Temp: " + temp + "°F<br>Humidity: " + humidity + "%<br>Condition: " + condition;
                  x.innerHTML += "<center> Showing weather advisories for your detected location of " + countyAbbr + " County. </center>";
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
          }
          showDropdown();
        }
      }
    });
  });
}

function showDropdown() {
  $("#countySelect").css("visibility", "visible");
  $("#search").css("visibility", "visible");
}

</script>
</body>
</html>

<?php wp_footer(); ?>
