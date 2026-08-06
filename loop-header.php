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
$responsive_page_description = null;

if ( is_home() && get_theme_mod( 'responsive_blog_post_title_toggle' ) ) {
	$responsive_page_title = responsive_free_get_option( 'blog_post_title_text', 'Blog Page' );
} elseif ( is_archive() ) {
	$responsive_page_title       = get_the_archive_title( '<h1 class="title-archive page-title">', '</h1>' );
	$responsive_page_description = get_the_archive_description( '<div class="taxonomy-description page-description">', '</div>' );
} elseif ( is_search() ) {
	// translators: %s is for search query.
	$responsive_page_title = sprintf( esc_html__( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' );
}

$responsive_show_breadcrumbs = false;
if ( 1 === $responsive_options['breadcrumb'] ) {
	if(is_front_page())
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_home_page', 0 ))
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	else if(is_home())
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_blog_posts_page', 0 ) )
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	else if(is_search())
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_search', 0 ))
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	else if(is_archive())
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_archive', 0 ))
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	else if(is_404() )
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_404_page', 0 ))
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	else if(is_single())
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_single_post', 0 ) )
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	else if( is_page())
	{
		if(1 === get_theme_mod( 'responsive_breadcrumb_enable_single_page', 0 ) )
		{
			$responsive_show_breadcrumbs = true;
		} 
	}
	if(get_theme_mod( 'responsive_breadcrumb_enable_singular', 0 ) && (1 === get_theme_mod( 'responsive_breadcrumb_enable_singular', 0 )))
	{
		set_theme_mod( 'responsive_breadcrumb_enable_single_post', 1 );
		set_theme_mod( 'responsive_breadcrumb_enable_single_page', 1 );
		set_theme_mod( 'responsive_breadcrumb_enable_singular', 0 );
		$responsive_show_breadcrumbs = true;
	}
}

if ( ! $responsive_page_title && ! $responsive_page_description && ! $responsive_show_breadcrumbs ) {
	return;
}

$is_blog_archive = ( is_home() || ( is_archive() && ! is_search() ) );
$blog_layout     = get_theme_mod( 'responsive_blog_title_layout', 'post_title_layout1' );

if ( $is_blog_archive ) {
	if ( 'post_title_layout2' === $blog_layout ) {
		// Output is handled in responsive_wrapper_top hook
		return;
	}

	$elements = get_theme_mod( 'responsive_blog_title_elements_positioning', array( 'title', 'description', 'breadcrumb' ) );
	if ( is_string( $elements ) ) {
		$decoded = json_decode( $elements, true );
		$elements = is_array( $decoded ) ? $decoded : explode( ',', $elements );
	} else if ( ! is_array( $elements ) ) {
		$elements = array();
	}

	// For layout1:
	// Hide everything on the blog page.
	if ( is_home() ) {
		$responsive_page_title = '';
		$responsive_page_description = '';
		$responsive_show_breadcrumbs = false;
	} else {
		// For archive pages, conditionally show elements based on their presence in the control.
		if ( ! in_array( 'breadcrumb', $elements, true ) ) {
			$responsive_show_breadcrumbs = false;
		} else {
			$responsive_show_breadcrumbs = true;
		}
		if ( ! in_array( 'title', $elements, true ) ) {
			$responsive_page_title = '';
		}
		if ( ! in_array( 'description', $elements, true ) ) {
			$responsive_page_description = '';
		}
	}

	if ( ! $responsive_page_title && ! $responsive_page_description && ! $responsive_show_breadcrumbs ) {
		return;
	}
}
?>
<div class="site-content-header">
	<?php 
	if ( $is_blog_archive ) {
		foreach ( $elements as $element ) {
			if ( 'breadcrumb' === $element && $responsive_show_breadcrumbs ) : ?>
				<div class="breadcrumbs" <?php responsive_check_yoast_enabled_breadcrumbs() ? '' : responsive_schema_markup( 'breadcrumb' ); ?>>
					<?php responsive_get_breadcrumb_lists(); ?>
				</div>
				<?php 
			elseif ( 'title' === $element && $responsive_page_title ) : ?>
				<div class="page-header">
					<h1 class="page-title"><?php echo wp_kses_post( $responsive_page_title ); ?></h1>
				</div>
				<?php 
			elseif ( 'description' === $element && $responsive_page_description ) : ?>
				<div class="page-header">
					<div class="page-description"><?php echo wp_kses_post( $responsive_page_description ); ?></div>
				</div>
				<?php
			endif;
		}
	} else {
		if ( $responsive_show_breadcrumbs && ( 'before' === get_theme_mod( 'responsive_breadcrumb_position', 'before' ) ) ) : ?>
			<div class="breadcrumbs" <?php responsive_check_yoast_enabled_breadcrumbs() ? '' : responsive_schema_markup( 'breadcrumb' ); ?>>
			<?php responsive_get_breadcrumb_lists(); ?>
		</div>
			<?php
		endif;
		if ( $responsive_page_title || $responsive_page_description ) :
			?>
			<div class="page-header">
				<?php if ( $responsive_page_title ) : ?>
					<h1 class="page-title"><?php echo wp_kses_post( $responsive_page_title ); ?></h1>
				<?php endif; ?>
				<?php if ( $responsive_page_description ) : ?>
					<div class="page-description"><?php echo wp_kses_post( $responsive_page_description ); ?></div>
				<?php endif; ?>
			</div>
			<?php
			endif;
		if ( $responsive_show_breadcrumbs && ( 'after' === get_theme_mod( 'responsive_breadcrumb_position', 'before' ) ) ) :
			?>
		<div class="breadcrumbs" <?php responsive_check_yoast_enabled_breadcrumbs() ? : responsive_schema_markup( 'breadcrumb' ); ?>>
			<?php responsive_get_breadcrumb_lists(); ?>
		</div>
	<?php endif; 
	}
	?>
</div>
