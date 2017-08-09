## Setup
Zip the following files into a compressed folder:
- css
- img
- footer.php
- functions.php
- header.php
- index.php
- page.php
- screenshot.png
- style.css
- traffic.php
- weather.php

From the Wordpress dashboard, navigate to Media -> Library. Copy and paste all the media from the res folder into the Wordpress Media Library. Next, navigate to Appearance -> Themes -> Add New -> Upload Theme, and upload the compressed folder. Activate the theme and change the following:
### footer.php, header.php
Replace ABOUT_PAGE_URL with the URL of your About page.

### page.php
Replace DIGITAL_GO_BAG_PAGE_ID, CEMP_PAGE_ID, EVENTS_PAGE_ID, KEY_PERSONNEL_PAGE_ID, FOCUS_GROUP_PAGE_ID, ABOUT_PAGE_ID, and WEATHER_PAGE_ID with their respective Wordpress page IDs. To find the page IDs, navigate to Settings -> Permalinks -> Plain. The Wordpress page ID is the number after "/?page_id=" on a page's URL.

## Finding Weather Advisories via Geolocation
Using the Weather template (not the default), users will be able to have their location automatically detected via HTML5's Geolocation function. Weather advisories for their Washington State county will be provided. Alternatively, users have the option to view weather advisories by selecting a Washington State county from a list.
- Safari users should ensure that Wi-Fi is enabled on their device in order for their location to be accurately detected

## Finding Traffic Maps via Geolocation
Using the Traffic template (not the default), users will be able to have their location automatically detected via HTML5's Geolocation function. A Google Maps traffic map tailored to their current GPS coordinates will be provided.
