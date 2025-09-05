<?php
/**
 * Main Widget Template
 *
 * @file           sidebar.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


Responsive\responsive_widgets_before(); // above widgets container hook.
if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() ) ) {

    $get_sidebar_position = function( $context, $default = 'no' ) {
        $global = get_theme_mod( 'responsive_default_sidebar_position', 'no' );
        $value  = get_theme_mod( "responsive_{$context}_sidebar_position", $default );
        return ( $value === 'default' ) ? $global : $value;
    };

    if ( is_product() ) {
        $sidebar_position = $get_sidebar_position( 'single_product' );
    } elseif ( is_shop() ) {
        $sidebar_position = $get_sidebar_position( 'shop' );
    } elseif ( is_cart() ) {
        $sidebar_position = $get_sidebar_position( 'cart' );
    } elseif ( is_checkout() ) {
        $sidebar_position = $get_sidebar_position( 'checkout' );
    } else {
        $sidebar_position = $get_sidebar_position( 'shop' ); // fallback
    }

    if ( $sidebar_position === 'no' ) {
        return;
    }

    ?>
    <aside id="secondary"
        class="widget-area <?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>"
        role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>
        <?php dynamic_sidebar( 'responsive-woo-shop-sidebar' ); ?>
    </aside>
    <?php
}

elseif ( class_exists( 'LifterLMS' ) ) {


	if ( in_array( 'post-type-archive-course', get_body_class() ) || in_array( 'post-type-archive-llms_membership', get_body_class() ) ) {

		return;
	} else {
		
        $get_sidebar_position = function( $context, $default = 'no' ) {
            $global = get_theme_mod( 'responsive_default_sidebar_position', 'no' );
            $value  = get_theme_mod( "responsive_{$context}_sidebar_position", $default );
            return ( $value === 'default' ) ? $global : $value;
        };

        if ( is_page() ) {
            $meta_value = get_post_meta( get_the_ID(), 'responsive_page_meta_sidebar_position', true );
            $sidebar_position = $meta_value ? $meta_value : $get_sidebar_position( 'page' );
        } elseif ( is_single() ) {
            $sidebar_position = $get_sidebar_position( 'single_blog' );
        } elseif ( is_home() || is_search() || is_archive() ) {
            $sidebar_position = $get_sidebar_position( 'blog' );
        } else {
            $sidebar_position = $get_sidebar_position( 'blog' );
        }

		?>
				<aside id="secondary" class="main-sidebar widget-area <?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>

				<?php

				Responsive\responsive_widgets(); // above widgets hook.
				if ( ! dynamic_sidebar( 'main-sidebar' ) ) :
				endif; // End of main-sidebar.
				Responsive\responsive_widgets_end(); // after widgets hook.
				?>

				</aside><!-- end of #secondary -->
				<?php
				Responsive\responsive_widgets_after(); // after widgets container hook.

	}
} else {

	$get_sidebar_position = function( $context, $default = 'no' ) {
		$global = get_theme_mod( 'responsive_default_sidebar_position', 'no' );
		$value  = get_theme_mod( "responsive_{$context}_sidebar_position", $default );
		return ( $value === 'default' ) ? $global : $value;
	};

	if (
		( is_page() && 'no' === ( get_post_meta( get_the_ID(), 'responsive_page_meta_sidebar_position', true ) ?: $get_sidebar_position( 'page' ) ) ) ||
		( is_single() && 'no' === $get_sidebar_position( 'single_blog' ) ) ||
		( ( is_home() || is_search() || is_archive() ) && 'no' === $get_sidebar_position( 'blog' ) )
	) {
		return;
	}

	?>
	<aside id="secondary" class="main-sidebar widget-area <?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>

	<?php

	Responsive\responsive_widgets(); // above widgets hook.
	if ( ! dynamic_sidebar( 'main-sidebar' ) ) :
	endif; // End of main-sidebar.
		Responsive\responsive_widgets_end(); // after widgets hook.
	?>

	</aside><!-- end of #secondary -->
	<?php
	Responsive\responsive_widgets_after(); // after widgets container hook.
}
