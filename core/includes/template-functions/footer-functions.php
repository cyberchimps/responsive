<?php
/**
 * Calls in Templates using theme hooks.
 *
 * @package responsive
 */

// namespace responsive;

// defined( 'ABSPATH' ) || exit;

/**
 * Main Call for responsive footer
 */
function footer_markup() {
	get_template_part( 'template-parts/footer/base' );
}

/**
 * Checks to see if the row has any content.
 *
 * @param string $row the name of the row.
 * @return bool
 */
function display_footer_row( $row = 'bottom' ) {
	$display = false;
	foreach ( array( '1', '2', '3', '4', '5' ) as $column ) {
		$elements = get_theme_mod( 'footer_items', Responsive\Core\get_responsive_customizer_defaults( 'footer_items' ) );
		if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
			$display = true;
			break;
		}
	}
	return $display;
}

/**
 * Adds support to render footer columns.
 *
 * @param string $row the name of the row.
 * @param string $column the name of the column.
 */
function render_footer( $row = 'bottom', $column = '1' ) {
	$elements = get_theme_mod( 'footer_items', Responsive\Core\get_responsive_customizer_defaults( 'footer_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
		foreach ( $elements[ $row ][ $row . '_' . $column ] as $key => $item ) {
			$template = apply_filters( 'responsive_footer_elements_template_path', 'template-parts/footer/' . $item, $item, $row, $column );
			get_template_part( $template );
		}
	}
}

/**
 * Adds support to get the footer item count for a specific column.
 *
 * @param string $row the name of the row.
 * @param string $column the name of the column.
 */
function footer_column_item_count( $row = 'bottom', $column = '1' ) {
	$count    = 0;
	$elements = get_theme_mod( 'footer_items', Responsive\Core\get_responsive_customizer_defaults( 'footer_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
		$count = count( $elements[ $row ][ $row . '_' . $column ] );
	}
	return $count;
}


/**
 * Footer Top Row
 */
function top_footer() {
	if ( display_footer_row( 'top' ) ) {
		get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'top' ) );
	}
}

/**
 * Footer Middle Row
 */
function middle_footer() {
	if ( display_footer_row( 'middle' ) ) {
		get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'middle' ) );
	}

}

/**
 * Footer Bottom Row
 */
function bottom_footer() {
	if ( display_footer_row( 'bottom' ) ) {
		get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'bottom' ) );
	}
}

/**
 * Footer Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function footer_column( $row, $column ) {
	render_footer( $row, $column );
}


/**
 * Footer HTML
 */
function footer_html() {
	$content = get_theme_mod( 'responsive_footer_html_content', '{copyright} {year} {site-title} {theme-credit}' );
	if ( $content || is_customize_preview() ) {
		$link_style = get_theme_mod( 'responsive_footer_html_link_style', 'normal' );
		echo '<div class="footer-html inner-link-style-' . esc_attr( $link_style ) . '">';
		// customizer_quick_link();
		echo '<div class="footer-html-inner">';
		$content = str_replace( '{copyright}', '&copy;', $content );
		$content = str_replace( '{year}', date_i18n( _x( 'Y', 'copyright date format; check date() on php.net', 'responsive' ) ), $content );
		$content = str_replace( '{site-title}', get_bloginfo( 'name' ), $content );
		// translators: %s is link to responsive WP.
		$content = str_replace( '{theme-credit}', sprintf( __( '- Powered by %s', 'responsive' ), '<a href="https://www.cyberchimps.com/" rel="nofollow noopener" target="_blank">Responsive Theme</a>' ), $content );
		echo do_shortcode( wpautop( $content ) );
		echo '</div>';
		echo '</div>';
	}
}
/**
 * Checks whether the footer navigation menu is active.
 *
 * @return bool True if the footer navigation menu is active, false otherwise.
 */
function is_footer_nav_menu_active() : bool {
	return (bool) has_nav_menu( FOOTER_NAV_MENU_SLUG );
}

/**
 * Displays the footer navigation menu.
 *
 * @param array $args Optional. Array of arguments. See wp nav menu documentation for a list of supported arguments.
 */
function display_footer_nav_menu( array $args = array() ) {
	if ( ! isset( $args['container'] ) ) {
		$args['container'] = 'ul';
	}
	if ( ! isset( $args['depth'] ) ) {
		$args['depth'] = 1;
	}
	if ( ! isset( $args['addon_support'] ) ) {
		$args['addon_support'] = true;
	}
	$args['theme_location'] = FOOTER_NAV_MENU_SLUG;

	$args['fallback_cb'] = 'responsive_fallback_menu';

	wp_nav_menu(
		array(
			'container'      => $args['container'],
			'depth'          => $args['depth'],
			'addon_support'  => $args['addon_support'],
			'theme_location' => $args['theme_location'],
			'fallback_cb'    => $args['fallback_cb'],
		)
	);
}


