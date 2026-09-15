<?php
/**
 * Calls in content using theme hooks.
 *
 * @package responsive
 */

// Exit if accessed directly.
if( ! defined( 'ABSPATH' ) ) {
   exit;
}

require get_template_directory() . '/core/includes/template-functions/header-functions.php';
require get_template_directory() . '/core/includes/template-functions/mobile-header-functions.php';
require get_template_directory() . '/core/includes/builder/class-responsive-builder-footer.php';

/**
 * Responsive Header.
 *
 * @see Responsive\header_markup();
 */
add_action( 'responsive_header', 'header_markup' );
add_filter( 'responsive_header_class', 'responsive_header_builder_width_class' );

/**
 * Responsive Header Rows
 *
 * @see above_header();
 * @see primary_header();
 * @see below_header();
 */
add_action( 'responsive_above_header', 'above_header' );
add_action( 'responsive_primary_header', 'primary_header' );
add_action( 'responsive_below_header', 'below_header' );
add_action( 'responsive_header_social', 'responsive_get_social_icons' );

/**
 * Responsive Header Columns
 *
 * @see header_column();
 */
add_action( 'responsive_render_header_column', 'header_column', 10, 2 );

/**
 * Responsive Mobile Header
 * 
 * @see Responsive\mobile_header_markup()
 */
add_action( 'responsive_mobile_header', 'mobile_header_markup' );

/**
 * Responsive Mobile Header Rows
 * 
 * @see above_mobile_header();
 * @see primary_mobile_header();
 * @see below_mobile_header();
 */
add_action( 'responsive_above_mobile_header', 'above_mobile_header' );
add_action( 'responsive_primary_mobile_header', 'primary_mobile_header' );
add_action( 'responsive_below_mobile_header', 'below_mobile_header' );

/**
 * Responsive Mobile Header Columns
 * 
 * @see mobile_header_column()
 */
add_action( 'responsive_render_mobile_header_column', 'mobile_header_column', 10, 2 );

// Load Cart Flyout Markup on Footer.
add_action( 'responsive_footer_before', 'responsive_header_woo_cart_slide_in_router' );

// Load Off-Canvas Panel if toggle button is present in mobile/tablet header.
// This is rendered inside the mobile header wrapper, not after header.

add_action( 'resposive_entry_content_404_page', 'resposive_entry_content_404_page_template', 10 );

function resposive_entry_content_404_page_template() {
   ?>
      <div class="<?php echo esc_attr( join( ' ', apply_filters( 'responsive_404_class', array( 'row' ) ) ) ); ?>">
         <?php Responsive\responsive_in_wrapper(); // wrapper hook. ?>
         <main id="primary" class="content-area grid col-940" <?php responsive_schema_markup( 'main' ); ?> role="main">
            <?php get_template_part( 'loop-header', get_post_type() ); ?>
            <?php Responsive\responsive_entry_before(); ?>
            <section id="post-0" class="error404 hentry">
               <?php Responsive\responsive_entry_top(); ?>

               <div class="post-entry">
                     <?php get_template_part( 'loop-no-posts', get_post_type() ); ?>
               </div><!-- end of .post-entry -->

               <?php Responsive\responsive_entry_bottom(); ?>
            </section><!-- end of #post-0 -->
            <?php Responsive\responsive_entry_after(); ?>

         </main><!-- end of #content-full -->
         <?php get_sidebar(); ?>
      </div>
   <?php
}

add_action( 'responsive_wrapper_top', 'responsive_single_blog_banner2' );

