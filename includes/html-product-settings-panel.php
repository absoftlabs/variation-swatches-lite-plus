<?php
defined( 'ABSPATH' ) || die( 'Keep Quit' );

/**
 * Product settings panel markup.
 *
 * @var $post
 * @var $wpdb
 * @var $product_object
 * @var $attributes
 * @var $settings
 */

// $attributes = $product_object->get_attributes();
$product_id = $product_object->get_id();

$product_swatches_data = array();
?>
<style type="text/css">
	.variation-swatches-lite-plus-variation-product-option-features-wrapper {
		padding: 20px;
		margin: 5px;
		background-color: #eeeeee;
	}

	.variation-swatches-lite-plus-variation-product-option-features-wrapper li span {
		color: #15ce5c;
	}

	.variation-swatches-lite-plus-variation-product-option-features-wrapper p, .variation-swatches-lite-plus-variation-product-option-features-wrapper ul {
		padding: 10px 0;
	}

	.gwp-pro-button span {
		padding-top: 10px;
	}

	.variation-swatches-lite-plus-variation-product-option-features-wrapper ul {
		display: block;

	}

	.variation-swatches-lite-plus-variation-product-option-features-wrapper ul li {
		margin-bottom: 10px;
	}

	.variation-swatches-lite-plus-variation-product-option-features-wrapper .gwp-pro-features-links {
		margin-left: 20px;
		padding: 5px;
	}
</style>
<div data-product_id="<?php echo esc_attr( $product_id ); ?>" id="woo_variation_swatches_variation_product_options" class="variation-swatches-lite-plus-variation-product-options-wrapper panel wc-metaboxes-wrapper hidden">

	<div id="woo_variation_swatches_variation_product_options_inner">
		<div id="variation-swatches-lite-plus-variation-product-option-settings-wrapper">
			<div class="variation-swatches-lite-plus-variation-product-option-features-wrapper">

				<h3>
					<?php
					$pro_link = sprintf('<a target="_blank" href="%s">%s</a>', 'https://getwooplugins.com/plugins/woocommerce-variation-swatches/', esc_html__('Variation Swatches for WooCommerce', 'variation-swatches-lite-plus'));
					/* translators: %s: Pro Link */
					printf( esc_html__( 'With the premium version of %s, you can do:', 'variation-swatches-lite-plus' ), wp_kses_post( $pro_link) );
					?>
				</h3>
				<ul>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Individual Product Basis Attribute Variation Swatches Customization', 'variation-swatches-lite-plus' ); ?>

						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/show-all-swatches-type-in-the-same-variation/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Show Image, Color, Button Variation Swatches in Same Attribute', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/product-details/product/polo-ralph-lauren-ph3127-59/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Convert Manually Created Attribute Variations Into Color, Image, and Label Swatches', 'variation-swatches-lite-plus' ); ?>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Group based swatches display.', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/product/nike-air-vapormax-plus-group/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Convert attribute variations into radio button.', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/radio-variation-swatches"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Show Entire Color, Image, Label And Radio Attributes Swatches In Catalog/ Category / Archive / Store/ Shop Pages', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Show Selected Single Color or Image Or Label Attribute Swatches In Catelog/ Category / Archive / Store / Shop Pages', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/product-details/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Change Variation Product Gallery After Selecting Single Attribute Like Amazon Or AliExpress', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/change-product-image-based-on-select-attribute/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Generate Selected Attribute Variation Link', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/generate-link-for-selected-variations/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Option to Select ROUNDED and SQUARED Attribute Variation Swatches Shape In the Same Product.', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/round-square-shape-swatches"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Blur Or Hide Or Show Cross Sign For Out of Stock Variation Swatches (Unlimited Variations Without hiding out of stock item from catalog)', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/cross-out-of-stock-variations-more-than-30-variations/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Shop Page Swatches Size Control', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://www.youtube.com/watch?v=xeT7byUaa7U"><?php esc_html_e( 'Live Preview', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Make Selected Attribute Variation Swatches Size Larger Than Other Default Attribute Variations', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/swatches-size-selected-attribute/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Show Custom Text in Variation Tooltip In Product and Shop Page', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://www.youtube.com/watch?v=bzx_G5Di9kQ&list=PLjkiDGg3ul_L-3332EDkmuN_G2ttrJM24&index=12"><?php esc_html_e( 'Live Preview', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Show Custom Image in Variation Swatches Tooltip In Product And Shop Page', 'variation-swatches-lite-plus' ); ?>
						<div class="gwp-pro-features-links">
							<a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/image-tooltip/"><?php esc_html_e( 'Live Demo', 'variation-swatches-lite-plus' ); ?></a>
						</div>
					</li>

					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Archive page swatches positioning.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Archive page swatches alignment.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Tooltip display setting on archive/shop page.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Variation clear button display setting.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Customize tooltip text and background color.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Customize tooltip image and image size.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Customize font size, swatches height and width.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Customize swatches colors, background and border sizes.', 'variation-swatches-lite-plus' ); ?>
					</li>
					<li>
						<span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Automatic updates and exclusive technical support.', 'variation-swatches-lite-plus' ); ?>
					</li>
				</ul>
				<div class="clear"></div>
				<a target="_blank" class="button button-primary button-hero gwp-pro-button" href="<?php echo esc_url( woo_variation_swatches()->get_backend()->get_pro_link() ); ?>">
					<?php esc_html_e( 'Ok, I need this feature!', 'variation-swatches-lite-plus' ); ?><span class="dashicons dashicons-external"></span>
				</a>
			</div>
		</div>
	</div>
</div>
