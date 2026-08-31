<?php
/**
 * Off Canvas Menu Template
 * 
 * 
 * @package Responsive
 */
?>
<div class="off-canvas-widget-area"  data-section="responsive-customizer-off-canvas-navigation">
    <nav id="off-canvas-site-navigation" class="off-canvas-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Off Canvas Menu', 'responsive' ); ?>">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Off Canvas Menu', 'responsive' ); ?></h2>
        <?php
        // Check if off-canvas menu exists, otherwise try to use header menu as fallback
        if ( has_nav_menu( 'off-canvas-menu' ) ) {
            wp_nav_menu(
                array(
                    'container' => false, 
                    'menu_id'   => 'off-canvas-menu',
                    'theme_location' => 'off-canvas-menu',
                    'depth'     => 0
                )
            );
        } elseif ( has_nav_menu( 'header-menu' ) ) {
            // Use header menu as fallback
            wp_nav_menu(
                array(
                    'container' => false, 
                    'menu_id'   => 'off-canvas-menu',
                    'theme_location' => 'header-menu',
                    'depth'     => 0
                )
            );
        } else {
            // If no menu is set, show page list
            wp_page_menu(
                array(
                    'menu_class' => 'menu',
                    'show_home'  => true,
                )
            );
        }
        ?>
    </nav>
</div>