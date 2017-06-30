<?php
// Add scripts and stylesheets
function rrain_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/main.css');
}

add_action('wp_enqueue_scripts', 'rrain_scripts');
