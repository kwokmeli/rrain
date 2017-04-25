<div class="blog-post">
	<?php print_post_title();?>

	<div class="featured_thumb">
		<?php if ( has_post_thumbnail() ) {?>
						<?php	the_post_thumbnail(); ?>
					</div>

					<div class="col-md-6">
					</div> <!-- /.blog-post -->

</div>

		<?php } else { ?>
		<?php the_excerpt(); ?> <!-- shows first 55 words of post -->
		<?php } ?>
