<?php
/**
 * Recommended Addon template
 *
 * @package Responsive
 */

?>

<div class="about-tabs">
	<p><?php esc_html_e( 'We recommend that you install the following free plugins to get the best experience out of the Responsive theme.' ); ?> </p>
	<div>
		<h4><?php esc_html_e( 'Responsive Add Ons' ); ?></h4>
		<p>
			<?php
			esc_html_e( 'With this free WordPress plugin, you can import beautifully designed, ready to use websites with full demo content. Update the content and launch your website in minutes.' );
			?>
		</p>
		<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'gdpr-cookie-consent' ); //phpcs:ignore ?>
	</div>
</div>
