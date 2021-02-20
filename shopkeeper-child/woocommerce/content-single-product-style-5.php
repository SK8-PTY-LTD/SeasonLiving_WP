<script>
jQuery(document).ready(function( $ ) {
	const mobileWidth = 1000;
	$(window).on('resize', function(){
		  var win = $(this);
		  if (win.width() > mobileWidth ) {
			  $(".expandable-panel>.expandable-content").show();
		  } else {
			  $(".expandable-panel>.expandable-content").hide();
		  }
	});
	
	$(".expandable-panel>.expandable-title").click(function(){
		if (window.innerWidth < mobileWidth) {
			$(this).parent().find(".expandable-content").slideToggle(400, function(){
				$(this).parent().find(".expandable-title .arrow").toggleClass("fa-plus").toggleClass("fa-minus")
			});
		}
		
		// expandable-panel > .expandable-title .arrow
	})
});
</script>

<style>
/* ------------- product page custom style -----------------*/
	
.flex-viewport {
	max-height: 70vh;
}

.product_layout_classic .product-images-wrapper .woocommerce-product-gallery {
	display: block;
}

.product_layout_classic .product-badges {
	margin-left: 20px;
}

.woocommerce div.product div.images {
	margin-bottom: 1rem;
}
	
.woocommerce div.product div.images .flex-control-thumbs {
	width: 100% !important;
}

.woocommerce div.product div.images .flex-control-thumbs li {
	width: auto !important;
	margin-right: 8px;
}

.product_layout_classic .product-images-wrapper .woocommerce-product-gallery ol.flex-control-thumbs li img {
	border-radius: 100%;
	width: 30px;
	height: 30px;
	border: 3px solid rgba(0,0,0,0.1);
}

.product_layout_classic .product-images-wrapper .woocommerce-product-gallery ol.flex-control-thumbs li img.flex-active {
	opacity: 1 !important;
	border: 3px solid #FF0000;
}

.product_layout_classic .product-images-wrapper .woocommerce-product-gallery .flex-viewport {
    width: 100% !important;
	margin-left: 0px;
	max-height: 100%;
}

.flex-control-nav.flex-control-thumbs {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	margin-top: 0.5rem !important;
	align-items: center;
    justify-content: center;
}

.content-area {
	padding-top: 0px;
}

*:focus {
    outline: none;
}

/* for single image */
.woocommerce div.product div.images img {
    display: block;
    width: 100%;
    height: auto;
	overflow: hidden;
    margin-left: auto;
    margin-right: auto;
    box-shadow: none;
}

/* after pay */
.wcppec-checkout-buttons.woo_pp_cart_buttons_div {
    border: none;
    background-color: rgba(200,200,200,0.2);
    padding: 35px 0 20px;
    margin: 0;
}

.product_infos > .afterpay-payment-info {
	text-align: center;
}
	
@media only screen and (max-width: 980px) {
	.content-area {
		padding-top: 50px;
	}
}

@media only screen and (max-width: 767px) {
	.wcppec-checkout-buttons.woo_pp_cart_buttons_div {
    	background-color: rgba(200,200,200,0);
	}

	.afterpay-payment-info {
		background-color: rgba(200,200,200,0);
	}
	
	/* slider images control */
	.product_layout_classic .product-images-wrapper .woocommerce-product-gallery ol.flex-control-thumbs li img {
		width: 0px;
		height: 0px;
	}
	
	/* breadcrumbs hidden for mobile */
	.product_layout_classic .product .product_content_wrapper .product_infos .product_summary_top {
		display: none;
	}
	
	/* align center product info in mobile */
	.product_infos, .product_infos .product_summary_middle h1.product_title.entry-title {
		text-align:center;
	}
}

@media only screen and (max-width: 635px) {	
	.content-area {
		padding-top: 40px;
	}
}
	
@media only screen and (min-width: 63.9375em) {
	.product_layout_classic div.product span.price, .product_layout_classic div.product p.price {
    	text-align: inherit !important;
	}
	
	#page_wrapper.transparent_header .content-area, #page_wrapper.sticky_header .content-area {
		padding-top: 142px;
	}
}

		
@media only screen and (max-width: 1024) {
	#page_wrapper.transparent_header .content-area, #page_wrapper.sticky_header .content-area {
		padding-top: 65px;
	}
	
}
	
