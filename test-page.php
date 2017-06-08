<!-- TODO: Incorrectly linked API? -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php /*Template Name: test-page*/ ?>

<?php get_header(); ?>

<?php if (is_front_page()) {
  ?>
  <div class="st1">
  <img src="<?php bloginfo('template_directory'); ?>/res/cloud.png" /><br>
  </div>

  <div class="st2">
  <img src="<?php bloginfo('template_directory'); ?>/res/car.png" /><br>
  </div>
  <div class="st3">
  <img src="<?php bloginfo('template_directory'); ?>/res/map.png" /><br>
  </div>
  <div class="st4">
  <img src="<?php bloginfo('template_directory'); ?>/res/tree.png" /><br>
</div>
  <div class="st5">
  <img src="<?php bloginfo('template_directory'); ?>/res/headphone.png" /><br>
</div>
  <div class="st6">
  <img src="<?php bloginfo('template_directory'); ?>/res/waves.png" /><br>
</div>
  <div class="st7">
  <img src="<?php bloginfo('template_directory'); ?>/res/earthquake.png" /><br>
</div>
  <div class="st8">
  <img src="<?php bloginfo('template_directory'); ?>/res/users.png" /><br>
</div>
  <div class="st9">
  <img src="<?php bloginfo('template_directory'); ?>/res/radiation.png" /><br>
</div>
  <div class="st10">
  <img src="<?php bloginfo('template_directory'); ?>/res/bag.png" /><br>
</div>
  <div class="st11">
  <img src="<?php bloginfo('template_directory'); ?>/res/wa.png" /><br>
</div>
  <div class="st12">
  <img src="<?php bloginfo('template_directory'); ?>/res/cityhall.png" /><br>
</div>


<?php } ?>
<div class="blog-post-title"><?php echo get_post_field('post_content', $post->ID); ?></div>





<?php get_footer(); ?>
