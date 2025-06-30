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
require get_template_directory() . '/core/includes/builder/class-responsive-builder-footer.php';

/**
 * Responsive Header.
 *
 * @see Responsive\header_markup();
 */
add_action( 'responsive_header', 'header_markup' );

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

// Load Cart Flyout Markup on Footer.
add_action( 'responsive_footer_before', 'responsive_header_woo_cart_slide_in' );

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