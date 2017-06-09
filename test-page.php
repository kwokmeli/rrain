<!-- TODO: Incorrectly linked API? -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php /*Template Name: test-page*/ ?>

<?php get_header(); ?>

<?php if ( is_front_page() ) { ?>
  <div class="blog-post-title"><?php echo get_post_field('post_content', $post->ID); ?></div>
<?php } else { ?>
  <div class="sub-title"><?php echo get_post_field('post_content', $post->ID); ?></div>
<?php } ?>

<?php get_footer(); ?>
