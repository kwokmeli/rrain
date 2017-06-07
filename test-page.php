<?php /*Template Name: test-page*/ ?>

<?php get_header(); ?>


<div class="blog-post-title"><?php echo get_post_field('post_content', $post->ID); ?>


<?php if (is_front_page()) {
  ?>
  <div class="static-thumbs">
  <img src="<?php bloginfo('template_directory'); ?>/res/cloud.png" /><br>
  </div>

<?php } ?>

</div>
<?php get_footer(); ?>