function responsive_single_blog_banner2() {
	if ( is_singular( 'post' ) && get_theme_mod( 'responsive_single_blog_post_title_layout', 'post_title_layout1' ) === 'post_title_layout2' ) {
		$elements = responsive_blog_single_elements_positioning();
		if ( empty( $elements ) ) {
			return;
		}

		global $post;
		setup_postdata( $post );
		?>
		<?php
		$single_featured_image_position = get_theme_mod( 'responsive_single_blog_featured_image_position', 'none' );
		$single_featured_image_ratio    = get_theme_mod( 'responsive_single_blog_featured_image_ratio', 'original' );
		
		$ratio_css = '';
		if ( 'predefined' === $single_featured_image_ratio ) {
			$predefined_ratio = get_theme_mod( 'responsive_single_blog_featured_image_predefined_ratio', '1:1' );
			$ratio_value = str_replace( ':', '/', $predefined_ratio );
			$ratio_css = ' aspect-ratio: ' . esc_attr( $ratio_value ) . ';';
		} elseif ( 'custom' === $single_featured_image_ratio ) {
			$custom_width  = get_theme_mod( 'responsive_single_blog_featured_image_custom_width', '' );
			$custom_height = get_theme_mod( 'responsive_single_blog_featured_image_custom_height', '' );
			if ( $custom_width && $custom_height ) {
				$ratio_css = ' aspect-ratio: ' . esc_attr( $custom_width ) . '/' . esc_attr( $custom_height ) . ';';
			}
		}
		
		$section_style = '';
		if ( 'background' === $single_featured_image_position && has_post_thumbnail() && ! post_password_required() ) {
			$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
			if ( $featured_image_url ) {
				$overlay_color = Responsive\Core\responsive_prepare_css_value( 'responsive_single_blog_featured_image_overlay_color', '' );
				$overlay_css = empty( $overlay_color ) ? 'transparent' : $overlay_color;
				$section_style = ' style="--overlay-color: ' . $overlay_css . '; background-image: linear-gradient(var(--overlay-color), var(--overlay-color)), url(' . esc_url( $featured_image_url ) . '); background-repeat: no-repeat; background-size: cover; background-attachment: scroll; background-position: center center;' . $ratio_css . '"';
			}
		}
		?>
		<section class="responsive-blog-single-banner2"<?php echo $section_style; ?>>
			<div class="container">
				<?php
				foreach ( $elements as $element ) {
					if ( 'content' === $element ) {
						continue;
					}

					if ( 'featured_image' === $element && ! post_password_required() ) {
						$single_featured_image_position = get_theme_mod( 'responsive_single_blog_featured_image_position', 'none' );
						if ( ! in_array( $single_featured_image_position, array( 'outside', 'background' ), true ) ) {
							$format = get_post_format() ? get_post_format() : 'thumbnail';
							get_template_part( 'partials/single/media/blog-single', $format );
						}
					} else {
						get_template_part( 'partials/single/' . $element );
					}
				}
				?>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	}
}

add_action( 'responsive_wrapper_top', 'responsive_single_page_banner2' );

