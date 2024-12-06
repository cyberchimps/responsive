<?php
/**
 * Footer Copyright Template
 *
 * @package        Responsive
 */

global $responsive_options;
$responsive_options = Responsive\Core\responsive_get_options();
$cyberchimps_link   = '';
$footer_text = get_option('footer-copyright');

?>
<div class="footer-widget-area rspv-footer-copyright" data-section="responsive-customizer-copyright">
    <div class="footer-layouts copyright">
        <?php
        if ( ! empty($footer_text)){
            do_action( 'responsive_footer_copyright' );
        }else{
        ?>
        <?php
        if ( ! get_theme_mod( 'responsive_copyright_icon_and_year' ) ) {
            ?>
            <span class="copyright_icon_and_year" >
                <?php
                    esc_attr_e('Copyright', 'responsive');
                    esc_attr_e( ' &copy; ', 'responsive' );
                    echo esc_attr( gmdate( ' Y' ) );
                ?>
            </span>
            <?php
        }
        if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
            echo do_shortcode( ' ' . $responsive_options['copyright_textbox'] );
        } else {
            echo esc_html( get_bloginfo( 'name' ) );
        }
        $copyright_new_tab = get_theme_mod( 'responsive_copyright_new_tab', '_self' );

        if ( ! empty( $responsive_options['poweredby_link'] ) ) {
            $cyberchimps_link = $responsive_options['poweredby_link'];
        } else {
            ?>
            <span>
                <?php
                echo apply_filters(
                    'responsive_theme_footer_link_text',
                    esc_html__( ' | Powered by', 'responsive' )
                )
                ?>
            </span>
            <a href= "
            <?php
            echo apply_filters(
                'responsive_theme_footer_link',
                esc_url( 'https://cyberchimps.com/')
            );
            ?>
                "
                target="_blank"
                >
                <?php
                echo apply_filters(
                    'responsive_theme_footer_theme_text',
                    esc_html__( ' Responsive Theme', 'responsive' )
                )
                ?>
                </a><?php } ?>
            <?php
            }
        ?>
    </div>
</div>
