<!-- TODO: Incorrectly linked API? -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php get_header(); ?>
  <div class="row">

    <div class="col-sm-8 blog-main">
      <div class="header-spacing"></div>
      <?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() ); ?>
        <i class="material-icons">&#xe315;</i>
        <div class="divider"></div>
			<?php endwhile; endif;
			?>

      <!-- TODO: Allows you to add widgets. Not needed?-->
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("mainPageWidget") ) : ?>
      <?php endif;?>


      </div><!-- /.blog-main -->
    </div><!-- /.row -->
    <div class="header-spacing"></div>
<?php get_footer(); ?>
