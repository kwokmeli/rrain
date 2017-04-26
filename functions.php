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

// Link post titles on homepage to custom URLs
function print_post_title() {
	global $post;
	$thePostID = $post->ID;
	$post_id = get_post($thePostID);
	$title = $post_id->post_title;
	$perm = get_permalink($post_id);
	$post_keys = array();
	$post_val = array();
	$post_keys = get_post_custom_keys($thePostID);

	if (!empty($post_keys)) {
		foreach ($post_keys as $pkey) {
			if ($pkey == 'external_url') {
				$post_val = get_post_custom_values($pkey);
			}
		}
		if (empty($post_val)) {
			$link = $perm;
		} else {
			$link = $post_val[0];
		}
	} else {
		$link = $perm;
	}
	echo '<h2 class="blog-post-title"><a href="'.$link.'" rel="bookmark" title="'.$title.'">'.$title.'</a></h2>';
}

add_theme_support('post-thumbnails', array('post', 'page'));
add_action('wp_enqueue_scripts', 'rrain_scripts');
add_action('widgets_init', 'arphabet_widgets_init');