/**
 * Desktop Navigation
 */
function footer_navigation() {
	?>
	<nav id="footer-navigation" class="footer-navigation footer-navigation-layout-stretch-<?php echo esc_attr( get_theme_mod( 'responsive_footer_stretch_menu' ) ? "true" : "false" ); ?>" role="navigation" aria-label="<?php esc_attr_e( 'Footer Navigation', 'responsive' ); ?>">
		<?php customizer_quick_link(); ?>
		<div class="footer-menu-container">
			<?php
			if ( is_footer_nav_menu_active() ) {
				display_footer_nav_menu( array( 'menu_id' => 'footer-menu' ) );
			} else {
				display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #footer-navigation -->
	<?php
}

/**
 * Desktop Social
 */
function footer_social() {
	$items             = get_theme_mod( 'footer_social_items', 'items' );
	$title             = get_theme_mod( 'footer_social_title' );
	$show_label        = get_theme_mod( 'footer_social_show_label' );
	$brand_colors      = get_theme_mod( 'footer_social_brand' );
	$brand_color_class = '';
	if ( 'onhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-hover';
	} elseif ( 'untilhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-until';
	} elseif ( 'always' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-always';
	}
	echo '<div class="footer-social-wrap">';
	customizer_quick_link();
	if ( ! empty( $title ) ) {
		echo '<h2 class="widget-title">' . wp_kses_post( $title ) . '</h2>';
	}
	echo '<div class="footer-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( get_theme_mod( 'footer_social_style' ) ) . esc_attr( $brand_color_class ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = get_theme_mod( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = str_replace( 'mailto:', '', $link );
					if ( is_email( $link ) ) {
						$link = 'mailto:' . $link;
					}
				}
				echo '<a href="' . esc_attr( $link ) . '"' . esc_attr( $show_label ? '' : ' aria-label="' . $item['label'] . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] || apply_filters( 'responsive_social_link_target', false, $item ) ? '' : 'target="_blank" rel="noopener noreferrer"  ' ) . 'class="social-button footer-social-item social-link-' . esc_attr( $item['id'] ) . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
				if ( 'image' === $item['source'] ) {
					if ( $item['imageid'] && wp_get_attachment_image( $item['imageid'], 'full', true ) ) {
						echo wp_get_attachment_image(
							$item['imageid'],
							'full',
							true,
							array(
								'class' => 'social-icon-image',
								'style' => 'max-width:' . esc_attr( $item['width'] ) . 'px',
							)
						);
					} elseif ( ! empty( $item['url'] ) ) {
						echo '<img src="' . esc_attr( $item['url'] ) . '" alt="' . esc_attr( $item['label'] ) . '" class="social-icon-image" style="max-width:' . esc_attr( $item['width'] ) . 'px"/>';
					}
				} else {
					print_icon( $item['icon'], '', false );
				}
				if ( $show_label ) {
					echo '<span class="social-label">' . esc_html( $item['label'] ) . '</span>';
				}
				echo '</a>';
			}
		}
	}
	echo '</div>';
	echo '</div>';
}

/**
 * Scroll To Top.
 */
function scroll_up() {
	if ( get_theme_mod( 'scroll_up' ) ) {
		echo '<a id="kt-scroll-up" href="#wrapper" aria-label="' . esc_attr__( 'Scroll to top', 'responsive' ) . '" class="scroll-up-wrap scroll-ignore scroll-up-side-' . esc_attr( get_theme_mod( 'scroll_up_side' ) ) . ' scroll-up-style-' . esc_attr( get_theme_mod( 'scroll_up_style' ) ) . ' vs-lg-' . ( get_theme_mod( 'scroll_up_visiblity', 'desktop' ) ? 'true' : 'false' ) . ' vs-md-' . ( get_theme_mod( 'scroll_up_visiblity', 'tablet' ) ? 'true' : 'false' ) . ' vs-sm-' . ( get_theme_mod( 'scroll_up_visiblity', 'mobile' ) ? 'true' : 'false' ) . '">';
		print_icon( get_theme_mod( 'scroll_up_icon' ), esc_attr__( 'Scroll to top', 'responsive' ), false );
		echo '</a>';
	}
}
