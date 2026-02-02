<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Woo_Variation_Swatches_Deactivate_Feedback' ) ) :

	class Woo_Variation_Swatches_Deactivate_Feedback extends GetWooPlugins_Plugin_Deactivate_Feedback {

		protected static $_instance = null;

		public function __construct() {

			parent::__construct();
			add_filter( 'wp_ajax_gwp_deactivate_feedback_by_variation-swatches-lite-plus', array( $this, 'send' ) );

			do_action( 'woo_variation_swatches_deactivate_feedback_loaded', $this );
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		protected function includes() {
		}

		public function slug() {
			return woo_variation_swatches()->basename();
		}

		public function version() {
			return woo_variation_swatches()->version();
		}

		public function options() {
			return woo_variation_swatches()->get_options();
		}

		public function reasons() {

			$current_user = wp_get_current_user();

			return array(
				'temporary_deactivation' => array(
					'title'             => esc_html__( 'It\'s a temporary deactivation.', 'variation-swatches-lite-plus' ),
					'input_placeholder' => '',
				),

				'dont_know_about' => array(
					'title'             => esc_html__( 'I couldn\'t understand how to make it work.', 'variation-swatches-lite-plus' ),
					'input_placeholder' => '',
					'alert'             => __( 'It converts variation select box to beautiful swatches.<br><a target="_blank" href="https://demo.getwooplugins.com/woocommerce-variation-swatches/">Please check live demo</a>.', 'variation-swatches-lite-plus' ),
				),

				'no_longer_needed' => array(
					'title'             => esc_html__( 'I no longer need the plugin.', 'variation-swatches-lite-plus' ),
					'input_placeholder' => '',
				),

				'found_a_better_plugin' => array(
					'title'             => esc_html__( 'I found a better plugin.', 'variation-swatches-lite-plus' ),
					'input_placeholder' => esc_html__( 'Please share which plugin.', 'variation-swatches-lite-plus' ),
				),

				'broke_site_layout' => array(
					'title'             => __( 'The plugin <strong>broke my layout</strong> or some functionality.', 'variation-swatches-lite-plus' ),
					'input_placeholder' => '',
					'alert'             => __( '<a target="_blank" href="https://getwooplugins.com/tickets/">Please open a support ticket</a>, we will fix it immediately.', 'variation-swatches-lite-plus' ),
				),

				'plugin_setup_help' => array(
					'title'             => __( 'I need someone to <strong>setup this plugin.</strong>', 'variation-swatches-lite-plus' ),
					'input_placeholder' => esc_html__( 'Your email address.', 'variation-swatches-lite-plus' ),
					'input_value'       => sanitize_email( $current_user->user_email ),
					'alert'             => __( 'Please provide your email address to contact with you <br>and help you to set up and configure this plugin.', 'variation-swatches-lite-plus' ),
				),

				'plugin_config_too_complicated' => array(
					'title'             => __( 'The plugin is <strong>too complicated to configure.</strong>', 'variation-swatches-lite-plus' ),
					'input_placeholder' => '',
					'alert'             => __( '<a target="_blank" href="https://getwooplugins.com/documentation/woocommerce-variation-swatches/">Have you checked our documentation?</a>.', 'variation-swatches-lite-plus' ),
				),

				'need_specific_feature' => array(
					'title'             => esc_html__( 'I need specific feature that you don\'t support.', 'variation-swatches-lite-plus' ),
					'input_placeholder' => esc_html__( 'Please share with us.', 'variation-swatches-lite-plus' ),
					//'alert'             => __( '<a target="_blank" href="https://getwooplugins.com/tickets/">Please open a ticket</a>, we will try to fix it immediately.', 'variation-swatches-lite-plus' ),
				),

				'other' => array(
					'title'             => esc_html__( 'Other', 'variation-swatches-lite-plus' ),
					'input_placeholder' => esc_html__( 'Please share the reason', 'variation-swatches-lite-plus' ),
				)
			);
		}

	}
endif;
