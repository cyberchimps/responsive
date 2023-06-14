<?php

/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Useful Plugins Tab
 *
 * @link       https://cyberchimps.com/
 * @since      4.8.4
 *
 * @package responsive
 */

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
	<div class="row gy-4">
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="responsive-theme-feature-cards">
				<div class="responsive-theme-feature-cards-content">
					<span class="responsive-theme-feature-card responsive-theme-feature-card-free"><span>Free</span></span>
					<div class="responsive-theme-feature-card-title mt-2">Responsive Starter Templates</div>
					<div class="responsive-theme-feature-card-desc">Lorem ipsum dolor sit amet consectetur. Quis massa enim sed.</div>
                    <?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html('responsive-add-ons'); //phpcs:ignore 
					?>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="responsive-theme-feature-cards">
				<div class="responsive-theme-feature-cards-content">
					<span class="responsive-theme-feature-card responsive-theme-feature-card-free"><span>Free</span></span>
					<div class="responsive-theme-feature-card-title mt-2">Responsive Blocks Library</div>
					<div class="responsive-theme-feature-card-desc">Lorem ipsum dolor sit amet consectetur. Quis massa enim sed.</div>
                    <?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html('responsive-add-ons'); //phpcs:ignore 
					?>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="responsive-theme-feature-cards">
				<div class="responsive-theme-feature-cards-content">
					<span class="responsive-theme-feature-card responsive-theme-feature-card-pro"><span>Pro</span></span>
					<div class="responsive-theme-feature-card-title mt-2">Responsive Elementor Addons</div>
					<div class="responsive-theme-feature-card-desc">Lorem ipsum dolor sit amet consectetur. Quis massa enim sed.</div>
                    <?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html('responsive-add-ons'); //phpcs:ignore 
					?>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="responsive-theme-feature-cards">
				<div class="responsive-theme-feature-cards-content">
					<span class="responsive-theme-feature-card responsive-theme-feature-card-free"><span>Free</span></span>
					<div class="responsive-theme-feature-card-title mt-2">WP Legal Pages</div>
					<div class="responsive-theme-feature-card-desc">Lorem ipsum dolor sit amet consectetur. Quis massa enim sed.</div>
                    <?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html('responsive-add-ons'); //phpcs:ignore 
					?>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="responsive-theme-feature-cards">
				<div class="responsive-theme-feature-cards-content">
					<span class="responsive-theme-feature-card responsive-theme-feature-card-free"><span>Free</span></span>
					<div class="responsive-theme-feature-card-title mt-2">GDPR Cookie Consent</div>
					<div class="responsive-theme-feature-card-desc">Lorem ipsum dolor sit amet consectetur. Quis massa enim sed.</div>
                    <?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html('responsive-add-ons'); //phpcs:ignore 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
