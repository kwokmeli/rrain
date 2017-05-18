<?php /*Template Name: about-page*/ ?>

<?php get_header(); ?>
<div class="header-selection"><?php echo get_the_title(); ?></div>

<center><a href="<?php bloginfo('wpurl');?>"><img src="https://testing.hsl.washington.edu/tisha/rrain-test-site/img/RRAIN_logo_rgb.png" style="width: 42%"/></a></center>
<div class="about-page">
<?php echo get_post_field('post_content', $post->ID); ?>

</div>

<center><div class="col-sm-3 col-centered">
				<a href="https://itunes.apple.com/us/app/rrain-washington/id977384631?mt=8" target="_blank"> <button> iOS VERSION </button> </a>
			</div>
			<div class="col-sm-3 col-centered">
				<a href="https://play.google.com/store/apps/details?id=edu.uwhsl.rrain&hl=en" target="_blank"> <button> ANDROID VERSION </button> </a>
			</div>
			<div class="col-sm-3 col-centered">
				<address> <a href="mailto:hslrrain@uw.edu" data-toggle="tooltip" title="Enable email settings to contact us at hslrrain@uw.edu"> <button> HELP AND SUPPORT </button> </a> </address>
</center>
<div class="header-spacing"></div>


<?php wp_footer(); ?>
