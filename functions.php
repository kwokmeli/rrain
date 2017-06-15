<?php
// Add scripts and stylesheets
function rrain_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/test-css.css');
}

// Create Custom Settings page
function custom_settings_add_menu() {
	add_menu_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}

function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields('section');
			do_settings_sections('theme-options');
			submit_button();
			?>
<?php }

// Put in URL to 'About' page
function set_about() {?>
	<input type="text" name="about" id="about" value="<?php echo get_option('about'); ?>"/>
<?php }*/

function custom_settings_page_setup() {
	add_settings_section('section', 'All Settings', null, 'theme-options');
	add_settings_field('about', 'URL of About Page', 'set_about', 'theme-options', 'section');
	register_setting('section', 'about');
}

// Link post titles on homepage to custom URLs
/*function print_post_title() {
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
}*/

//add_theme_support('post-thumbnails', array('post', 'page'));
add_action('admin_menu', 'custom_settings_add_menu');
add_action('admin_init', 'custom_settings_page_setup');
add_action('wp_enqueue_scripts', 'rrain_scripts');
