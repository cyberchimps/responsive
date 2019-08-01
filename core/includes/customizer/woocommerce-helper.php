<?php
/*
 * All helper functions for woocommerce helper
 *
 * @package Responsive
 */
add_action( 'woocommerce_after_shop_loop_item', 'responsive_woocommerce_shop_product_content' );

if ( ! function_exists( 'responsive_woocommerce_shop_product_content' ) ) {
        /**
         * Show the product title in the product loop. By default this is an H2.
         */
        function responsive_woocommerce_shop_product_content()
        {
            $shop_structure = responsive_woocommerce_shop_elements_positioning();

            if (is_array($shop_structure) && !empty($shop_structure)) {

                echo '<div class="ressponsive-shop-summary-wrap">';

                foreach ($shop_structure as $value) {

                    switch ($value) {
                        case 'title':
                            /**
                             * Product Title on shop page.
                             */
                            responsive_woo_woocommerce_template_loop_product_title();
                            break;
                        case 'price':
                            /**
                             * Product Price on shop page.
                             */
                            woocommerce_template_loop_price();
                            break;
                        case 'ratings':
                            /**
                             * rating on shop page.
                             */
                            woocommerce_template_loop_rating();
                            break;
                        case 'short_desc':
                            responsive_woo_shop_product_short_description();
                            break;
                        case 'add_cart':
                            woocommerce_template_loop_add_to_cart();
                            break;
                        default:
                            break;
                    }
                }

                echo '</div>';
            }
        }

}

if ( ! function_exists( 'responsive_woo_woocommerce_template_loop_product_title' ) ) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function responsive_woo_woocommerce_template_loop_product_title() {

        echo '<a href="' . esc_url( get_the_permalink() ) . '" class="responsive-loop-product__link">';
        woocommerce_template_loop_product_title();
        echo '</a>';
    }
}


if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function woocommerce_template_loop_product_title() {
        echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

add_action( 'wp', 'woocommerce_init' );

if( ! function_exists('woocommerce_init')) {
    /**
     * Remove woocommerce default actions
     */
    function woocommerce_init() {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
        remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    }
}

if ( ! function_exists( 'responsive_woocommerce_shop_elements_positioning' ) ) {
    /**
     * Returns blog single elements positioning
     *
     * @since 1.1.0
     */
    function responsive_woocommerce_shop_elements_positioning() {

        // Default sections.
        $sections = array( 'title', 'price', 'ratings', 'short_desc', 'add_cart', 'category' );

        // Get sections from Customizer.
        $sections = get_theme_mod( 'responsive_woocommerce_shop_elements_positioning', $sections );

        // Turn into array if string.
        if ( $sections && ! is_array( $sections ) ) {
            $sections = explode( ',', $sections );
        }

        // Apply filters for easy modification.
        $sections = apply_filters( 'responsive_woocommerce_shop_elements_positioning', $sections );

        // Return sections.
        return $sections;

    }
}

/**
 * Shop page - Short Description
 */
if ( ! function_exists( 'responsive_woo_shop_product_short_description' ) ) {
    /**
     * Product short description
     *
     * @hooked woocommerce_after_shop_loop_item
     *
     * @since 1.1.0
     */
    function responsive_woo_shop_product_short_description()
    {
        ?>
        <?php if (has_excerpt()) { ?>
        <div class="responsive-woo-shop-product-description">
            <?php the_excerpt(); ?>
        </div>
    <?php } ?>
        <?php
    }
}