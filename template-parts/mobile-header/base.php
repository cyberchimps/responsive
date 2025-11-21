<?php
/**
 * Template part for displaying the header
 *
 * @package responsive
 */

?>
<header id="masthead-mobile" class="<?php echo esc_attr( join( ' ', apply_filters( 'responsive_header_class', array( 'site-header', 'site-header-mobile' ) ) ) ); ?>" role="banner" <?php responsive_schema_markup( 'site-header' ); ?>>
	<div id="main-header-mobile" class="responsive-site-header-wrap">
		<div class="site-mobile-header-inner-wrap<?php /* echo esc_attr( 'top_main_bottom' === get_theme_mod( 'header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
		>
			<div class="site-mobile-header-upper-wrap">
				<div class="site-mobile-header-upper-inner-wrap<?php /* echo esc_attr( 'top_main' === get_theme_mod( 'header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
				>
				<?php
					/**
					 * Responsive Above Header
					 *
					 * Hooked Responsive\above_header
					 */
					do_action( 'responsive_above_mobile_header' );
					/**
					 * Responsive Primary Header
					 *
					 * Hooked Responsive\primary_header
					 */
					do_action( 'responsive_primary_mobile_header' );
				?>
				</div>
			</div>
			<?php
			/**
			 * Responsive Below Header
			 *
			 * Hooked Responsive\below_header
			 */
			do_action( 'responsive_below_mobile_header' );
			?>
		</div>
	</div>
	<?php
	/**
	 * Responsive Off-Canvas Panel
	 * Renders the off-canvas menu panel inside mobile header
	 */
	responsive_render_off_canvas_panel();
	?>
</header><!-- #masthead-mobile -->
