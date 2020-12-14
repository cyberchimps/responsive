<?php
/**
 * Search Form Template
 *
 * @file           searchform.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/searchform.php
 * @link           http://codex.wordpress.org/Function_Reference/get_search_form
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'Responsive_Addons_Pro' ) ) {

	$search_icon   = get_theme_mod( 'responsive_menu_last_item', 'none' );
	$search_screen = get_theme_mod( 'search_style', 'search' );
	if ( 'search' === $search_icon && 'full-screen' == $search_screen ) {
		?>
		<div class="full-screen-search-wrapper" id="full-screen-search-wrapper">
			<span id="search-close" class="search-close"></span>
			<div class="full-screen-search-container">
				<div class="container">
		<?php
	}
}
?>
<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'responsive' ); ?></label>
	<div class="res-search-wrapper">
	<input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search here &hellip;', 'responsive' ); ?>" />
	<button type="submit" class="search-submit" value="Search">	<span class="res-search-icon icon-search"></span></button>
</div>
</form>
<?php
if ( class_exists( 'Responsive_Addons_Pro' ) ) {

	$search_icon   = get_theme_mod( 'responsive_menu_last_item', 'none' );
	$search_screen = get_theme_mod( 'search_style', 'search' );
	if ( 'search' === $search_icon && 'full-screen' == $search_screen ) {
		?>
			</div>
		</div>
	</div>
		<?php
	}
}
