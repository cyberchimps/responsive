<?php
/**
 * Responsive Pro Nudge Control.
 *
 * A reusable "Upgrade to Pro" nudge that can be dropped into any customizer
 * section/panel. Only meant to be instantiated via responsive_pro_nudge_control()
 * in helper.php, which already skips registering it when Responsive Pro is active.
 *
 * @package Responsive
 */

/**
 * Class Responsive_Control_Pro_Nudge
 */
class Responsive_Control_Pro_Nudge extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @var string
	 */
	public $type = 'responsive-control-pro-nudge';

	/**
	 * Optional image shown above the heading. Left empty by default;
	 * pass a URL per section via responsive_pro_nudge_control()'s $args.
	 *
	 * @var string
	 */
	public $nudge_image = '';

	/**
	 * Heading text.
	 *
	 * @var string
	 */
	public $nudge_title = '';

	/**
	 * Short intro sentence under the heading.
	 *
	 * @var string
	 */
	public $nudge_description = '';

	/**
	 * Checklist of Pro-only features for this section.
	 *
	 * @var array
	 */
	public $nudge_features = array();

	/**
	 * CTA button text.
	 *
	 * @var string
	 */
	public $button_text = '';

	/**
	 * CTA button URL.
	 *
	 * @var string
	 */
	public $button_url = '';

	/**
	 * Constructor.
	 *
	 * @param WP_Customize_Manager $manager The customize manager class.
	 * @param string               $id      Control id.
	 * @param array                $args    Control args.
	 */
	public function __construct( WP_Customize_Manager $manager, $id, array $args = array() ) {
		parent::__construct( $manager, $id, $args );

		if ( empty( $this->nudge_title ) ) {
			$this->nudge_title = esc_html__( '', 'responsive' );
		}

		if ( empty( $this->button_text ) ) {
			$this->button_text = esc_html__( 'Upgrade To Responsive Pro', 'responsive' );
		}

		if ( empty( $this->button_url ) ) {
			$this->button_url = 'https://cyberchimps.com/responsive-pro/?utm_source=wpdash&utm_medium=rtheme&utm_campaign=cstmzer&utm_content=upgrade-to-pro';
		}
	}

	/**
	 * Json conversion.
	 */
	public function to_json() {
		parent::to_json();
		$this->json['nudge_image']       = $this->nudge_image;
		$this->json['nudge_title']       = $this->nudge_title;
		$this->json['nudge_description'] = $this->nudge_description;
		$this->json['nudge_features']    = $this->nudge_features;
		$this->json['button_text']       = $this->button_text;
		$this->json['button_url']        = $this->button_url;
	}

	/**
	 * Render content. Left empty in favor of content_template().
	 */
	public function render_content() {}

	/**
	 * Underscore.js control template.
	 */
	public function content_template() {
		?>
		<div class="responsive-pro-nudge">
			<# if ( data.nudge_image ) { #>
			<div class="responsive-pro-nudge-image">
				<img src="{{ data.nudge_image }}" alt="" />
			</div>
			<# } #>

			<# if ( data.nudge_title ) { #>
			<h4 class="responsive-pro-nudge-title">{{ data.nudge_title }}</h4>
			<# } #>

			<# if ( data.nudge_description ) { #>
			<p class="responsive-pro-nudge-description">{{{ data.nudge_description }}}</p>
			<# } #>

			<# if ( data.nudge_features && data.nudge_features.length > 0 ) { #>
			<ul class="responsive-pro-nudge-features">
				<# for ( var i = 0; i < data.nudge_features.length; i++ ) { #>
				<li>{{ data.nudge_features[ i ] }}</li>
				<# } #>
			</ul>
			<# } #>

			<# if ( data.button_text && data.button_url ) { #>
			<a href="{{{ data.button_url }}}" target="_blank" rel="noopener noreferrer" class="button button-primary responsive-pro-nudge-button">{{ data.button_text }}</a>
			<# } #>
		</div>
		<?php
	}
}
