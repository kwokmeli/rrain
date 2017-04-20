<?php
// Add scripts and stylesheets
function rrain_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/blog.css');
}

add_theme_support( 'post-thumbnails' );
add_action('wp_enqueue_scripts', 'rrain_scripts');
