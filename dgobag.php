<?php /*Template Name: dgobag-page*/ ?>

<!-- TODO: Incorrectly linked API? -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php get_header(); ?>

<?php if ( get_field('sub-menu_title_1') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_1');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_1'); ?>> <?php the_field('sub-menu_title_1'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_1'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-1') !== "" ) { ?>
    <a href=<?php the_field('ios-1'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-1') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-1') !== "" ) { ?>
    <a href=<?php the_field('android-1'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<?php if ( get_field('sub-menu_title_2') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_2');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_2'); ?>> <?php the_field('sub-menu_title_2'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_2'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-2') !== "" ) { ?>
    <a href=<?php the_field('ios-2'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-2') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-2') !== "" ) { ?>
    <a href=<?php the_field('android-2'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<?php if ( get_field('sub-menu_title_3') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_3');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_3'); ?>> <?php the_field('sub-menu_title_3'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_3'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-3') !== "" ) { ?>
    <a href=<?php the_field('ios-3'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-3') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-3') !== "" ) { ?>
    <a href=<?php the_field('android-3'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<?php if ( get_field('sub-menu_title_4') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_4');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_4'); ?>> <?php the_field('sub-menu_title_4'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_4'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-4') !== "" ) { ?>
    <a href=<?php the_field('ios-4'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-4') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-4') !== "" ) { ?>
    <a href=<?php the_field('android-4'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<?php if ( get_field('sub-menu_title_5') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_5');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_5'); ?>> <?php the_field('sub-menu_title_5'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_5'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-5') !== "" ) { ?>
    <a href=<?php the_field('ios-5'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-5') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-5') !== "" ) { ?>
    <a href=<?php the_field('android-5'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<?php if ( get_field('sub-menu_title_6') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_6');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_6'); ?>> <?php the_field('sub-menu_title_6'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_6'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-6') !== "" ) { ?>
    <a href=<?php the_field('ios-6'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-6') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-6') !== "" ) { ?>
    <a href=<?php the_field('android-6'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<?php if ( get_field('sub-menu_title_7') !== "" ) { ?>
  <div class="dgobag-image"><img src=<?php the_field('sub-menu_image_7');?>></div>
  <div class="dgobag-info"><a href=<?php the_field('sub-menu_link_7'); ?>> <?php the_field('sub-menu_title_7'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_7'); ?></div></div>
  <div class="dgobag-buttons">
  <br>

  <?php if ( get_field('ios-7') !== "" ) { ?>
    <a href=<?php the_field('ios-7'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-ios.png" style="border: #ffffff 3px double"></a>
    <?php if ( !(get_field('android-7') !== "") ) { ?>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if ( get_field('android-7') !== "" ) { ?>
    <a href=<?php the_field('android-7'); ?>><img src="<?php bloginfo('template_directory'); ?> /img/download-android.png"></a></div>
  <?php } ?>

  <div class="dgobag-icons"><i class="material-icons" style="margin-top: -50px">&#xe315;</i></div>
  <br>
  <div class="sub-menu_divider"></div>
<?php } ?>



<br>

</div>
<div class="header-spacing"></div>


<?php wp_footer(); ?>
