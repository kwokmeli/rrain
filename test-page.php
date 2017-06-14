<!-- TODO: Incorrectly linked API? -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php /*Template Name: test-page*/ ?>

<?php get_header(); ?>

<?php if ( is_front_page() ) { ?> <!-- CSS for index page -->
        <div class="blog-post-title"><?php echo get_post_field('post_content', $post->ID); ?></div>
<?php } else if ( is_page(102) ) { ?> <!-- CSS for Digital Go Bag page --> <!-- TODO: Switch out page ID -->
        <div class="dgobag"><?php echo get_post_field('post_content', $post->ID); ?></div>
<?php } else if ( is_page(133) ) { ?> <!-- CSS for CEMP page --> <!-- TODO: Switch out page ID -->
        <div class="box"><div class="cemp"><?php echo get_post_field('post_content', $post->ID); ?></div></div>
<?php } else { ?> <!-- CSS for submenu page -->
        <div class="sub-title"><?php echo get_post_field('post_content', $post->ID); ?></div>
<?php } ?>

<?php get_footer(); ?>
