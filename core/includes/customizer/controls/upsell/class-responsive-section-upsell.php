<?php
/**
 * The upsell for the front page sections
 *
 * Pro customizer section.
 *
 * @package Responsive
 */

/**
 * Class Responsive_Upsell_Section
 */
class Responsive_Upsell_Section extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'responsive-upsell-section';

	/**
	 * Upsell text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $theme_info_title = '';
	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function json() {
		$json = parent::json();

		$json['theme_info_title'] = $this->theme_info_title;
		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() {
		?>

		<li id="accordion-section-{{ data.id }}"
			class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
				<h3 class="accordion-section-title">
				{{data.theme_info_title}}
				</h3>
		</li>
		<?php
	}
}
