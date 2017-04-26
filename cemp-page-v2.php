<?php /*Template Name: cemp-v2-page*/ ?>

<?php get_header(); ?>
<div class="header-selection"><?php echo get_the_title(); ?></div>
<div class="header-spacing"></div>
<div class="pages">
<?php echo get_post_field('post_content', $post->ID); ?>
</div>


<div class="header-spacing"></div>


<?php get_footer(); ?>
