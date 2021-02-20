<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<div class='row'>
		<div class="large-12 xlarge-6 xxlarge-6 columns">
			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		</div>
		<div class="large-12 xlarge-6 xxlarge-6 columns text-large-right">
			<?php
				do_action( 'woocommerce_before_add_to_cart_quantity' );

				woocommerce_quantity_input( array(
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				) );

				do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>

			<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

			<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="0" />
		</div>
	</div>
	
</div>
<style>
	.single_variation_wrap {
		padding-top: 1rem;
	}
	
	.woocommerce div.product form.cart .variations {
		padding-bottom: 1rem;
		border-bottom: 1px solid #EEEEEE;
	}
	
	.woocommerce div.product form.cart .variations td.label {
		display: table-cell;
		vertical-align: middle;
	}
	
	.woocommerce div.product form.cart .variations td.value {
		display: table-cell;
		text-align: right;
	}
	
	.woocommerce div.product form.cart .variations select {
		width: auto;
		min-width: 40%;
	}
	
	.product_layout_classic .product_infos form.cart .quantity:not(.hidden).custom {
		margin-left: 1rem !important;
	}
	
	.product_layout_classic .product_infos form.cart .button {
		float: right !important;
	}
	
	
@media only screen and (max-width: 767px) {
	.woocommerce div.product form.cart .variations td.label, .woocommerce div.product form.cart .variations td.value {
		display: block;
		text-align: left;
	}
	
	.woocommerce div.product form.cart .variations select {
		width: 100%;
		min-width: 75%;
	}
}
</style>