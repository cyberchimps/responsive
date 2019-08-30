<?php
/**
 * Responsive Options
 *
 * @package responsive
 */

?>
<div class="about-tabs">
<div id="getting_started" class="columns-3 tab-content active">
	<div class="about-col">
		<h3><?php esc_html_e( 'Recommended Actions' ); ?></h3>
		<p><?php esc_html_e( "We've compiled a list of things you need to do get the best experience out of Responsive." ); ?></p>
		<a href="<?php echo esc_url( add_query_arg( array( 'action' => 'recommended_addons' ), admin_url( 'themes.php?page=responsive-options' ) ) ); ?>" class='button button-primary'><?php esc_html_e( 'Lets get Started' ); ?></a>
	</div>
	<div class="about-col">
		<h3><?php esc_html_e( 'Theme Documentation' ); ?></h3>
		<p><?php esc_html_e( 'Need more help? Check out the Responsive theme docs to learn about all the Responsive features.' ); ?></p>
		<a href="<?php echo esc_url( 'https://docs.cyberchimps.com/responsive' ); ?>" target="_blank"><?php esc_html_e( 'See Documentation' ); ?></a>
	</div>
	<div class="about-col">
		<h3><?php esc_html_e( 'Theme Customization' ); ?></h3>
		<p><?php esc_html_e( 'Customize every aspect of the Responsive theme (layout, typography & colors) using the customizer settings.' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize Responsive' ); ?></a>
	</div>
</div>
</div>
