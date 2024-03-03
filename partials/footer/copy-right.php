<?php
/**
 * Footer Template
 *
 * @file           copy-right.php
 * @package        Responsive
 */

global $responsive_options;
$responsive_options = Responsive\Core\responsive_get_options();
$cyberchimps_link   = '';
$footer_text = get_option('footer-copyright');

?>

<div class="footer-layouts copyright">
	<?php
		echo do_shortcode( wp_kses_post($footer_text) );
	?>
</div>
