<?php

	defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Woo_Variation_Swatches' ) ) {

	class Woo_Variation_Swatches {

		protected static $instance = null;

		public function __construct() {
			$this->includes();
			$this->hooks();
			$this->init();
			do_action( 'woo_variation_swatches_loaded', $this );
		}

		public function version() {
			return esc_attr( WOO_VARIATION_SWATCHES_PLUGIN_VERSION );
		}

		protected function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function includes() {

			// Deprecated file: class-woo-variation-swatches-cache.php
			// require_once __DIR__ . '/class-woo-variation-swatches-cache.php';
			require_once __DIR__ . '/class-woo-variation-swatches-manage-cache.php';
			require_once __DIR__ . '/class-woo-variation-swatches-frontend.php';
			require_once __DIR__ . '/class-woo-variation-swatches-backend.php';
			require_once __DIR__ . '/class-woo-variation-swatches-blocks.php';
			require_once __DIR__ . '/functions.php';
		}

		/**
		 * Hooks.
		 *
		 * @example: [wvs_show_archive_variation product_id="ID"]
		 * @return void
		 */
		public function hooks() {
			// Register with hook
			add_action( 'init', array( $this, 'language' ), 1 );
			add_action( 'init', array( $this, 'add_image_sizes' ) );
			add_shortcode( 'wvs_show_archive_variation', array( $this, 'show_archive_variation_shortcode' ) );
		}

		public function init() {
			$this->get_frontend();
			$this->get_backend();
			$this->get_cache();
			$this->get_blocks();
		}

		public function get_frontend() {
			return Woo_Variation_Swatches_Frontend::instance();
		}

		public function get_backend() {
			return Woo_Variation_Swatches_Backend::instance();
		}

		public function get_blocks() {
			return Woo_Variation_Swatches_Blocks::instance();
		}

		public function show_archive_page_swatches() {
			if ( ! function_exists( 'wc_get_product' ) ) {
				return false;
			}

			global $product;
			if ( ! $product || ! $product->is_type( 'variable' ) ) {
				return false;
			}

			echo $this->show_archive_page_swatches_by_id( $product->get_id() );
			return true;
		}

		public function show_archive_page_swatches_by_id( $product_id ) {
			$product = wc_get_product( absint( $product_id ) );
			if ( ! $product || ! $product->is_type( 'variable' ) ) {
				return '';
			}

			if ( ! wc_string_to_bool( $this->get_option( 'show_on_archive', 'yes' ) ) ) {
				return '';
			}

			$attributes = $product->get_variation_attributes();
			if ( empty( $attributes ) ) {
				return '';
			}

			$threshold_min  = apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
			$total_children = count( $product->get_children() );
			$get_variations = $total_children <= absint( $threshold_min );
			$available_variations = $get_variations ? $product->get_available_variations() : array();

			$archive_align = $this->get_option( 'archive_align', 'flex-start' );
			$wrapper_attributes = array(
				'class'                  => 'woo-variation-swatches wvs-archive-variations-wrapper woo_variation_swatches_variations_form',
				'data-archive-align'      => $archive_align,
				'data-product_id'         => absint( $product->get_id() ),
				'data-product_variations' => wc_esc_json( wp_json_encode( $available_variations ) ),
			);

			$wrapper_attributes = apply_filters( 'woo_variation_swatches_archive_wrapper_attributes', $wrapper_attributes, $product );

			ob_start();
			echo '<div ' . wc_implode_html_attributes( $wrapper_attributes ) . '>';

			foreach ( $attributes as $attribute => $options ) {
				wc_dropdown_variation_attribute_options( array(
					'options'    => $options,
					'attribute'  => $attribute,
					'product'    => $product,
					'is_archive' => true,
					'show_option_none' => false,
				) );
			}

			echo '</div>';

			return ob_get_clean();
		}

		public function show_archive_variation_shortcode( $raw_attributes = array() ) {
			$attributes = shortcode_atts( array(
				'product_id' => 0,
			), $raw_attributes );

			$product_id = absint( $attributes['product_id'] );
			if ( ! $product_id ) {
				return '';
			}

			return $this->show_archive_page_swatches_by_id( $product_id );
		}

		public function add_image_sizes() {
			add_image_size( 'variation_swatches_image_size', 50, 50, 1 );
			add_image_size( 'variation_swatches_tooltip_size', 100, 100, 1 );
		}

		public function get_option( $option, $default_value = null ) {

			$cache_key   = $this->get_cache()->get_cache_key( 'global_settings' );
			$cache_group = 'woo_variation_swatches';
			$options     = wp_cache_get( $cache_key, $cache_group );
			if ( false === $options ) {
				$options = GetWooPlugins_Admin_Settings::get_option( 'woo_variation_swatches' );
				wp_cache_set( $cache_key, $options, $cache_group );
			}

			if ( current_theme_supports( 'woo_variation_swatches' ) ) {
				$theme_support = get_theme_support( 'woo_variation_swatches' );
				$default_value = $theme_support[0][ $option ] ?? $default_value;
			}

			if ( is_array( $options ) && array_key_exists( $option, $options ) ) {
				return $options[ $option ];
			}

			return GetWooPlugins_Admin_Settings::get_option( $option, $default_value );
		}

		public function get_options() {
			$options = GetWooPlugins_Admin_Settings::get_option( 'woo_variation_swatches' );

			return $options;
		}

		public function get_cache() {
			return Woo_Variation_Swatches_Manage_Cache::instance();
		}

		public function language() {
			load_plugin_textdomain( 'variation-swatches-lite-plus', false, plugin_basename( dirname( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) ) . '/languages' );
		}

		public function basename() {
			return basename( dirname( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) );
		}

		public function plugin_basename() {
			return plugin_basename( WOO_VARIATION_SWATCHES_PLUGIN_FILE );
		}

		public function plugin_dirname() {
			return dirname( plugin_basename( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) );
		}

		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) );
		}

		public function plugin_url() {
			return untrailingslashit( plugins_url( '/', WOO_VARIATION_SWATCHES_PLUGIN_FILE ) );
		}

		public function images_url( $file = '' ) {
			return untrailingslashit( plugin_dir_url( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) . 'images' ) . $file;
		}

		public function org_assets_url( $file = '' ) {
			$clean_file = ltrim( $file, '/');
			return sprintf('https://ps.w.org/variation-swatches-lite-plus/assets/%s?ver=%s', $clean_file, $this->version());
		}

		public function assets_url( $file = '' ) {
			return untrailingslashit( plugin_dir_url( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) . 'assets' ) . $file;
		}

		public function assets_path( $file = '' ) {
			return $this->plugin_path() . '/assets' . $file;
		}

		public function assets_version( $file ) {
			return filemtime( $this->assets_path( $file ) );
		}

		public function include_path( $file = '' ) {
			return untrailingslashit( plugin_dir_path( WOO_VARIATION_SWATCHES_PLUGIN_FILE ) . 'includes' ) . $file;
		}

		public function template_override_dir() {
			return apply_filters( 'woo_variation_swatches_override_dir', 'variation-swatches-lite-plus' );
		}

		public function template_path() {
			return apply_filters( 'woo_variation_swatches_template_path', untrailingslashit( $this->plugin_path() ) . '/templates' );
		}

		public function template_url() {
			return apply_filters( 'woo_variation_swatches_template_url', untrailingslashit( $this->plugin_url() ) . '/templates' );
		}

		public function sanitize_name( $value ) {
			return wc_clean( rawurldecode( sanitize_title( wp_unslash( $value ) ) ) );
		}

		public function from_rgb_to_hex( $rgb_string ) {
			if ( strpos( $rgb_string, '#' ) === 0 ) {
				return $rgb_string;
			}

			preg_match( '/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $rgb_string, $by_color );

			return sprintf( '#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3] );
		}

		public function locate_template( $template_name, $third_party_path = false ) {

			$template_name = ltrim( $template_name, '/' );
			$template_path = $this->template_override_dir();
			$default_path  = $this->template_path();

			if ( $third_party_path && is_string( $third_party_path ) ) {
				$default_path = untrailingslashit( $third_party_path );
			}

			// Look within passed path within the theme - this is priority.
			$template = locate_template(
				array(
					trailingslashit( $template_path ) . trim( $template_name ),
					'wvs-template-' . trim( $template_name ),
				)
			);

			// Get default template/
			if ( empty( $template ) ) {
				$template = trailingslashit( $default_path ) . trim( $template_name );
			}

			// Return what we found.
			return apply_filters( 'woo_variation_swatches_locate_template', $template, $template_name, $template_path );
		}

		public function get_template( $template_name, $template_args = array(), $third_party_path = false ) {

			$template_name = ltrim( $template_name, '/' );

			$located = apply_filters( 'woo_variation_swatches_get_template', $this->locate_template( $template_name, $third_party_path ) );

			do_action( 'woo_variation_swatches_before_get_template', $template_name, $template_args );

			extract( $template_args );

			if ( file_exists( $located ) ) {
				include $located;
			} else {
				/* translators: %1$s = Template location, %2$s = Template Name. */
				trigger_error( sprintf( esc_html__( '"Variation Swatches for WooCommerce" Plugin try to load "%1$s" but template "%2$s" was not found.', 'variation-swatches-lite-plus' ), esc_html($located), esc_html($template_name) ), E_USER_WARNING ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
			}

			do_action( 'woo_variation_swatches_after_get_template', $template_name, $template_args );
		}

		public function is_pro() {
			if ( defined( 'WVS_LITE_PLUS_ALL_FEATURES' ) && WVS_LITE_PLUS_ALL_FEATURES ) {
				return true;
			}

			return false;
		}

		public function get_pro_product_id() {
			return 113;
		}
	}
}
