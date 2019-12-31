<?php
/**
 * The template for displayong full width layout.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id='full-home'>
<?php
$responsive_options = responsive_get_options();

$display_slider = ( ! empty( $responsive_options['enable_slider'] ) ) ? $responsive_options['enable_slider'] : 0;

if ( 1 != $display_slider ) {
	$slider_content = $responsive_options['home_slider'];
	?>
<div class='slider'><?php echo do_shortcode( $slider_content ); ?></div>
	<?php
}
?>
</div>