function responsive_single_page_banner2() {
	if ( is_page() && get_theme_mod( 'responsive_page_title_layout', 'post_title_layout1' ) === 'post_title_layout2' ) {
		$elements = responsive_page_single_elements_positioning();
		if ( empty( $elements ) ) {
			return;
		}

		global $post;
		setup_postdata( $post );
		?>
		<?php
		$page_featured_image_position = get_theme_mod( 'responsive_page_featured_image_position', 'none' );
		$page_featured_image_ratio    = get_theme_mod( 'responsive_page_featured_image_ratio', 'original' );
		
		$ratio_css = '';
		if ( 'predefined' === $page_featured_image_ratio ) {
			$predefined_ratio = get_theme_mod( 'responsive_page_featured_image_predefined_ratio', '1:1' );
			$ratio_value = str_replace( ':', '/', $predefined_ratio );
			$ratio_css = ' aspect-ratio: ' . esc_attr( $ratio_value ) . ';';
		} elseif ( 'custom' === $page_featured_image_ratio ) {
			$custom_width  = get_theme_mod( 'responsive_page_featured_image_custom_width', '' );
			$custom_height = get_theme_mod( 'responsive_page_featured_image_custom_height', '' );
			if ( $custom_width && $custom_height ) {
				$ratio_css = ' aspect-ratio: ' . esc_attr( $custom_width ) . '/' . esc_attr( $custom_height ) . ';';
			}
		}
		
		$section_style = '';
		if ( 'background' === $page_featured_image_position && has_post_thumbnail() && ! post_password_required() && in_array( 'featured_image', $elements, true ) ) {
			$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
			if ( $featured_image_url ) {
				$overlay_color = Responsive\Core\responsive_prepare_css_value( 'responsive_page_featured_image_overlay_color', '' );
				$overlay_css = empty( $overlay_color ) ? 'transparent' : $overlay_color;
				$section_style = ' style="--overlay-color: ' . $overlay_css . '; background-image: linear-gradient(var(--overlay-color), var(--overlay-color)), url(' . esc_url( $featured_image_url ) . '); background-repeat: no-repeat; background-size: cover; background-attachment: scroll; background-position: center center;' . $ratio_css . '"';
			}
		}
		?>
		<section class="responsive-single-entry-banner" data-post-type="page" data-banner-layout="layout-2"<?php echo $section_style; ?>>
			<div class="container">
				<?php
				foreach ( $elements as $element ) {
					if ( 'content' === $element ) {
						continue;
					}

					if ( 'featured_image' === $element && ! post_password_required() ) {
						$page_featured_image_position = get_theme_mod( 'responsive_page_featured_image_position', 'none' );
						if ( ! in_array( $page_featured_image_position, array( 'outside', 'background' ), true ) ) {
							get_template_part( 'partials/page/thumbnail' );
						}
					} else {
						get_template_part( 'partials/page/' . $element );
					}
				}
				?>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	}
}

add_action( 'responsive_wrapper_top', 'responsive_archive_blog_banner2' );

