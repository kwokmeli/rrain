<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?> /img/site-icon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <?php if (is_home()) {
      ?> <title> <?php echo get_bloginfo('name'); ?> </title>
      <div class="blog-title"><a href="<?php bloginfo('wpurl');?>"><?php echo get_bloginfo('name');?></a></div>
      <a href="<?php echo get_option('about')?>"><img id="index-header-logo" src="<?php bloginfo('template_directory'); ?> /img/icon-outline.png"/></a><?php
    } else {
      ?> <title> <?php echo get_the_title(); ?> </title>
      <div class="blog-title"><a href="<?php bloginfo('wpurl');?>"><?php echo get_bloginfo('name');?></a> &nbsp <div class="header-selection"><?php echo get_the_title(); ?></div></div>
      <a href="<?php echo get_option('about')?>"><img id="header-logo" src="<?php bloginfo('template_directory'); ?> /img/icon-outline.png"/></a>
      <?php
    } ?>

    <?php wp_head(); ?>
  </head>

  <body>
