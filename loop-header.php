<?php
/**
 * Loop Header Template-Part File
 *
 * @file           loop-header.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/loop-header.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$responsive_options = get_option( 'responsive_theme_options' );

$responsive_page_title       = '';
$responsive_page_description = '';

if ( is_home() && responsive_free_get_option( 'blog_post_title_toggle' ) ) {
	$responsive_page_title = '<h1 class="page-title">' . responsive_free_get_option( 'blog_post_title_text' ) . '</h1>';
} elseif ( is_archive() ) {
	$responsive_page_title       = get_the_archive_title( '<h1 class="title-archive page-title">', '</h1>' );
	$responsive_page_description = get_the_archive_description( '<div class="taxonomy-description page-description">', '</div>' );
} elseif ( is_search() ) {
	// translators: %s is for search query.
	$responsive_page_title = '<h1 class="page-title">' . sprintf( esc_html__( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' ) . '</h1>';
}

$responsive_show_breadcrumbs = true;
if ( is_front_page() || ( 1 == $responsive_options['breadcrumb'] ) ) {
	$responsive_show_breadcrumbs = false;
}

if ( ! $responsive_page_title && ! $responsive_page_description && ! $responsive_show_breadcrumbs ) {
	return;
}
?>
<div class="site-content-header">
	<?php if ( $responsive_show_breadcrumbs && ( 'before' === get_theme_mod( 'responsive_breadcrumb_position', 'before' ) ) ) : ?>
	<div class="breadcrumbs" <?php responsive_schema_markup( 'breadcrumb' ); ?>>
		<?php responsive_get_breadcrumb_lists(); ?>
	</div>
		<?php
	endif;
	if ( $responsive_page_title || $responsive_page_description ) :
		?>
		<div class="page-header">
			<h1 class="page-title"><?php echo wp_kses_post( $responsive_page_title ); ?></h1>

			<div class="page-description"><?php echo wp_kses_post( $responsive_page_description ); ?></div>
		</div>
		<?php
		endif;
	if ( $responsive_show_breadcrumbs && ( 'after' === get_theme_mod( 'responsive_breadcrumb_position', 'before' ) ) ) :
		?>
	<div class="breadcrumbs" <?php responsive_schema_markup( 'breadcrumb' ); ?>>
		<?php responsive_get_breadcrumb_lists(); ?>
	</div>
<?php endif; ?>
</div>
