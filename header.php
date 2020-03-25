<?php
/**
 * Header Template
 *
 * @file           header.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?> <?php responsive_schema_markup( 'body' ); ?> >
	<?php wp_body_open(); ?>
	<div class="skip-container cf">
		<a class="skip-link screen-reader-text focusable" href="#primary"><?php esc_html_e( '&darr; Skip to Main Content', 'responsive' ); ?></a>
	</div><!-- .skip-container -->
	<div class="site hfeed">
		<?php
		Responsive\responsive_header_top();
		// Elementor `header` location.
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
			?>

			<header id="masthead" class="site-header" role="banner" <?php responsive_schema_markup( 'site-header' ); ?> >
				<div class="container">
					<div class="row">
						<?php
						// Get elements.
						$responsive_header_elements = get_theme_mod(
							'responsive_header_elements',
							array(
								'site-branding',
								'main-navigation',
							)
						);

						// Loop through elements.
						foreach ( $responsive_header_elements as $element ) {
							get_template_part( 'partials/header/' . $element );
						}
						?>
					</div>
				</div>
			</header>

			<?php
		}
		Responsive\responsive_header_bottom();
		?>
