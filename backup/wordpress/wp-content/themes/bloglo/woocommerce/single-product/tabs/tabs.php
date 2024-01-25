<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * Bloglo changes: added bloglo-container wrappers and bloglo-fw-section. Added span inside tabs a elements,
 * because of underline animation. Added .bloglo-entry to woocommerce-Tabs-panel (only if key === 'description' ).
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs bloglo-fw-section wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<div class="bloglo-container">
				<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
						<a href="#tab-<?php echo esc_attr( $key ); ?>"><span><?php echo esc_html( apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $product_tab['title'] ), $key ) ); ?></span></a>
					</li>
				<?php endforeach; ?>
			</div>
		</ul>
		<?php
		foreach ( $product_tabs as $key => $product_tab ) :
			$bloglo_classes = 'description' === $key ? 'bloglo-entry ' : '';

			$bloglo_classes .= sprintf( 'woocommerce-Tabs-panel woocommerce-Tabs-panel--%s', esc_attr( $key ) );
			?>
			<div class="<?php echo esc_attr( $bloglo_classes ); ?>
			panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<div class="bloglo-container">
					<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab ); }
					?>
				</div>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
