<?php
/**
 * Template part for displaying the header
 *
 * @package responsive
 */


?>
<header id="masthead" class="site-header" role="banner" <?php responsive_schema_markup( 'site-header' ); ?>>
	<div id="main-header" class="site-header-wrap">
		<div class="site-header-inner-wrap<?php /* echo esc_attr( 'top_main_bottom' === get_theme_mod( 'header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
			<?php
			/*
			If ( 'top_main_bottom' === get_theme_mod( 'header_sticky' ) ) {
				echo ' data-reveal-scroll-up="' . ( get_theme_mod( 'header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
				echo ' data-shrink="' . ( get_theme_mod( 'header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
				if ( get_theme_mod( 'header_sticky_shrink' ) ) {
					echo ' data-shrink-height="' . esc_attr( get_theme_mod( 'header_sticky_main_shrink', 'size' ) ) . '"';
				}
			}
			*/
			?>
		>
			<div class="site-header-upper-wrap">
				<div class="site-header-upper-inner-wrap<?php /* echo esc_attr( 'top_main' === get_theme_mod( 'header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
					<?php
					/*
					If ( 'top_main' === get_theme_mod( 'header_sticky' ) ) {
						echo ' data-reveal-scroll-up="' . ( get_theme_mod( 'header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
						echo ' data-shrink="' . ( get_theme_mod( 'header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
						if ( get_theme_mod( 'header_sticky_shrink' ) ) {
							echo ' data-shrink-height="' . esc_attr( get_theme_mod( 'header_sticky_main_shrink', 'size' ) ) . '"';
						}
					}
					*/
					?>
				>
				<?php
					/**
					 * Responsive Top Header
					 *
					 * Hooked Responsive\top_header
					 */
					do_action( 'responsive_top_header' );
					/**
					 * Responsive Main Header
					 *
					 * Hooked Responsive\main_header
					 */
					do_action( 'responsive_main_header' );
				?>
				</div>
			</div>
			<?php
			/**
			 * Responsive Bottom Header
			 *
			 * Hooked Responsive\bottom_header
			 */
			do_action( 'responsive_bottom_header' );
			?>
		</div>
	</div>
	<?php
	/**
	 * Responsive Mobile Header
	 *
	 * Hooked Responsive\mobile_header
	 */
	do_action( 'responsive_mobile_header' );
	?>
</header><!-- #masthead -->
