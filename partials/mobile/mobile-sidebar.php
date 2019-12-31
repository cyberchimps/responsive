<?php
/**
 * Mobile nav Sidebar part.
 *
 * @package Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'sidebar' !== get_theme_mod( 'mobile_menu_style' ) ) {
	return;
}

// Navigation classes.
$classes = array( 'clr' );

$classes = implode( ' ', $classes );

$sidebar_mobile_position = get_theme_mod( 'mobile_menu_style_sidebar_position' );

?>

<div id="mobile-sidebar" class="clr <?php echo $sidebar_mobile_position; ?>">

	<div id="mobile-sidebar-inner" class="clr">

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
<div id="responsive-sidebar-overlay"></div>
