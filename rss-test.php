<?php /*Template Name: weather-page-v2*/ ?>

<?php /*
Author: Kerry Kirk
Description: Web scraper to obtain WA weather data.
*/ ?>

<?php get_header(); ?>

<?php
date_default_timezone_set('America/Los_Angeles');
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
$listurl="https://alerts.weather.gov/cap/wa.php?x=1";

function cap_parse($url){
   $xml = file_get_contents($url, false);
   $xml = simplexml_load_string($xml);
   $event = $xml->info->event;
   $description=$xml->info->description;
   $effective=strtotime($xml->info->effective);
   $expires=strtotime($xml->info->expires);
   //Get current time
   $time = time();
   //Test to see if current time is between effective time and expire time
   if (($time > $effective) && ($time < $expires)) {
      //If true, print HTML using event and description info
      print("<div class=\"weather-alert\"><h2>".$event."</h2><p>".$description."</p></div>"   );
   }
}

function my_xml_parse($url){
   //Load XML File and get values
   $xml = file_get_contents($url, false);
   $xml = simplexml_load_string($xml);
//   echo $xml->count()."<br />";
//   $xml = simplexml_load_file($url);
   foreach ($xml->entry as $entry){
  //   echo $entry->count();
     ?> <div class="weather"> <div class="cemp-v1-content"> <?php
     $item_url=$entry->id;
     $item_title=$entry->title;
     $item_publish=$entry->published;
     $item_updated=$entry->updated;
     $item_summary=$entry->summary;
     $item_area=$entry->children("cap", true)->areaDesc;
     $item_area = str_replace(";", "<br />", $item_area);
     echo "<div class=\"weatherbox\">";
     if($item_area != ""){
       echo "<h4>$item_area</h4>";
     }

//     echo "<h5><a href=\"http://rrain.org/?page_id=129&url='$item_url'\"><strong>$item_title</strong></a></h5>";
     echo "<h5><a href=\"$item_url\"><strong>$item_title</strong></a></h5>";
//     echo "<strong>$item_title</strong><br />";
     echo "<strong>Published:</strong> $item_publish | <strong>Updated:</strong> $item_updated<br />";
     echo $item_summary."</div>";
     ?> </div> </div> <?php
   }
//   echo "<pre>";
//   print_r($xml);
//   echo "</pre>";
}


my_xml_parse($listurl);
?>

<div class="header-spacing"></div>

<?php wp_footer(); ?>
