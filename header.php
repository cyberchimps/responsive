<?php
/**
 * Header Template
 *
 * @file           header.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
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

/**
 * Check the the header layout and hook the menu accordingly
 */
$responsive_header_layout = get_theme_mod( 'menu_position', 'in_header' );
if ( 'above_header' === $responsive_header_layout ) {
	add_action( 'responsive_header', 'responsive_display_menu_outside_container' );
} elseif ( 'in_header' === $responsive_header_layout ) {
	add_action( 'responsive_header_container', 'responsive_display_menu_outside_container' );
} elseif ( 'below_header' === $responsive_header_layout ) {
	add_action( 'responsive_header_end', 'responsive_display_menu_outside_container' );
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

<?php responsive_container(); // before container hook. ?>

<div id="container" class="hfeed">

<?php responsive_header(); // before header hook. ?>
	<div class="skip-container cf">
		<a class="skip-link screen-reader-text focusable" href="#primary"><?php esc_html_e( '&darr; Skip to Main Content', 'responsive' ); ?></a>
	</div><!-- .skip-container -->
		<?php
		get_sidebar( 'header' );

		$header_layout = get_theme_mod( 'header_layout_options', 'header-logo-left' );
		?>
	<div id="header_section">
	<header id="header" role="banner" class='<?php echo esc_attr( $header_layout ); ?>' <?php responsive_schema_markup( 'header' ); ?> >

		<?php responsive_header_top(); // before header content hook. ?>
        <?php responsive_in_header(); // header hook. ?>
        <div class="content-outer responsive-header" <?php responsive_schema_markup( 'organization' ); ?>>
			<div id="site-branding" itemtype="https://schema.org/Organization" itemscope="itemscope" >
		<?php if ( has_custom_logo() ) { ?>
			<?php the_custom_logo(); ?>
			<?php
			global $responsive_options;
			$responsive_options = responsive_get_options();
			if ( empty( get_theme_mod( 'res_hide_site_title' ) ) ) {
				?>
				<span class="site-name" <?php responsive_schema_markup( 'site_title' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" <?php responsive_schema_markup( 'url' ); ?> ><?php bloginfo( 'name' ); ?></a></span>
				<?php
			}
			if ( empty( get_theme_mod( 'res_hide_tagline' ) ) ) {
				?>
				<span class="site-description" <?php responsive_schema_markup( 'tagline' ); ?>><?php bloginfo( 'description' ); ?></span>
				<?php
			}
			?>
		<?php } elseif ( has_header_image() ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php responsive_schema_markup( 'url' ); ?>><img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>" <?php responsive_schema_markup( 'image' ); ?> /></a>
			<?php } else { // Header image was removed. ?>
					<?php
					global $responsive_options;
					$responsive_options = responsive_get_options();
					if ( empty( get_theme_mod( 'res_hide_site_title' ) ) ) {
						?>
						<span class="site-name" <?php responsive_schema_markup( 'site_title' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" <?php responsive_schema_markup( 'url' ); ?>><?php bloginfo( 'name' ); ?></a></span>
						<?php
					}
					if ( empty( get_theme_mod( 'res_hide_tagline' ) ) ) {
						?>

						<span class="site-description" <?php responsive_schema_markup( 'tagline' ); ?>><?php bloginfo( 'description' ); ?></span>
						<?php
					}
				}
			?>

			</div><!-- end of #site-branding -->
		<?php
		do_action( 'responsive_header_container' );
		?>
		</div>

		<?php responsive_header_bottom(); // after header content hook. ?>

	</header><!-- end of #header -->
	</div>
<?php responsive_header_end(); // after header container hook. ?>

<?php responsive_wrapper(); // before wrapper container hook. ?>

	<?php global $responsive_blog_layout_columns; ?>

<?php
global $responsive_options;
?>
