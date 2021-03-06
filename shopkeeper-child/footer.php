<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  crossorigin="anonymous"/>
<style>
#wpadminbar #wp-admin-bar-wpseo-menu {
	display:none;
}

/*-------------------*/
/* footer options    */
#site-footer
{
	background: #828282;
}

#site-footer,
#site-footer .copyright_text a
{
	color: #fcfcfc;
}

#site-footer .site-footer-widget-area h3.widget-title,
#site-footer .footer-links ul li a,
#site-footer .footer-links ul li span {
	color: #fcfcfc;
}

.footer_socials_wrapper ul.sk_social_icons_list li svg,
.site-footer-widget-area ul.sk_social_icons_list li svg
{
	fill: #fcfcfc;
}

/*-------------------*/
/* mobile menu       */
	
.mobile-navigation {
    padding: 5px 0 0 0;
}

.mobile-navigation-logo {
	margin-top: -5px;
}
	
.off-canvas.position-right.is-open {
	width: 100% !important;
}
	
.menu-close {
    padding: 16px 16px 9px 8px;
    background-color: white;
}

.mobile-navigation.primary-navigation a {
	color: #828282 !important;
	min-height: 20px;
}

.mobile-navigation > ul > li{
    border-bottom: 2px solid #ffffff !important;
}

.mobile-navigation > ul > li:last-child {
	border-bottom: 2px solid #f3f3f3 !important;
}
	
.mobile-navigation ul .sub-menu.open li.menu-item-has-children > a {
	margin-top: 5px !important;
}


/* mobile menu widget */
.d-flex {
	display: -webkit-box; 
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex; 
	display: flex;
}
	
.flex-center {
	align-items: center;
    justify-content: center;
}

.off-canvas .mobile-menu-widget-element {
	text-align:center;
	padding: 0 20px 0 20px;
}

.off-canvas .wpb_widgetised_column .widget .mobile-menu-widget-element a.side-menu-link:not(.button) {
	text-decoration: none !important;
	color: #828282 !important;
}
	
.off-canvas .wpb_widgetised_column .widget .mobile-menu-widget-element a.side-menu-link:not(.button) .title {
	padding-top:5px;
	color: #828282 !important;
}
	
.offcanvas_content_right .shop_sidebar .widget.widget_custom_html {
	padding-top: 20px;
}
	

