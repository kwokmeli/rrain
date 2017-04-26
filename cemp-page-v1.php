<?php /*Template Name: cemp-v1-page*/ ?>

<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>

<div class="cemp-v1-box">
<div class="cemp-v1-title"><?php echo get_the_title(); ?></div>
<div class="pages">
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
?>
</div>
</div>
<?php get_footer(); ?>
</body>
</html>
