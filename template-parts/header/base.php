<?php
/**
 * Template part for displaying the header
 *
 * @package responsive
 */

?>
<header id="masthead" class="site-header" role="banner" <?php responsive_schema_markup( 'site-header' ); ?>>
	<div id="main-header" class="responsive-site-header-wrap">
		<div class="site-header-inner-wrap<?php /* echo esc_attr( 'top_main_bottom' === get_theme_mod( 'header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
		>
			<div class="site-header-upper-wrap">
				<div class="site-header-upper-inner-wrap<?php /* echo esc_attr( 'top_main' === get_theme_mod( 'header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
				>
				<?php
					/**
					 * Responsive Above Header
					 *
					 * Hooked Responsive\above_header
					 */
					do_action( 'responsive_above_header' );
					/**
					 * Responsive Primary Header
					 *
					 * Hooked Responsive\primary_header
					 */
					do_action( 'responsive_primary_header' );
				?>
				</div>
			</div>
			<?php
			/**
			 * Responsive Below Header
			 *
			 * Hooked Responsive\below_header
			 */
			do_action( 'responsive_below_header' );
			?>
		</div>
	</div>
</header><!-- #masthead -->
