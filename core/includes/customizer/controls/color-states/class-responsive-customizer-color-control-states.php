<?php
/**
 * Customizer Control: responsive-color (states)
 *
 * Supports Normal / Hover / Active / Gradient
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Color_Control_States' ) ) :

class Responsive_Customizer_Color_Control_States extends WP_Customize_Control {

	public $type = 'alpha-color-states';

	public $palette;
	public $show_opacity = true;

	public $is_hover_required  = false;
	public $is_active_required = false;

	public $is_gradient_available = false;
	public $gradient_element      = '';
	public $gradient_default      = '';
	public $color_type            = 'color';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );

		$this->is_hover_required      = ! empty( $args['is_hover_required'] );
		$this->is_active_required     = ! empty( $args['is_active_required'] );
		$this->is_gradient_available  = ! empty( $args['is_gradient_available'] );
		$this->gradient_element       = isset( $args['gradient_element'] ) ? $args['gradient_element'] : '';
		$this->gradient_default       = isset( $args['gradient_default'] ) ? $args['gradient_default'] : '';
		$this->color_type             = isset( $args['color_type'] ) ? $args['color_type'] : 'color';
	}

	public function enqueue() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style(
			'responsive-color-states',
			RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/color-states.min.css',
			array( 'wp-color-picker' ),
			'1.0.0'
		);
	}

	public function to_json() {
	parent::to_json();

	$states = array( 'normal' );

	if ( ! empty( $this->settings['hover'] ) ) {
		$states[] = 'hover';
	}

	if ( ! empty( $this->settings['active'] ) ) {
		$states[] = 'active';
	}

	$this->json['default'] = array();
	$this->json['value']   = array();
	$this->json['link']    = array();

	foreach ( $states as $state ) {
		$this->json['default'][ $state ] =
			isset( $this->settings[ $state ]->default )
				? $this->settings[ $state ]->default
				: '';

		$this->json['value'][ $state ] =
			$this->settings[ $state ]->value();

		$this->json['link'][ $state ] =
			$this->get_link( $state );
	}

	$this->json['is_hover_required']  = isset( $this->settings['hover'] );
	$this->json['is_active_required'] = isset( $this->settings['active'] );

	$this->json['show_opacity']   = true;
	$this->json['id']             = $this->id;
	$this->json['colorPalettes']  = responsive_default_color_palettes();
}


	protected function render_content() {}
}

endif;
