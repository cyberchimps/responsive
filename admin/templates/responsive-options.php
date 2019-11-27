<?php
/**
 * Responsive Options
 *
 * @package responsive
 */

?>

<div class="responsive-about-tabs about-tabs">
	<div id="getting_started" class="columns-3 tab-content active">
		<div class="about-col">
			<h3><?php esc_html_e( 'Recommended Actions', 'responsive' ); ?></h3>
			<p><?php esc_html_e( "We've compiled a list of things you need to do get the best experience out of Responsive.", 'responsive' ); ?></p>
			<a href="<?php echo esc_url( add_query_arg( array( 'action' => 'recommended_addons' ), admin_url( 'themes.php?page=responsive-options' ) ) ); ?>" class='button button-primary'><?php esc_html_e( 'Lets get Started', 'responsive' ); ?></a>
		</div>
		<div class="about-col">
			<h3><?php esc_html_e( 'Theme Documentation', 'responsive' ); ?></h3>
			<p><?php esc_html_e( 'Need more help? Check out the Responsive theme docs to learn about all the Responsive features.', 'responsive' ); ?></p>
			<a href="<?php echo esc_url( 'https://docs.cyberchimps.com/responsive?utm_source=responsive-theme&utm_medium=see-documentation&utm_campaign=responsive-documentation' ); ?>" target="_blank"><?php esc_html_e( 'See Documentation', 'responsive' ); ?></a>
		</div>
		<div class="about-col">
			<h3><?php esc_html_e( 'Theme Customization', 'responsive' ); ?></h3>
			<p><?php esc_html_e( 'Customize every aspect of the Responsive theme (layout, typography & colors) using the customizer settings.', 'responsive' ); ?></p>
			<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank"><?php esc_html_e( 'Customize Responsive', 'responsive' ); ?></a>
		</div>
	</div>
</div>

<div class="responsive-about-tabs about-tabs">
	<div class='responsive-mainchimps-wrapper'>
		<h3><?php esc_html_e( 'Get Updates & Freebies', 'responsive' ); ?></h3>
		<p><?php esc_html_e( 'Enter your name & email address below to get the latest theme updates and free offers in your email inbox.', 'responsive' ); ?></p>
		<!-- Begin Mailchimp Signup Form -->
		<div id="mc_embed_signup">
			<form action="https://cyberchimps.us10.list-manage.com/subscribe/post?u=180122451aa011d86a38dfd0c&amp;id=6260ca3af6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<div class="mc-field-group">
						<label for="mce-EMAIL">Email Address </label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
					</div>
					<div class="mc-field-group">
						<label for="mce-FNAME">First Name </label>
						<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
					</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_180122451aa011d86a38dfd0c_6260ca3af6" tabindex="-1" value=""></div>
					<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</div>
			</form>
		</div>
		<!--End mc_embed_signup-->
	</div>
</div>
