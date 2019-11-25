<?php
/**
 * Mobile nav Fullscreen part.
 *
 * @package Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'fullscreen' !== get_theme_mod( 'mobile_menu_style' ) ) {
	return;
}

// Navigation classes.
$classes = array( 'clr' );

$classes = implode( ' ', $classes );

?>

<div id="mobile-fullscreen" class="clr">

	<div id="mobile-fullscreen-inner" class="clr">

		<a href="#" class="close">
			<div class="close-icon-wrap">
				<div class="close-icon-inner"></div>
			</div>
		</a>

		<nav class="<?php echo esc_attr( $classes ); ?>">

			<?php
				get_template_part( 'partials/mobile/mobile-nav' );
			?>

		</nav>

	</div>

</div>
