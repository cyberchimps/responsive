<?php
/**
 * Customizer panel type enforcement
 *
 * @package Responsive
 */

/**
 * Class Responsive_Customizer_Panel
 */
class Responsive_Customizer_Panel {
	/**
	 * ID of panel
	 *
	 * @var string the control ID.
	 */
	public $id;

	/**
	 * Args for panel instance.
	 *
	 * @var array args passed into panel instance.
	 */
	public $args = array();

	/**
	 * Responsive_Customizer_Panel constructor.
	 *
	 * @param string $id the control id.
	 * @param array  $args the panel args.
	 */
	public function __construct( $id, $args ) {
		$this->id   = $id;
		$this->args = $args;
	}
}
