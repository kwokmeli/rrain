<?php get_header(); ?>

<?php if ( is_front_page() ) { ?> <!-- CSS for index page -->
        <div class="blog-post-title">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php get_footer(); ?>
<?php } else if ( is_page(102) ) { ?> <!-- CSS for Digital Go Bag page -->
        <div class="dgobag">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php wp_footer(); ?>
<?php } else if (  is_page(133) || is_page(EVENTS_PAGE_ID) || is_page(KEY_PERSONNEL_PAGE_ID) || is_page(FOCUS_GROUP_PAGE_ID) ) { ?> <!-- CSS for CEMP, Events, Key Personnel, and Focus Group pages -->
        <div class="box">
          <div class="cemp">
            <?php echo get_post_field('post_content', $post->ID); ?>
          </div>
        </div>
        <?php wp_footer(); ?>
<?php } else if ( is_page(ABOUT_PAGE_ID) ) { ?> <!-- CSS for About page -->
        <div class="about">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php get_footer(); ?>
<?php } else { ?> <!-- CSS for submenu page -->
        <div class="sub-title">
          <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        <?php wp_footer(); ?>
<?php } ?>
