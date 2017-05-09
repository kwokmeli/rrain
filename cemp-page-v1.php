<?php /*Template Name: cemp-v1-page*/ ?>

<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>

<div class="header-spacing"></div>
<div class="weather">
  <div class="header-spacing"></div>
<div class="cemp-v1-title"><?php echo get_the_title(); ?></div>
<div class="cemp-v1-content">
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
?>
<div class="header-spacing"></div>
</div>
</div>
<div class="header-spacing"></div>
<?php get_footer(); ?>
</body>
</html>
