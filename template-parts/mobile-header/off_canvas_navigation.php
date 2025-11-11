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
        wp_nav_menu(
            array(
                'container' => false, 
                'menu_id'   => 'off-canvas-menu',
                'theme_location' => 'off-canvas-menu',
                'depth'     => '1'
            )
            );
        ?>
    </nav>
</div>