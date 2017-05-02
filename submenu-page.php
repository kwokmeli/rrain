<?php /*Template Name: submenu-page*/ ?>

<!-- TODO: Incorrectly linked API? -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php get_header(); ?>
<div class="header-selection"><?php echo get_the_title(); ?></div>
<div class="header-spacing"></div>
<div class="pages">
<?php echo get_post_field('post_content', $post->ID); ?>
</div>

<div class="blog-post-title">

<?php if ( get_field('sub-menu_title_1') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_1'); ?>> <?php the_field('sub-menu_title_1'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_1'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>


<?php if ( get_field('sub-menu_title_2') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_2'); ?>> <?php the_field('sub-menu_title_2'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_2'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>

<?php if ( get_field('sub-menu_title_3') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_3'); ?>> <?php the_field('sub-menu_title_3'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_3'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>

<?php if ( get_field('sub-menu_title_4') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_4'); ?>> <?php the_field('sub-menu_title_4'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_4'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>

<?php if ( get_field('sub-menu_title_5') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_5'); ?>> <?php the_field('sub-menu_title_5'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_5'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>

<?php if ( get_field('sub-menu_title_6') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_6'); ?>> <?php the_field('sub-menu_title_6'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_6'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>


<?php if ( get_field('sub-menu_title_7') !== "" ) { ?>
  <a href=<?php the_field('sub-menu_link_7'); ?>> <?php the_field('sub-menu_title_7'); ?> </a>
  <br><?php the_field('sub-menu_excerpt_7'); ?>
  <i class="material-icons">&#xe315;</i>
  <div class="divider"></div>
  <br><br>
<?php } ?>


</div>
<div class="header-spacing"></div>


<?php wp_footer(); ?>
