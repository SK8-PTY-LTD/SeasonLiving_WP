<?php //Start building your awesome child theme functions

add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_styles', 100 );
function shopkeeper_enqueue_styles() {
    
    // enqueue parent styles
	wp_enqueue_style('shopkeeper-parent-styles', get_template_directory_uri() .'/style.css');

	// enqueue RTL styles
    if( is_rtl() ) {
    	wp_enqueue_style( 'shopkeeper-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array( 'shopkeeper-styles' ), wp_get_theme()->get('Version') );
    }
	add_filter( 'get_terms', 'wc_hide_selected_terms', 10, 3 );
}

//exclude uncategorized
function wc_hide_selected_terms( $terms, $taxonomies, $args ) {
	$new_terms = array();
	if ( in_array( 'product_cat', $taxonomies ) ){ //&& !is_admin() && is_shop() || is_page('furniture') ) {
		foreach ( $terms as $key => $term ) {
			  if ( ! in_array( $term->slug, array( 'uncategorized' ) ) ) {
				$new_terms[] = $term;
			  }
		}
		$terms = $new_terms;
	}
	return $terms;
}

// BEGIN DASHBOARD LOGO CUSTOMISATION
function wpb_custom_logo() {
	echo '
		<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				background-image: url(' . get_stylesheet_directory_uri() . '/images/custom-logo.png) !important;
				background-position: 0 0;
                color:rgba(0, 0, 0, 0);
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-custom-logoitem .ab-icon {
				background-position: 0 0;
			}
		</style>
	';
}
 
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// END DASHBOARD LOGO CUSTOMISATION 

// BEGIN LOGIN PAGE CUSTOMISATION 
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
            height:87px;
            width:206px;
            background-size: 206px 87px;
            background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
        #loginform {
            border-radius: 5px;
            box-shadow: 0 0 12px #767676;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// END LOGIN PAGE CUSTOMISATION 