/* ----------------------------------------- */
/* Style for product tabs and specification  */
	.woocommerce-tabs {
		background-color: #f3f3f3 !important;
		padding-top: 0px;
		margin: 0 auto;
	}

	.woocommerce-tabs > .row {
		background-color: #FFFFFF;
		padding: 0px;
	}

	.woocommerce-tabs > .row .columns {
		padding: 0px;
	}

	.woocommerce div.product ul.tabs {
		display: -webkit-box;
		display: flex;
		justify-content: space-around;
		margin-bottom:0px !important;
	}

	.woocommerce div.product ul.tabs li {
		display: inline-block !important;
		float:left;
		cursor: pointer;
		text-align: center;
		padding: 6px 5px 4px !important;
		width: 100%;	
		border-radius: 10px 10px 0 0 !important;
		margin-left: 0px !important;
		margin-right: 0px !important;
	}

	.woocommerce div.product ul.tabs li.active {
		color: #666;
		background: #f3f3f3 !important;	
		border-top-width: 0px !important;
	}

	.woocommerce-tabs .panel.entry-content {
		background: #f3f3f3;
		padding: 1rem !important;
	}

	/* Style for product tabs and specification  */
	.woocommerce table.shop_attributes {
		margin-top: 2rem !important;
		border-top-width: 0px !important;
		font-size: 0.8rem;
	}

	.woocommerce table.shop_attributes th.woocommerce-product-attributes-item__label {
		text-transform: uppercase;
		font-size: 0.8rem;
		width: 40%;
	}

	.woocommerce table.shop_attributes td.woocommerce-product-attributes-item__value {
		font-style: normal;
		font-size: 0.8rem;
		color: #666;
	}

	.product_layout_classic table.shop_attributes th, .product_layout_classic table.shop_attributes td {
		padding: 8px 0 8px 0 !important;
	}	

/* Style for product tabs and specification  */
/* ----------------------------------------- */
	
	
/* --------------------------- */
/* override afterpay style     */
.product_infos > .afterpay-payment-info {
	padding: 1rem;
}
	
.product_infos > #zip-tagline.zip-widget__wrapper>.zip-widget {
	border-left: 2px solid lightgray;
}

.product_infos > #zip-tagline.zip-widget__wrapper>.zip-widget, .product_infos > .afterpay-payment-info>span {
	padding: 1rem;
    display: block;
    margin: 1rem 0 1rem 0;
	text-align: center;
	min-height: 5.5rem;
}

.product_infos > .afterpay-payment-info, .product_infos > #zip-tagline.zip-widget__wrapper {
	border-top: 1px solid lightgray;
	border-bottom: 1px solid lightgray;
	width: 50%;
	margin: 1rem 0rem 1rem 0;
	height: 7.5rem;
}

.product_infos > .afterpay-payment-info {
	float: left;
}

.product_infos > .afterpay-payment-info>span  {
	padding: 0rem;	
}
	
.product_infos > #zip-tagline.zip-widget__wrapper {
	float: right;
	padding: 0px;
}
	
.yotpo {
	clear: none;	
}

.product_layout_classic .product_infos .yith-wcwl-add-to-wishlist {
	clear: both;
}

/* fav button align center */
.yith-wcwl-add-to-wishlist {
	text-align: center;
	width: 100%;
}
	
.yith-wcwl-add-to-wishlist .yith-wcwl-add-button {
	display: inline-block !important; 
}

.product_layout_classic .product_infos .yith-wcwl-add-to-wishlist:after {
	height: 0px !important;
}

.product_layout_classic .product_content_wrapper {
	padding-bottom: 1rem;
}

@media only screen and (max-width: 767px) {
	.product_infos > .afterpay-payment-info, .product_infos > #zip-tagline.zip-widget__wrapper {
		height: 10.5rem;
	}

	.product_infos > #zip-tagline.zip-widget__wrapper>.zip-widget, .product_infos > .afterpay-payment-info>span {
		min-height: 8.7rem;
	}
	
}
	
