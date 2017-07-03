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

From the Wordpress dashboard, navigate to Media -> Library. Copy and paste all the media from the res folder into the Wordpress Media Library. Next, navigate to Appearance -> Themes -> Add New -> Upload Theme, and upload the compressed folder. Activate the theme and change the following:
# footer.php, header.php
Replace ABOUT_URL with the URL of your About page.

# page.php
Replace DIGITAL_GO_BAG_PAGE_ID, CEMP_PAGE_ID, EVENTS_PAGE_ID, KEY_PERSONNEL_PAGE_ID, FOCUS_GROUP_PAGE_ID, ABOUT_PAGE_ID, and WEATHER_PAGE_ID with their respective Wordpress page IDs. To find the page IDs, navigate to Settings -> Permalinks -> Plain. The Wordpress page ID is the number after "/?page_id=" on a page's URL.
