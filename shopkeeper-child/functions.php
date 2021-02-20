<?php //Start building your awesome child theme functions

// ----------------------------------------
// shopkeeper-child functions
// ----------------------------------------
add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_styles', 99 );
function shopkeeper_enqueue_styles() {

    // enqueue parent styles
    wp_enqueue_style( 'shopkeeper-icon-font', get_template_directory_uri() . '/inc/fonts/shopkeeper-icon-font/style.css' );
	wp_enqueue_style( 'shopkeeper-styles', get_template_directory_uri() .'/css/styles.css' );
    wp_enqueue_style( 'shopkeeper-default-style', get_template_directory_uri() .'/style.css' );

    // enqueue child styles
    wp_enqueue_style( 'shopkeeper-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'shopkeeper-default-style' ),
        wp_get_theme()->get('Version')
    );

	// enqueue RTL styles
    if( is_rtl() ) {
    	wp_enqueue_style( 'shopkeeper-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array( 'shopkeeper-styles' ), wp_get_theme()->get('Version') );
    }
}

// ----------------------------------------
// shipping fee description start
// ----------------------------------------

add_action( 'woocommerce_after_shipping_rate', 'action_after_shipping_rate', 20, 2 );
function action_after_shipping_rate ( $method, $index ) {
	if ( 'flat_rate:4' === $method->id ) {
        echo __("<p class='shipping-fee-description'>This is an estimated shipping fee, please enter full delivery address to get accurate shipping fee.</p>");
    }
	
    //if( 'flat_rate:6' === $method->id ) {
    //    echo __("<p class='shipping-fee-description'>Delivered to your room of choice on any floor.</p>");
    //}
    if( 'flat_rate:11' === $method->id ) {
        echo __("<p class='shipping-fee-description'>Delivered to your room of choice on any floor and assembled.</p>");
    }
}

// ----------------------------------------
// shipping fee description end
// ----------------------------------------

// register a new widget area for single product page 
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => __( 'Single Product Widget Area', 'shopkeeper' ),
	'id'            => 'product-widget-area',
    'before_widget' => '<div class = "product-widget-container row large-12 xlarge-9 xxlarge-8">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

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
// 
// -------------------------------------------------
// /* Added by Afterpay 09/05/19 - Updated 22/05/19 */
/* Change priority/order of Afterpay instalment text */
if ( class_exists( 'WC_Gateway_Afterpay' ) ) {
remove_action( 'woocommerce_single_product_summary', array(WC_Gateway_Afterpay::getInstance(), 'print_info_for_product_detail_page'), 15, 0 );
add_action( 'woocommerce_single_product_summary', array(WC_Gateway_Afterpay::getInstance(), 'print_info_for_product_detail_page'), 1, 0 );
}

// ----------------------------------------
// add specification tab in product detail
// ----------------------------------------
if ( ! function_exists( 'woocommerce_product_specifications_tab' ) ) {
	/**
	 * Output the specifications tab content.
	 */
	function woocommerce_product_specifications_tab() {
		wc_get_template( 'single-product/tabs/specifications.php' );
	}
}

if ( ! function_exists( 'woocommerce_default_product_tabs' ) ) {

	/**
	 * Add default product tabs to product pages.
	 *
	 * @param array $tabs Array of tabs.
	 * @return array
	 */
	function woocommerce_default_product_tabs( $tabs = array() ) {
		global $product, $post;

		// Description tab - shows product content.
		if ( $post->post_content ) {
			$tabs['description'] = array(
				'title'    => __( 'Description', 'woocommerce' ),
				'priority' => 10,
				'callback' => 'woocommerce_product_description_tab',
			);
		}

		// Specifications tab - shows attributes.
		if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
			$tabs['specifications'] = array(
				'title'    => __( 'Specifications', 'woocommerce' ),
				'priority' => 20,
				'callback' => 'woocommerce_product_specifications_tab',
			);
		}
		
		return $tabs;
	}
}
// ----------------------------------------
// end of specification tab 
// ----------------------------------------

// ----------------------------------------
// Verification for Google Merchant
// ----------------------------------------
/* Describe what the code snippet does so you can remember later on */
add_action('wp_head', 'your_function_name');
function your_function_name(){
?>
<meta name="google-site-verification" content="39D1VYjm4AA_WFX7cj5R6OIpaN8u_2Ub2PeuzlQ0NDE" />
<?php
};