/* override afterpay style     */
/* --------------------------- */
	

/* --------------------------- */	
/* description layout */
.vc_section {
	margin-bottom: 2em;
}

.vc_text_container {
	padding-top: 2em;
	padding-bottom: 2em;
}

.row.vc_row-flex {
    box-sizing: border-box;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}

.row.vc_row-o-equal-height>.vc_column_container{
    -webkit-box-align:stretch;
    -webkit-align-items:stretch;
    -ms-flex-align:stretch;
    align-items:stretch
}

.row.vc_row-flex>.vc_column_container {
    display: flex;
}

.row.vc_row-o-content-middle>.vc_column_container>.vc_column-inner {
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
	-webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    z-index: 1;
}

/* description layout */
/* --------------------------- */	
</style>

<?php
 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
    global $post, $product, $shopkeeper_theme_options;

    //woocommerce_before_single_product
	//nothing changed
	
	//woocommerce_before_single_product_summary
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	
	add_action( 'woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10 );
	add_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );
	
	//woocommerce_single_product_summary
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	
	add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
	add_action( 'woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50 );
	
	//woocommerce_after_single_product_summary
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	
	add_action( 'woocommerce_after_single_product_summary_data_tabs', 'woocommerce_output_product_data_tabs', 10 );

	//woocommerce_after_single_product
	//nothing changed

	//custom actions
	add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20, 0 );

	if(class_exists('WC_Wishlists_Plugin')) {
		remove_action('woocommerce_single_product_summary', array($GLOBALS['wishlists'], 'bind_wishlist_button'), 0);
		add_action('woocommerce_single_product_summary_single_add_to_cart', array($GLOBALS['wishlists'], 'bind_wishlist_button'), 0);
	}

?>