/* mobile menu       */
/*-------------------*/
</style>
					<?php global $page_id, $woocommerce, $shopkeeper_theme_options; ?>
                    
                    <?php

                    $page_footer_option = "on";
					
					if (get_post_meta( $page_id, 'footer_meta_box_check', true )) {
						$page_footer_option = get_post_meta( $page_id, 'footer_meta_box_check', true );
					}

					if (class_exists('WooCommerce')) {
						if (is_shop() && get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'footer_meta_box_check', true )) {
							$page_footer_option = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'footer_meta_box_check', true );
						}
					}
					
					?>
					
					<?php if ( $page_footer_option == "on" ) : ?>
                    

                    <footer id="site-footer" role="contentinfo">
						<div class='large-9 large-centered columns footer-logo text-center'>
							<a href="https://seasonliving.com.au/" rel="home">
								<img alt="SeasonLiving" src='https://seasonliving.com.au/wp-content/uploads/2019/07/logo-white.png' />
							</a>
						</div>
						
                        <div class='large-9 large-centered columns footer-social-media'>
							<?php do_action( 'footer_socials'); ?>	
						</div>
						
                    	 <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
						 
							<div class="trigger-footer-widget-area">
								<span class="trigger-footer-widget spk-icon-load-more"></span>
							</div>
						
							<div class="site-footer-widget-area">
								<div class="row">
									<?php dynamic_sidebar( 'footer-widget-area' ); ?>
								</div><!-- .row -->
							</div><!-- .site-footer-widget-area -->
                        
						<?php endif; ?>
                        
                        <div class="site-footer-copyright-area">
                            <div class="row">
								<div class="large-12 columns">
									<!--
									<?php do_action( 'footer_socials'); ?>
                                	-->
									<nav class="footer-navigation-wrapper" role="navigation">                    
										<?php 
											wp_nav_menu(array(
												'theme_location'  => 'footer-navigation',
												'fallback_cb'     => false,
												'container'       => false,
												'depth' 		  => 1,
												'items_wrap'      => '<ul class="%1$s">%3$s</ul>',
											));
										?>           
									</nav><!-- #site-navigation -->   
								
                                    <div class="copyright_text">
                                    	<?php
											echo do_shortcode(
												wp_kses(
													__( Shopkeeper_Opt::getOption( 'footer_copyright_text' ), 'shopkeeper' ),
													array(
														'a'      => array(
															'href'   => array(),
															'title'  => array(),
															'target' => array(),
														),
														'br'     => array(),
														'em'     => array(),
														'strong' => array(),
														'img'    => array(
															'alt'               => array(),
															'src'               => array(),
															'title'             => array(),
															'width'             => array(),
															'height'            => array(),
															'referrerpolicy'    => array(),
															'crossorigin'       => array(),
														),
													)
												)
											);
											?>
									</div><!-- .copyright_text -->
                            
								</div><!--.large-12-->
							</div><!-- .row --> 
                        </div><!-- .site-footer-copyright-area -->
                               
                    </footer>
                    
                    <?php endif; ?>
                    
                </div><!-- #page_wrapper -->
                        
             </div><!--</st-content -->     
        
        <?php if (class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce() ))) : ?>
        <div class="off-canvas-wrapper">	
        	<div class="off-canvas <?php echo is_rtl() ? 'position-right' : 'position-left' ?> <?php echo ( is_active_sidebar( 'catalog-widget-area' ) && ( isset($shopkeeper_theme_options['sidebar_style']) && ( $shopkeeper_theme_options['sidebar_style'] == "0" ) ) ) ? 'hide-for-large':''; ?> <?php echo ( is_active_sidebar( 'catalog-widget-area' ) ) ? 'shop-has-sidebar':''; ?>" id="offCanvasLeft1" data-off-canvas>

        		<div class="menu-close hide-for-large">
					<div class='float-left'>
						<img class="sticky-logo mobile-navigation-logo" src="https://seasonliving.com.au/wp-content/uploads/2018/12/aged-and-glowing-gold_hd-206x87.png" title="" alt="SeasonLiving" scale="0">
					</div>
					<button class="close-button" aria-label="Close menu" type="button" data-close>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

	            <div class="nano"> 
	                <div class="content">
	                    <div class="offcanvas_content_left wpb_widgetised_column">
	                        <div id="filters-offcanvas">
	                            <?php if ( is_active_sidebar( 'catalog-widget-area' ) ) : ?>
	                                <?php dynamic_sidebar( 'catalog-widget-area' ); ?>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	               </div>
	            </div>
	        </div>
        </div>
    	<?php endif; ?>

    <!-- Mini Cart -->
    <?php if (class_exists('WooCommerce')) { ?>
	    <?php if ( (isset($shopkeeper_theme_options['main_header_shopping_bag'])) && ($shopkeeper_theme_options['main_header_shopping_bag'] == "1") ) : ?>
		    <div class="shopkeeper-mini-cart">
		    	<?php if ( class_exists( 'WC_Widget_Cart' ) ) { the_widget( 'WC_Widget_Cart' ); } ?>

		    	<?php 
		    		if (!empty($shopkeeper_theme_options['main_header_minicart_message'])):
		    			echo '<div class="minicart-message">'. esc_html__( $shopkeeper_theme_options['main_header_minicart_message'], 'shopkeeper' ) .'</div>';
		    		endif;
		    	?>
		    </div>
		<?php endif; ?>
	<?php } ?>

	 <!-- Site Search -->
    <div class="off-canvas-wrapper">
		<div class="site-search off-canvas position-top is-transition-overlap" id="offCanvasTop1" data-off-canvas>
			<div class="row has-scrollbar">
				<div class="site-search-close">
					<button class="close-button" aria-label="Close menu" type="button" data-close>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<p class="search-text">
					<?php esc_html_e('What are you looking for?', 'shopkeeper'); ?>
				</p>
				<?php
				if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
					if ( isset($shopkeeper_theme_options['predictive_search']) && $shopkeeper_theme_options['predictive_search'] ) {
						do_action( 'getbowtied_product_search' );
					} else {
						the_widget( 'WC_Widget_Product_Search', 'title=' );
					}
				} else {
					the_widget( 'WP_Widget_Search', 'title=' );
				}
				?>
			</div>
		</div>
	</div><!-- .site-search -->

	 <!-- Back To Top Button -->
    <?php $shopkeeper_theme_options['back_to_top_button'] = isset($shopkeeper_theme_options['back_to_top_button']) ? $shopkeeper_theme_options['back_to_top_button'] : '1'; ?>
	<?php if ( $shopkeeper_theme_options['back_to_top_button'] == '1') : ?>
	<a href="#0" class="cd-top">
		<i class="spk-icon spk-icon-up-small" aria-hidden="true"></i>
	</a>
	<?php endif; ?>

	 <!-- Product Quick View -->
	<div class="cd-quick-view woocommerce"></div>
	
	<?php wp_footer(); ?>
 <script type="text/javascript" src="https://s.skimresources.com/js/183486X1653315.skimlinks.js"></script>   
</body>

</html>