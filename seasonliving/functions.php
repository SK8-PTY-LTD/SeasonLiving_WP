<?php
/*************************** Custom Functions Start Here *********************************/


/**************************** Custom Functions End Here **********************************/

//Enqueue Parent Theme Style
add_action( 'wp_enqueue_scripts', 'tvlgiao_wpdance_enqueue_parent_styles' );
if( !function_exists('tvlgiao_wpdance_enqueue_parent_styles') ){
	function tvlgiao_wpdance_enqueue_parent_styles() {
	   wp_enqueue_style( 'wd-parent-theme-style', get_template_directory_uri().'/style.css' );
	}
}

require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sk8tech_register_required_plugins' );

function sk8tech_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'Akismet',
			'slug'      => 'akismet',
			'required'  => false,
		),
		array(
			'name'      => 'Bulletproof security - for security',
			'slug'      => 'bulletproof-security',
			'required'  => false,
		),
		array(
			'name'      => 'Wordfence Security - For security',
			'slug'      => 'wordfence',
			'required'  => false,
		),
		array(
			'name'      => 'UpdraftPlus - Backup/Restore - For automatic backup (Secondary)',
			'slug'      => 'updraftplus',
			'required'  => false,
		),
		array(
			'name'      => 'User Activity Log - for logging changes by each user in the wordpress system',
			'slug'      => 'user-activity-log',
			'required'  => false,
		),
		array(
			'name'      => 'Cloudflare - for DNS management',
			'slug'      => 'cloudflare',
			'required'  => false,
		),
		array(
			'name'      => 'Velvet Blue Update URL - For update URL',
			'slug'      => 'velvet-blues-update-urls',
			'required'  => false,
		),
		array(
			'name'      => 'WP Migrate DB - For update DB',
			'slug'      => 'wp-staging',
			'required'  => false,
		),
		array(
			'name'      => 'ewww image optimizer - for reducing img size (not resolution), for faster loading',
			'slug'      => 'ewww-image-optimizer',
			'required'  => false,
		),
		array(
			'name'      => 'W3TC',
			'slug'      => 'w3-total-cache',
			'required'  => false,
		),
		array(
			'name'      => 'Duplicate Post',
			'slug'      => 'duplicate-post',
			'required'  => false,
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
		array(
			'name'      => 'Google XML Sitemaps',
			'slug'      => '',
			'required'  => false,
		)
	);

	tgmpa( $plugins, $config );
}