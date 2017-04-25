<?php
// Add scripts and stylesheets
function rrain_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/blog.css');
}

// Add widgets area
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'mainPageWidget',
    'before_widget' => '<div class = mainPageWidgetArea>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

add_theme_support('post-thumbnails', array('post', 'page'));
add_action('wp_enqueue_scripts', 'rrain_scripts');
add_action('widgets_init', 'arphabet_widgets_init');