function responsive_archive_blog_banner2() {
	if ( ( is_home() || ( is_archive() && ! is_search() ) ) && get_theme_mod( 'responsive_blog_title_layout', 'post_title_layout1' ) === 'post_title_layout2' ) {
		// For layout2:
		// Show elements based on user's sorted order.
		$elements = get_theme_mod( 'responsive_blog_title_elements_positioning', array( 'title', 'description', 'breadcrumb' ) );
		if ( is_string( $elements ) ) {
			$decoded = json_decode( $elements, true );
			$elements = is_array( $decoded ) ? $decoded : explode( ',', $elements );
		} else if ( ! is_array( $elements ) ) {
			$elements = array();
		}
		
		$responsive_page_title       = '';
		$responsive_page_description = null;

		if ( is_home() ) {
			$responsive_page_title = responsive_free_get_option( 'blog_post_title_text', 'Blog Page' );
			$responsive_page_description = get_theme_mod( 'responsive_blog_title_description', '' );
		} elseif ( is_archive() ) {
			$responsive_page_title       = get_the_archive_title();
			$responsive_page_description = get_the_archive_description();
		}
		
		$has_content = false;
		foreach ( $elements as $element ) {
			if ( 'title' === $element && $responsive_page_title ) {
				$has_content = true;
				break;
			} elseif ( 'description' === $element && $responsive_page_description ) {
				$has_content = true;
				break;
			} elseif ( 'breadcrumb' === $element ) {
				$has_content = true;
				break;
			}
		}

		if ( ! $has_content ) {
			return;
		}
		?>
		<section class="responsive-archive-entry-banner">
			<div class="container">
				<?php
				foreach ( $elements as $element ) {
					if ( 'title' === $element && $responsive_page_title ) {
						echo '<h1 class="page-title">' . wp_kses_post( $responsive_page_title ) . '</h1>';
					} elseif ( 'description' === $element && $responsive_page_description ) {
						echo '<div class="page-description">' . wp_kses_post( $responsive_page_description ) . '</div>';
					} elseif ( 'breadcrumb' === $element ) {
						?>
						<div class="responsive-breadcrumbs-wrapper">
							<div class="breadcrumbs-inner">
								<nav class="breadcrumbs" <?php responsive_check_yoast_enabled_breadcrumbs() ? '' : responsive_schema_markup( 'breadcrumb' ); ?>>
									<?php responsive_get_breadcrumb_lists(); ?>
								</nav>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</section>
		<?php
	}
}

add_action( 'woocommerce_before_main_content', 'responsive_woocommerce_shop_banner2', 5 );
add_action( 'responsive_wrapper_top', 'responsive_woocommerce_shop_banner2' );

/**
 * WooCommerce Shop/Archive Banner Layout 2
 */
function responsive_woocommerce_shop_banner2() {
	static $rendered = false;
	if ( $rendered ) {
		return;
	}

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	if ( ( is_shop() || is_product_taxonomy() ) && get_theme_mod( 'responsive_shop_title_area', true ) && get_theme_mod( 'responsive_shop_title_layout', 'post_title_layout1' ) === 'post_title_layout2' ) {
		$rendered = true;

		$elements = get_theme_mod( 'responsive_shop_title_elements_positioning', array( 'title', 'description', 'breadcrumb' ) );
		if ( is_string( $elements ) ) {
			$decoded  = json_decode( $elements, true );
			$elements = is_array( $decoded ) ? $decoded : explode( ',', $elements );
		} elseif ( ! is_array( $elements ) ) {
			$elements = array();
		}

		$responsive_page_title = get_theme_mod( 'responsive_shop_archive_title', '' );
		if ( empty( $responsive_page_title ) ) {
			$responsive_page_title = woocommerce_page_title( false );
		}

		$responsive_page_description = get_theme_mod( 'responsive_shop_archive_description', '' );
		if ( empty( $responsive_page_description ) ) {
			if ( is_product_taxonomy() ) {
				$responsive_page_description = term_description();
			} elseif ( is_shop() ) {
				$shop_page_id = wc_get_page_id( 'shop' );
				if ( $shop_page_id > 0 ) {
					$shop_page = get_post( $shop_page_id );
					if ( $shop_page && ! empty( $shop_page->post_content ) ) {
						$responsive_page_description = $shop_page->post_content;
					}
				}
			}
		}

		$has_breadcrumb = (bool) get_theme_mod( 'breadcrumbs_options', 1 );

		$has_content = false;
		foreach ( $elements as $element ) {
			if ( 'title' === $element && $responsive_page_title ) {
				$has_content = true;
				break;
			} elseif ( 'description' === $element && $responsive_page_description ) {
				$has_content = true;
				break;
			} elseif ( 'breadcrumb' === $element && $has_breadcrumb ) {
				$has_content = true;
				break;
			}
		}

		if ( ! $has_content ) {
			return;
		}

		$section_style = '';
		$container_bg  = get_theme_mod( 'responsive_shop_title_container_background_layout2', Responsive\Core\get_responsive_customizer_defaults( 'shop_title_container_background_layout2' ) );
		if ( 'featured' === $container_bg ) {
			$featured_image_url = '';
			if ( is_shop() ) {
				$shop_page_id = wc_get_page_id( 'shop' );
				if ( $shop_page_id > 0 && has_post_thumbnail( $shop_page_id ) ) {
					$featured_image_url = get_the_post_thumbnail_url( $shop_page_id, 'full' );
				}
			} elseif ( is_product_taxonomy() ) {
				$term = get_queried_object();
				if ( $term && isset( $term->term_id ) ) {
					$thumb_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					if ( $thumb_id ) {
						$featured_image_url = wp_get_attachment_url( $thumb_id );
					}
				}
			}

			if ( $featured_image_url ) {
				$overlay_color = Responsive\Core\responsive_prepare_css_value( 'responsive_shop_banner_overlay_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_shop_banner_overlay_color' ) );
				$overlay_css   = empty( $overlay_color ) ? 'transparent' : $overlay_color;
				$section_style = ' style="--overlay-color: ' . $overlay_css . '; background-image: linear-gradient(var(--overlay-color), var(--overlay-color)), url(' . esc_url( $featured_image_url ) . '); background-repeat: no-repeat; background-size: cover; background-attachment: scroll; background-position: center center;"';
			}
		}
		?>
		<section class="responsive-archive-entry-banner"<?php echo $section_style; ?>>
			<div class="container">
				<?php
				foreach ( $elements as $element ) {
					if ( 'title' === $element && $responsive_page_title ) {
						echo '<h1 class="page-title">' . wp_kses_post( $responsive_page_title ) . '</h1>';
					} elseif ( 'description' === $element && $responsive_page_description ) {
						echo '<div class="page-description">' . wp_kses_post( wpautop( $responsive_page_description ) ) . '</div>';
					} elseif ( 'breadcrumb' === $element && $has_breadcrumb ) {
						?>
						<div class="responsive-breadcrumbs-wrapper">
							<div class="breadcrumbs-inner">
								<?php woocommerce_breadcrumb(); ?>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</section>
		<?php
	}
}

add_filter( 'woocommerce_show_page_title', 'responsive_woocommerce_show_page_title' );

/**
 * Filter to hide in-content WooCommerce page title when title area is OFF, Layout 2 is active,
 * or when Title is toggled off in Structure.
 *
 * @param bool $show Current show status.
 * @return bool
 */
function responsive_woocommerce_show_page_title( $show ) {
	if ( is_shop() || is_product_taxonomy() ) {
		if ( ! get_theme_mod( 'responsive_shop_title_area', true ) || 'post_title_layout2' === get_theme_mod( 'responsive_shop_title_layout', 'post_title_layout1' ) ) {
			return false;
		}
		$elements = get_theme_mod( 'responsive_shop_title_elements_positioning', array( 'title', 'description', 'breadcrumb' ) );
		if ( is_string( $elements ) ) {
			$decoded  = json_decode( $elements, true );
			$elements = is_array( $decoded ) ? $decoded : explode( ',', $elements );
		} elseif ( ! is_array( $elements ) ) {
			$elements = array();
		}
		if ( ! in_array( 'title', $elements, true ) ) {
			return false;
		}
	}
	return $show;
}

add_filter( 'woocommerce_page_title', 'responsive_woocommerce_custom_shop_page_title' );

/**
 * Filter WooCommerce page title to use custom Archive Title if provided.
 *
 * @param string $title Page title.
 * @return string
 */
function responsive_woocommerce_custom_shop_page_title( $title ) {
	if ( is_shop() || is_product_taxonomy() ) {
		$custom_title = get_theme_mod( 'responsive_shop_archive_title', '' );
		if ( ! empty( $custom_title ) ) {
			return $custom_title;
		}
	}
	return $title;
}

add_action( 'woocommerce_archive_description', 'responsive_woocommerce_custom_shop_archive_description', 1 );

/**
 * Filter WooCommerce archive description to respect Structure visibility and custom Archive Description.
 */
function responsive_woocommerce_custom_shop_archive_description() {
	if ( ! is_shop() && ! is_product_taxonomy() ) {
		return;
	}
	if ( ! get_theme_mod( 'responsive_shop_title_area', true ) || 'post_title_layout2' === get_theme_mod( 'responsive_shop_title_layout', 'post_title_layout1' ) ) {
		return;
	}
	$elements = get_theme_mod( 'responsive_shop_title_elements_positioning', array( 'title', 'description', 'breadcrumb' ) );
	if ( is_string( $elements ) ) {
		$decoded  = json_decode( $elements, true );
		$elements = is_array( $decoded ) ? $decoded : explode( ',', $elements );
	} elseif ( ! is_array( $elements ) ) {
		$elements = array();
	}
	if ( ! in_array( 'description', $elements, true ) ) {
		remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
		remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
		return;
	}
	$custom_desc = get_theme_mod( 'responsive_shop_archive_description', '' );
	if ( ! empty( $custom_desc ) ) {
		remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
		remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
		echo '<div class="page-description term-description">' . wp_kses_post( wpautop( $custom_desc ) ) . '</div>';
	}
}