<div class="product_layout_classic">

	<?php if ( !post_password_required() ) : ?>

		<div  id="product-<?php the_ID(); ?>" <?php function_exists('wc_product_class')? wc_product_class() : post_class(); ?>>
			
			<div class="row">
		        <div class="large-12 xlarge-10 xxlarge-9 large-centered columns">     
					<div class="product_content_wrapper">
						
						<?php do_action( 'woocommerce_before_single_product' ); ?>
					
						<div class="row">
							
							<div class="large-12 medium-12 columns">
								<div class="product-images-wrapper">

									<?php				
										do_action( 'woocommerce_before_single_product_summary_product_images' );
										do_action( 'woocommerce_before_single_product_summary' );
									?>

									<div class="product-badges">
										<!-- sale -->
										<div class="product-sale">
												<?php do_action( 'woocommerce_before_single_product_summary_sale_flash' ); ?>
										</div>

									</div>

								</div>

							</div>
							
							<!-- .columns -->
							
							<?php
							
							$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
							$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
							
							?>
							
							
							<div class="large-12 xlarge-12 xxlarge-12 large-push-0 columns">
							
								<div class="product_infos">
									
									 <div class="product_summary_top">

									 	<?php do_action('woocommerce_before_main_content_breadcrumb');

									 		if ( !((isset($shopkeeper_theme_options['review_tab'])) && ($shopkeeper_theme_options['review_tab'] == "0" )) ) : 
											do_action( 'woocommerce_single_product_summary_single_rating' );
											endif;	
											
									 	 ?>

									 </div>
									<!-- for single product -->
									<div class='row'>
										<div class="large-12 xlarge-6 xxlarge-6 columns">
											<div class="product_summary_middle">
												<?php

													do_action( 'woocommerce_single_product_summary_single_title' );

													if ( post_password_required() ) {
														echo get_the_password_form();
														return;
													}
												?>
											</div><!--.product_summary_top-->
										</div>
										<div class="large-12 xlarge-6 xxlarge-6 columns large-text-right">
											<?php do_action( 'woocommerce_single_product_summary_single_price' ); ?>
										</div>
									</div>
									<!-- end of single product -->
										<?php if( GETBOWTIED_GERMAN_MARKET_IS_ACTIVE ) : ?>
											<div class="german-market-info">
												<?php do_action( 'woocommerce_single_product_german_market_info' ); ?>
											</div>
										<?php elseif( GETBOWTIED_WOOCOMMERCE_GERMANIZED_IS_ACTIVE ) : ?>
											<div class="germanized-active">
												<?php do_action( 'woocommerce_single_product_germanized_info' ); ?>
											</div>
										<?php endif; ?>

									<?php
										do_action( 'woocommerce_single_product_summary_single_excerpt' ); ?>
											
										<!-- out of stock --> 
                                       <?php if ( (isset($shopkeeper_theme_options['catalog_mode'])) && ($shopkeeper_theme_options['catalog_mode'] == 0) ) : ?> 
                                           <?php if ( !$product->is_in_stock() && !empty($shopkeeper_theme_options['out_of_stock_label']) ) : ?>    
                                                   <div class="out_of_stock_wrapper">          
                                                       <div class="out_of_stock_badge_single <?php if (!$product->is_on_sale()) : ?>first_position<?php endif; ?>"><?php _e( $shopkeeper_theme_options['out_of_stock_label'], 'woocommerce' ); ?> 
                                                            
                                                       </div>    
                                                   </div>          
                                           <?php endif; ?> 
                                       <?php endif; ?> 

										<!-- single product add to card -->
										<?php
										do_action( 'woocommerce_single_product_summary_single_add_to_cart' );
										do_action( 'woocommerce_single_product_summary' );
										do_action( 'getbowtied_woocommerce_before_single_product_summary_data_tabs' ); 
										do_action( 'woocommerce_single_product_summary_single_meta' ); 
										?>
								
								</div>
					
							</div><!-- .columns -->

							<div class="large-1 columns show-for-large-only">&nbsp;</div>
								   
						</div><!-- .row -->
						
					</div><!--.product_content_wrapper-->
			
			   </div><!--large-9-->
		    </div><!-- .row -->
			
			<?php do_action( 'woocommerce_after_single_product_summary_data_tabs' ); ?>
			
		    <div class="row">
		        <div class="large-9 large-centered columns">
		            <?php					
						do_action( 'woocommerce_single_product_summary_single_sharing' );
						do_action( 'woocommerce_after_single_product_summary' );
					?>
		            
		        </div><!-- .columns -->
		    </div><!-- .row -->
		    
		    <meta itemprop="url" content="<?php the_permalink(); ?>" />
			
			<?php if ( is_active_sidebar( 'product-widget-area' ) ) : ?>
				<div class="shop_sidebar wpb_widgetised_column">
					<?php dynamic_sidebar( 'product-widget-area' ); ?>
				</div>
			<?php endif; ?>
		</div><!-- #product-<?php the_ID(); ?> -->

		<div class="row">
		    <div class="xlarge-9 xlarge-centered columns">

				<?php do_action( 'woocommerce_after_single_product' ); ?>
				
		    </div><!-- .columns -->
		</div><!-- .row -->		
		
		<!-- product navigation -->
		<div class="product_navigation">

		   <?php shopkeeper_product_nav( 'nav-below' ); ?>

	   </div> 



		<?php if ( $product->get_upsell_ids() ) : ?>
			<div class="single_product_summary_upsell">
			    <div class="row">
					<div class="xlarge-9 xlarge-centered columns">
						<?php do_action( 'woocommerce_after_single_product_summary_upsell_display' ); ?>
					</div><!--.large-9-->
			    </div><!-- .row -->         
			</div><!-- .single_product_summary_upsell -->
		<?php endif; ?>


		<div class="single_product_summary_related">
		    <div class="row">
				<div class="xlarge-9 xlarge-centered columns">
					<?php do_action( 'woocommerce_after_single_product_summary_related_products' ); ?>
				</div><!--.large-9-->
		    </div><!-- .row -->
		</div><!-- .single_product_summary_related -->

				
	<?php else: ?>

		<div class="row">
		    <div class="large-9 large-centered columns">
		    <br/><br/><br/><br/>
				<?php echo get_the_password_form(); ?>
			</div>
		</div>

	<?php endif; ?>
	


</div>
