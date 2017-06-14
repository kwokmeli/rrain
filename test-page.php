<?php /*Template Name: test-page*/ ?>

<?php get_header(); ?>

<?php if ( is_front_page() ) { ?> <!-- CSS for index page -->
        <div class="blog-post-title">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>

        <!-- <br>
        <div class="container">
          <div class="images">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/cloud.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/car.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/map.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/tree.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/headphone.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/waves.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/earthquake.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/users.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/radiation.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/bag.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/wa.png"/><br class="main"><br class="main">
            <img class="images" src="<?php bloginfo('template_directory'); ?>/res/cityhall.png"/><br class="main"><br class="main">
          </div>

          <div class="text">
            <a href="">WA Weather Alerts</a><br class="main"><hr class="index"/><br>
            <a href="">WA Traffic Map</a><br class="main"><hr class="index"/><br>
            <a href="">NWCC Fire Map</a><br class="main"><hr class="index"/><br>
            <a href="">Fire Resources</a><br class="main"><hr class="index"/><br>
            <a href="">Command Center</a><br class="main"><hr class="index"/><br>
            <a href="">WA Flood Map</a><br class="main"><hr class="index"/><br>
            <a href="">Earthquakes</a><br class="main"><hr class="index"/><br>
            <a href="">Infectious Diseases</a><br class="main"><hr class="index"/><br>
            <a href="">NLM Chemical and Radiation</a><br class="main"><hr class="index"/><br>
            <a href="">Digital Go Bag</a><br class="main"><hr class="index"/><br>
            <a href="">WA State Emergency Plan</a><br class="main"><hr class="index"/><br>
            <a href="">County Emergency Management Plans (CEMP)</a><br class="main"><hr class="index"/><br>
          </div>

        </div>
        <br>
      -->

        <?php get_footer(); ?>
<?php } else if ( is_page(102) ) { ?> <!-- CSS for Digital Go Bag page --> <!-- TODO: Switch out page ID -->
        <div class="dgobag">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php wp_footer(); ?>
<?php } else if ( is_page(133) || is_page(158) ) { ?> <!-- CSS for CEMP, Events, Key Personnel, and Focus Group pages --> <!-- TODO: Switch out page ID -->
        <div class="box">
          <div class="cemp">
            <?php echo get_post_field('post_content', $post->ID); ?>
          </div>
        </div>
        <?php wp_footer(); ?>
<?php } else if ( is_page(147) ) { ?> <!-- CSS for About page --> <!-- TODO: Switch out page ID -->
        <div class="about">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php get_footer(); ?>
<?php } else if ( is_page(161) ) { ?>
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
              print("<div class=\"weather\"><h2>".$event."</h2><p>".$description."</p></div>"   );
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
             ?> <div class="weather"> <?php
             $item_url=$entry->id;
             $item_title=$entry->title;
             $item_publish=$entry->published;
             $item_updated=$entry->updated;
             $item_summary=$entry->summary;
             $item_area=$entry->children("cap", true)->areaDesc;
             $item_area = str_replace(";", "<br />", $item_area);
             echo "<div class=\"box\">";
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
        wp_footer();
        ?>

<?php } else { ?> <!-- CSS for submenu page -->
        <div class="sub-title">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php wp_footer(); ?>
<?php } ?>
