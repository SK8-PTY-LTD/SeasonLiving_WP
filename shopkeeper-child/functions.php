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