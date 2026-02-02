<?php

	defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Woo_Variation_Swatches_Settings' ) ) :

	class Woo_Variation_Swatches_Settings extends GetWooPlugins_Settings_Page {

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->notices();
			$this->hooks();
			parent::__construct();
			do_action( 'woo_variation_swatches_settings_loaded', $this );
		}

		public function get_id() {
			return 'woo_variation_swatches';
		}

		public function get_label() {
			return esc_html__( 'Variation Swatches Lite+', 'variation-swatches-lite-plus' );
		}

		public function get_menu_name() {
			return esc_html__( 'Swatches Settings', 'variation-swatches-lite-plus' );
		}

		public function get_title() {
			return esc_html__( 'Variation Swatches Lite+ Settings', 'variation-swatches-lite-plus' );
		}

		protected function hooks() {
			add_action( 'admin_footer', array( $this, 'modal_templates' ) );
			add_action( 'getwooplugins_sidebar', array( $this, 'sidebar' ) );
			add_filter( 'show_getwooplugins_save_button', array( $this, 'save_button' ), 10, 3 );
			add_filter( 'show_getwooplugins_sidebar', array( $this, 'save_button' ), 10, 3 );
		}

		public function save_button( $default_value, $current_tab, $current_section ) {
			if ( $current_tab === $this->get_id() && in_array( $current_section, array(
					'tutorial',
					'plugins',
					'group'
				), true ) ) {
				return false;
			}

			return $default_value;
		}

		public function sidebar( $current_tab ) {
			if ( $current_tab === $this->get_id() ) {
				include_once dirname( __FILE__ ) . '/html-settings-sidebar.php';
			}
		}

		public function modal_templates() {
			$this->template_shape_style();
			$this->template_default_to_button();
			$this->template_default_to_image();
			$this->template_clear_on_reselect();
			$this->template_hide_out_of_stock_variation();
			$this->template_clickable_out_of_stock_variation();
			$this->template_show_variation_stock_info();
			$this->template_display_limit();
			$this->template_archive_show_availability();
			$this->template_archive_swatches_position();
			$this->template_show_swatches_on_filter_widget();
			$this->template_enable_catalog_mode();
			$this->template_enable_single_variation_preview();
			$this->template_enable_large_size();
			$this->template_archive_align();
			$this->template_attribute_behavior();
			$this->template_enable_linkable_variation_url();
			$this->template_license();
			$this->template_show_on_archive();
			$this->template_archive_default_selected();
		}

		public function modal_support_links() {
			$links = array(
				'button_url'  => 'https://getwooplugins.com/documentation/woocommerce-variation-swatches/',
				'button_text' => esc_html__( 'See Documentation', 'variation-swatches-lite-plus' ),
				'link_url'    => 'https://getwooplugins.com/tickets/',
				'link_text'   => esc_html__( 'Help &amp; Support', 'variation-swatches-lite-plus' )
			);

			return $links;
		}

		public function modal_buy_links() {

			if ( woo_variation_swatches()->is_pro() ) {
				return $this->modal_support_links();
			}

			$links = array(
				'button_url'   => 'https://getwooplugins.com/plugins/woocommerce-variation-swatches/',
				'button_text'  => esc_html__( 'Buy Now', 'variation-swatches-lite-plus' ),
				'button_class' => 'button-danger',
				'link_url'     => 'https://getwooplugins.com/documentation/woocommerce-variation-swatches/',
				'link_text'    => esc_html__( 'See Documentation', 'variation-swatches-lite-plus' )
			);

			return $links;
		}

		public function template_shape_style() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-01.webm' ) ) );
			$this->modal_dialog( 'shape_style', esc_html__( 'Swatches Shape Style', 'variation-swatches-lite-plus' ), $body, $this->modal_support_links() );
		}

		public function template_default_to_button() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-02.webm' ) ) );
			$this->modal_dialog( 'default_to_button', esc_html__( 'Swatches Default To Button', 'variation-swatches-lite-plus' ), $body, $this->modal_support_links() );
		}

		public function template_default_to_image() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-03.webm' ) ) );
			$this->modal_dialog( 'default_to_image', esc_html__( 'Swatches Default To Image', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_clear_on_reselect() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-04.webm' ) ) );
			$this->modal_dialog( 'clear_on_reselect', esc_html__( 'Swatches Clear on Reselect', 'variation-swatches-lite-plus' ), $body, $this->modal_support_links() );
		}

		public function template_hide_out_of_stock_variation() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-05.webm' ) ) );
			$this->modal_dialog( 'hide_out_of_stock_variation', esc_html__( 'Swatches Hide Out Of Stock', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_clickable_out_of_stock_variation() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-06.webm' ) ) );
			$this->modal_dialog( 'clickable_out_of_stock_variation', esc_html__( 'Swatches Clickable Out Of Stock', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_show_variation_stock_info() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-07.webm' ) ) );
			$this->modal_dialog( 'show_variation_stock_info', esc_html__( 'Swatches Show variation stock info.', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_display_limit() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-08.webm' ) ) );
			$this->modal_dialog( 'display_limit', esc_html__( 'Swatches Attribute Display Limit', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_archive_show_availability() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-09.webm' ) ) );
			$this->modal_dialog( 'archive_show_availability', esc_html__( 'Swatches Show Product Availability', 'variation-swatches-lite-plus' ), $body, $this->modal_support_links() );
		}

		public function template_archive_swatches_position() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-10.webm' ) ) );
			$this->modal_dialog( 'archive_swatches_position', esc_html__( 'Swatches Display Position', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_show_swatches_on_filter_widget() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-11.webm' ) ) );
			$this->modal_dialog( 'show_swatches_on_filter_widget', esc_html__( 'Swatches Display On Widget', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_enable_catalog_mode() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-12.webm' ) ) );
			$this->modal_dialog( 'enable_catalog_mode', esc_html__( 'Swatches Show as catalog mode', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_enable_single_variation_preview() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-13.webm' ) ) );
			$this->modal_dialog( 'enable_single_variation_preview', esc_html__( 'Swatches Show variation preview', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_enable_large_size() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-14.webm' ) ) );
			$this->modal_dialog( 'enable_large_size', esc_html__( 'Swatches Show variation preview', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_archive_align() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-15.webm' ) ) );
			$this->modal_dialog( 'archive_align', esc_html__( 'Swatches Show variation preview', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_attribute_behavior() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-16.webm' ) ) );
			$this->modal_dialog( 'attribute_behavior', esc_html__( 'Swatches Disabled Attribute style', 'variation-swatches-lite-plus' ), $body, $this->modal_support_links() );
		}

		public function template_enable_linkable_variation_url() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-17.webm' ) ) );
			$this->modal_dialog( 'enable_linkable_variation_url', esc_html__( 'Swatches Generate Sharable URL', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_license() {

			$links = array(
				'button_url'  => 'https://getwooplugins.com/my-account/downloads/',
				'button_text' => esc_html__( 'Get license', 'variation-swatches-lite-plus' ),
				'link_url'    => 'https://getwooplugins.com/tickets/',
				'link_text'   => esc_html__( 'Help &amp; Support', 'variation-swatches-lite-plus' )
			);

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-18.webm' ) ) );
			$this->modal_dialog( 'license', esc_html__( 'Swatches License', 'variation-swatches-lite-plus' ), $body, $links );
		}

		public function template_show_on_archive() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-19.webm' ) ) );
			$this->modal_dialog( 'show_on_archive', esc_html__( 'Swatches On Archive Page', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		public function template_archive_default_selected() {

			$body = sprintf( '<video preload="auto" autoplay loop muted playsinline src="%s"></video>', esc_url( woo_variation_swatches()->org_assets_url( '/preview-20.webm' ) ) );
			$this->modal_dialog( 'archive_default_selected', esc_html__( 'Swatches Archive Default Selected', 'variation-swatches-lite-plus' ), $body, $this->modal_buy_links() );
		}

		protected function notices() {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( $this->is_current_tab() && isset( $_GET[ 'message' ] ) && 'reset' === $_GET[ 'message' ] ) {
				GetWooPlugins_Admin_Settings::add_message( esc_html__( 'Swatches Settings Reset.', 'variation-swatches-lite-plus' ) );
			}
		}

		public function output( $current_tab ) {
			global $current_section;

			if ( $current_tab === $this->get_id() && 'tutorial' === $current_section ) {
				$this->tutorial_section( $current_section );
			} elseif ( $current_tab === $this->get_id() && 'group' === $current_section ) {
				$this->group_section( $current_section );
			} else {
				parent::output( $current_tab );
			}
		}

		public function get_all_image_sizes() {

			$image_subsizes = wp_get_registered_image_subsizes();

			return apply_filters( 'woo_variation_swatches_get_all_image_sizes', array_reduce( array_keys( $image_subsizes ), function ( $carry, $item ) use ( $image_subsizes ) {

				$title  = ucwords( str_ireplace( array( '-', '_' ), ' ', $item ) );
				$width  = $image_subsizes[ $item ][ 'width' ];
				$height = $image_subsizes[ $item ][ 'height' ];

				$carry[ $item ] = sprintf( '%s (%d &times; %d)', $title, $width, $height );

				return $carry;
			}, array() ) );
		}

		public function get_product_categories() {

			$args = array(
				'taxonomy'   => 'product_cat',
				'orderby'    => 'name',
				'order'      => 'asc',
				'hide_empty' => true,
			);

			$categories = get_terms(  $args );

			$ids = wp_list_pluck( $categories, 'name', 'term_id' );

			return apply_filters( 'woo_variation_swatches_get_product_categories', $ids, $categories, $args );
		}

		public function plugins_tab( $label ) {
			return sprintf( '<span class="getwooplugins-recommended-plugins-tab dashicons dashicons-admin-plugins"></span> <span>%s</span>', $label );
		}

		protected function get_own_sections() {
			$sections = array(
				''         => esc_html__( 'General', 'variation-swatches-lite-plus' ),
				'advanced' => esc_html__( 'Advanced', 'variation-swatches-lite-plus' ),
				'style'    => esc_html__( 'Styling', 'variation-swatches-lite-plus' ),
				'single'   => esc_html__( 'Product Page', 'variation-swatches-lite-plus' ),
				'archive'  => esc_html__( 'Archive / Shop', 'variation-swatches-lite-plus' ),
				'special'  => esc_html__( 'Special Attributes', 'variation-swatches-lite-plus' ),
				'group'    => esc_html__( 'Group', 'variation-swatches-lite-plus' ),
				'license'  => array(
					'name' => esc_html__( 'License', 'variation-swatches-lite-plus' ),
					'url'  => false
				),
				'tutorial' => esc_html__( 'Tutorial', 'variation-swatches-lite-plus' ),
			);

			if ( current_user_can( 'install_plugins' ) ) {
				$sections[ 'plugins' ] = array(
					'name' => $this->plugins_tab( esc_html__( 'Useful Free Plugins', 'variation-swatches-lite-plus' ) ),
					'url'  => self_admin_url( 'plugin-install.php?s=getwooplugins&tab=search&type=author' ),
				);
			}

			return $sections;
		}

		public function tutorial_section( $current_section ) {
			$settings = $this->get_settings( $current_section );
			include_once dirname( __FILE__ ) . '/html-settings-tutorial.php';
		}

		public function group_section( $current_section ) {
			$settings = $this->get_settings( $current_section );
			include_once dirname( __FILE__ ) . '/html-settings-group.php';
		}

		protected function get_settings_for_default_section() {

			$settings = array(

				array(
					'id'    => 'general_options',
					'type'  => 'title',
					'title' => esc_html__( 'General options', 'variation-swatches-lite-plus' ),
					'desc'  => '',
				),

				array(
					'id'      => 'enable_stylesheet',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Enable Stylesheet', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Enable default stylesheet.', 'variation-swatches-lite-plus' ),
					'default' => 'yes'
				),

				array(
					'id'      => 'enable_tooltip',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Enable Tooltip', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Enable tooltip on each product attribute.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'require' => $this->normalize_required_attribute( array( 'enable_stylesheet' => array( 'type' => '!empty' ) ) ),
				),

				array(
					'id'           => 'shape_style',
					'title'        => esc_html__( 'Shape Style', 'variation-swatches-lite-plus' ),
					'type'         => 'radio',
					'desc'         => esc_html__( 'This controls which shape style used by default.', 'variation-swatches-lite-plus' ),
					'desc_tip'     => true,
					'default'      => 'squared',
					'options'      => array(
						'rounded' => esc_html__( 'Rounded Shape', 'variation-swatches-lite-plus' ),
						'squared' => esc_html__( 'Squared Shape', 'variation-swatches-lite-plus' ),
					),
					'help_preview' => true,
				),

				array(
					'id'           => 'default_to_button',
					'title'        => esc_html__( 'Dropdowns to Button', 'variation-swatches-lite-plus' ),
					'desc'         => esc_html__( 'Convert default dropdowns to button.', 'variation-swatches-lite-plus' ),
					'default'      => 'yes',
					'type'         => 'checkbox',
					'help_preview' => true,
				),

				array(
					'id'      => 'default_to_image',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Dropdowns to Image', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Convert default dropdowns to image type if variation has an image.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'is_pro'  => true,
				),

				array(
					'type' => 'sectionend',
					'id'   => 'general_options',
				),
			);

			return $settings;
		}

		protected function get_settings_for_advanced_section() {


			$media_settings_link   = sprintf( '<a target="_blank" href="%s">%s</a>', esc_url( admin_url( 'options-media.php' ) ), esc_html__('Media Settings', 'variation-swatches-lite-plus') );
			$regenerate_thumbnails = sprintf( '<strong>%s</strong>', esc_html__('Regenerate Thumbnails', 'variation-swatches-lite-plus'));

			/* translators: %s: filter name */
			$filter_applied_msg = sprintf(esc_html__('Attribute image size can be changed by %s filter hook. So this option will not apply any effect.', 'variation-swatches-lite-plus'), '<code>woo_variation_swatches_global_product_attribute_image_size</code>');
			/* translators: %1$s = Media Settings Link, %2$s = Regenerate Thumbnails Plugin name */
			$filter_not_applied_msg = sprintf(esc_html__('Choose attribute image size. %1$s or use %2$s plugin.', 'variation-swatches-lite-plus'), $media_settings_link, $regenerate_thumbnails);

			$attribute_image_size_desc =  has_filter( 'woo_variation_swatches_global_product_attribute_image_size' )
				?  sprintf('<span style="color: red">%s</span>', $filter_applied_msg)
				: $filter_not_applied_msg;

			$settings = array(

				array(
					'id'    => 'advanced_options',
					'type'  => 'title',
					'title' => esc_html__( 'Advanced options', 'variation-swatches-lite-plus' ),
					'desc'  => '',
				),

				array(
					'id'           => 'clear_on_reselect',
					'type'         => 'checkbox',
					'title'        => esc_html__( 'Clear on Reselect', 'variation-swatches-lite-plus' ),
					'desc'         => esc_html__( 'Clear selected attribute on select again.', 'variation-swatches-lite-plus' ),
					'default'      => 'no',
					'help_preview' => true,
				),

				array(
					'id'      => 'hide_out_of_stock_variation',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Disable Out of Stock', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Disable Out Of Stock item.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					// 'help_preview' => true,
					'is_pro'  => true,
				),

				array(
					'id'      => 'clickable_out_of_stock_variation',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Clickable Out Of Stock', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Clickable Out Of Stock item.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					//'require' => $this->normalize_required_attribute( array( 'hide_out_of_stock_variation' => array( 'type' => 'empty' ) ) ),
					'is_pro'  => true,
				),

				array(
					'id'           => 'attribute_behavior',
					'type'         => 'radio',
					'title'        => esc_html__( 'Disabled Attribute style', 'variation-swatches-lite-plus' ),
					'desc'         => esc_html__( 'Disabled / Out Of Stock attribute will be hide / blur / crossed.', 'variation-swatches-lite-plus' ),
					'desc_tip'     => true,
					'options'      => array(
						'blur'          => esc_html__( 'Blur with cross', 'variation-swatches-lite-plus' ),
						'blur-no-cross' => esc_html__( 'Blur without cross', 'variation-swatches-lite-plus' ),
						'hide'          => esc_html__( 'Hide', 'variation-swatches-lite-plus' ),
					),
					'default'      => 'blur',
					'help_preview' => true,
				),


				array(
					'id'      => 'attribute_image_size',
					'type'    => 'select',
					'title'   => esc_html__( 'Attribute image size', 'variation-swatches-lite-plus' ),
					'desc'    => $attribute_image_size_desc,
					'options' => self::get_all_image_sizes(),
					'default' => 'variation_swatches_image_size'
				),

				array(
					'type' => 'sectionend',
					'id'   => 'advanced_options',
				),
			);

			return $settings;
		}

		protected function get_settings_for_style_section() {

			$settings = array(

				// Start swatches tick and cross coloring
				array(
					'id'    => 'style_icons_options',
					'type'  => 'title',
					'title' => esc_html__( 'Swatches indicator', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Change swatches indicator color', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'                => 'tick_color',
					'type'              => 'color',
					'title'             => esc_html__( 'Tick Color', 'variation-swatches-lite-plus' ),
					'desc'              => esc_html__( 'Swatches Selected tick color. Default is: #ffffff', 'variation-swatches-lite-plus' ),
					'css'               => 'width: 6em;',
					'default'           => '#ffffff',
					//'is_new'            => true,
					'custom_attributes' => array(//    'data-alpha-enabled' => 'true'
					)
				),

				array(
					'id'                => 'cross_color',
					'type'              => 'color',
					'title'             => esc_html__( 'Cross Color', 'variation-swatches-lite-plus' ),
					'desc'              => esc_html__( 'Swatches cross color. Default is: #ff0000', 'variation-swatches-lite-plus' ),
					'css'               => 'width: 6em;',
					'default'           => '#ff0000',
					//'is_new'            => true,
					'custom_attributes' => array(//    'data-alpha-enabled' => 'true'
					)
				),

				array(
					'type' => 'sectionend',
					'id'   => 'style_icons_options',
				),

				// Start single page swatches style
				array(
					'id'    => 'single_style_options',
					'type'  => 'title',
					'title' => esc_html__( 'Product Page Swatches Size', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Change swatches style on product page', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'                => 'width',
					'type'              => 'number',
					'title'             => esc_html__( 'Width', 'variation-swatches-lite-plus' ),
					'desc'              => esc_html__( 'Single product variation item width. Default is: 30', 'variation-swatches-lite-plus' ),
					'css'               => 'width: 50px;',
					'default'           => '30',
					'suffix'            => 'px',
					'custom_attributes' => array(
						'min'  => 10,
						'max'  => 200,
						'step' => 5,
					),
				),

				array(
					'id'                => 'height',
					'type'              => 'number',
					'title'             => esc_html__( 'Height', 'variation-swatches-lite-plus' ),
					'desc'              => esc_html__( 'Single product variation item height. Default is: 30', 'variation-swatches-lite-plus' ),
					'css'               => 'width: 50px;',
					'default'           => 30,
					'suffix'            => 'px',
					'custom_attributes' => array(
						'min'  => 10,
						'max'  => 200,
						'step' => 5,
					),
				),

				array(
					'id'                => 'single_font_size',
					'type'              => 'number',
					'title'             => esc_html__( 'Font Size', 'variation-swatches-lite-plus' ),
					'desc'              => esc_html__( 'Single product variation item font size. Default is: 16', 'variation-swatches-lite-plus' ),
					'css'               => 'width: 50px;',
					'default'           => 16,
					'suffix'            => 'px',
					'custom_attributes' => array(
						'min'  => 8,
						'max'  => 48,
						'step' => 2,
					),
				),

				array(
					'type' => 'sectionend',
					'id'   => 'single_style_options',
				),

			);

			return $settings;
		}

		protected function get_settings_for_single_section() {
			$settings = array(
				array(
					'id'    => 'single_page_options',
					'type'  => 'title',
					'title' => esc_html__( 'Single Product Page', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Settings for single product page', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'      => 'show_variation_label',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Show selected attribute', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show selected attribute variation name beside the title.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					// 'is_new'  => true,
				),

				array(
					'id'       => 'variation_label_separator',
					'type'     => 'text',
					'title'    => esc_html__( 'Variation label separator', 'variation-swatches-lite-plus' ),
					/* translators: %s: default separator : */
					'desc'     => sprintf( esc_html__( 'Variation label separator. Default: %s.', 'variation-swatches-lite-plus' ), '<code>:</code>' ),
					'desc_tip' => true,
					'default'  => ':',
					'css'      => 'width: 30px;',
					'require'  => $this->normalize_required_attribute( array(
																		   'show_variation_label' => array(
																			   'type'  => '==',
																			   'value' => '1'
																		   )
																	   ) ),
					// 'is_new'   => true,
				),

				array(
					'id'      => 'enable_single_preloader',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Enable Preloader', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Enable single product page swatches preloader.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'is_pro'  => true,
				),

				array(
					'id'      => 'enable_linkable_variation_url',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Generate variation url', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Generate sharable url based on selected variation attributes.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					'is_pro'  => true,
				),

				array(
					'id'      => 'show_variation_stock_info',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Variation stock info', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show variation product stock info.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					'is_pro'  => true,
				),

				array(
					'id'                => 'display_limit',
					'type'              => 'number',
					// 'size'    => 'tiny',
					'title'             => esc_html__( 'Attribute display limit', 'variation-swatches-lite-plus' ),
					'desc'              => esc_html__( 'Single Product page attribute display limit. Default is 0. Means no limit.', 'variation-swatches-lite-plus' ),
					'desc_tip'          => true,
					'custom_attributes' => array( 'min' => 0 ),
					'css'               => 'width: 80px;',
					'default'           => '0',
					'is_pro'            => true,
				),

				array(
					'type' => 'sectionend',
					'id'   => 'single_page_options',
				),
			);

			return $settings;
		}

		protected function get_settings_for_archive_section() {


			$note        = sprintf('<span style="color: red">%s</span>', esc_html__( 'Note:', 'variation-swatches-lite-plus' ) );
			$ticket_link = sprintf( '<a target="_blank" href="%s">%s</a>', 'https://getwooplugins.com/tickets/', esc_html__('please open a ticket', 'variation-swatches-lite-plus' ) );
			/* translators: %1$s = Note markup, %2$s = Open ticket link. */
			$archive_swatches_position_desc = sprintf(esc_html__('Show archive swatches position. %1$s Some theme remove default woocommerce hooks that why it\'s may not work as expected. For theme compatibility %2$s.', 'variation-swatches-lite-plus' ), $note, $ticket_link );

			$settings = array(

				array(
					'id'    => 'archive_options',
					'type'  => 'title',
					'title' => esc_html__( 'Visual Section', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Advanced change some visual styles on shop / archive page', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'      => 'show_on_archive',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Enable Swatches', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show swatches on archive / shop page.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'is_pro'  => true,
				),

				array(
					'id'      => 'enable_archive_preloader',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Enable Preloader', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Enable archive page swatches preloader.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'is_pro'  => true,
				),

				array(
					'id'      => 'archive_show_availability',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Show Product Availability', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show Product availability stock info.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					'is_pro'  => true,
				),

				array(
					'id'      => 'archive_default_selected',
					'type'    => 'checkbox',
					//'is_pro' => true,
					//'is_new' => true,
					//'help_preview' => true,
					'title'   => esc_html__( 'Show default selected', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show default selected attribute swatches on archive / shop page.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'is_pro'  => true
				),


				array(
					'id'      => 'archive_swatches_position',
					'type'    => 'radio',
					'title'   => esc_html__( 'Display position', 'variation-swatches-lite-plus' ),
					'desc'    => $archive_swatches_position_desc,
					//'desc_tip' => true,
					'default' => 'after',
					'options' => array(
						'before' => esc_html__( 'Before add to cart button', 'variation-swatches-lite-plus' ),
						'after'  => esc_html__( 'After add to cart button', 'variation-swatches-lite-plus' )
					),
					'is_pro'  => true,
				),

				array(
					'id'       => 'archive_align',
					'type'     => 'select',
					'size'     => 'tiny',
					'title'    => esc_html__( 'Swatches align', 'variation-swatches-lite-plus' ),
					'desc'     => esc_html__( 'Swatches align on archive page', 'variation-swatches-lite-plus' ),
					'desc_tip' => true,
					'css'      => 'width: 100px;',
					'default'  => 'flex-start',
					'options'  => array(
						'flex-start' => esc_html__( 'Left', 'variation-swatches-lite-plus' ),
						'center'     => esc_html__( 'Center', 'variation-swatches-lite-plus' ),
						'flex-end'   => esc_html__( 'Right', 'variation-swatches-lite-plus' )
					),
					'is_pro'   => true,
				),

				array(
					'id'      => 'show_swatches_on_filter_widget',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Show on filter widget', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show variation swatches on filter widget.', 'variation-swatches-lite-plus' ),
					'default' => 'yes',
					'is_pro'  => true,
				),

				array(
					'type' => 'sectionend',
					'id'   => 'archive_options',
				),
			);

			return $settings;
		}

		protected function get_settings_for_special_section() {
			$settings = array(

				// Catalog mode
				array(
					'id'    => 'catalog_mode_options',
					'type'  => 'title',
					'title' => esc_html__( 'Catalog mode', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Show single attribute as catalog mode on shop / archive pages. Catalog mode only change image based on selected variation.', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'      => 'enable_catalog_mode',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Show Single Attribute', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show Single Attribute taxonomies on archive page.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					'is_pro'  => true,
				),

				array(
					'type' => 'sectionend',
					'id'   => 'catalog_mode_options',
				),

				array(
					'id'    => 'single_variation_image_preview_options',
					'type'  => 'title',
					'title' => esc_html__( 'Single Variation Image Preview', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Switch variation image when single attribute selected on product page.', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'      => 'enable_single_variation_preview',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Variation Image Preview', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show single attribute variation image based on first attribute select on product page.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					'is_pro'  => true,
				),

				array(
					'type' => 'sectionend',
					'id'   => 'single_variation_image_preview_options',
				),

				// Attribute large size
				array(
					'id'    => 'attr_large_size_options',
					'type'  => 'title',
					'title' => esc_html__( 'Large Size Attribute Section', 'variation-swatches-lite-plus' ),
					'desc'  => esc_html__( 'Make a attribute taxonomies size large on single product', 'variation-swatches-lite-plus' ),
				),

				array(
					'id'      => 'enable_large_size',
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Show First Attribute In Large Size', 'variation-swatches-lite-plus' ),
					'desc'    => esc_html__( 'Show Attribute taxonomies in large size.', 'variation-swatches-lite-plus' ),
					'default' => 'no',
					'is_pro'  => true,
				),

				array(
					'type' => 'sectionend',
					'id'   => 'attr_large_size_options',
				),
			);

			return $settings;
		}

	}
	endif;
