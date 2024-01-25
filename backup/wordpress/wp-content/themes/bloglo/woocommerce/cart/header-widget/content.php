<?php
/**
 * Header Cart Widget dropdown content.
 *
 * @package Bloglo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bloglo_cart_items = WC()->cart->get_cart();
?>
<div class="wc-cart-widget-content">
	<?php foreach ( $bloglo_cart_items as $cart_item_key => $cart_item ) { // phpcs:ignore ?>

		<?php
		$bloglo_product    = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$bloglo_product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $bloglo_product && $bloglo_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$bloglo_product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $bloglo_product->is_visible() ? $bloglo_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
			<div class="bloglo-cart-item">
				<div class="bloglo-cart-image">
					<?php
					$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $bloglo_product->get_image(), $cart_item, $cart_item_key );

					if ( ! $bloglo_product_permalink ) {
						echo $thumbnail; // phpcs:ignore
					} else {
						printf( '<a href="%s" class="bloglo-woo-thumb">%s</a>', esc_url( $bloglo_product_permalink ), $thumbnail ); // phpcs:ignore
					}
					?>
				</div>

				<div class="bloglo-cart-item-details">
					<p class="bloglo-cart-item-title">
						<?php
						if ( ! $bloglo_product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', esc_html( $bloglo_product->get_name() ), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $bloglo_product_permalink ), esc_html( $bloglo_product->get_name() ) ), $cart_item, $cart_item_key ) );
						}
						?>
					</p>
					<div class="bloglo-cart-item-meta">

					<?php if ( $cart_item['quantity'] > 1 ) { ?>
							<span class="bloglo-cart-item-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
						<?php } ?>

						<span class="bloglo-cart-item-price"><?php echo $bloglo_product->get_price_html(); // phpcs:ignore ?></span>
					</div>
				</div>

				<?php /* translators: %s is cart item title. */ ?>
				<a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item ) ); ?>" class="bloglo-remove-cart-item" data-product_key="<?php echo esc_attr( $cart_item['key'] ); ?>" title="<?php echo esc_html( sprintf( __( 'Remove %s from cart', 'bloglo' ), $bloglo_product->get_title() ) ); ?>">
					<?php echo bloglo()->icons->get_svg( 'x', array( 'aria-hidden' => 'true' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php /* translators: %s is cart item title. */ ?>
					<span class="screen-reader-text"><?php echo esc_html( sprintf( __( 'Remove %s from cart', 'bloglo' ), $bloglo_product->get_title() ) ); ?></span>
				</a>
			</div>
		<?php } ?>
	<?php } ?>
</div><!-- END .wc-cart-widget-content -->
