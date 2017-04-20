<div class="blog-post">
	<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<div class="featured_thumb">
	<?php if ( has_post_thumbnail() ) {?>


					<?php	the_post_thumbnail(); ?>
</div>
			<div class="col-md-6">

			</div><!-- /.blog-post -->
		</div>
		<?php } else { ?>
		<?php the_excerpt(); ?> <!-- shows first 55 words of post -->
		<?php } ?>
