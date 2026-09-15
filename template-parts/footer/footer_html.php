<?php
/**
 * Template part for displaying the Footer HTML Module.
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-footer-item site-footer-focus-item" data-section="responsive_customizer_footer_html">
    <div class="responsive-footer-html">
        <?php
           $footer_html_link_style = get_theme_mod( 'responsive_footer_html_link_style', Responsive\Core\get_responsive_customizer_defaults( 'footer_html_link_style' ) )
        ?>
        <div class="responsive-footer-html-inner<?php echo $footer_html_link_style === 'underline' ? ' responsive-footer-html-underline-link' : '' ?>">
            <?php
            $footer_html_content       = get_theme_mod( 'responsive_footer_html_content', Responsive\Core\get_responsive_customizer_defaults( 'footer_html_content' ) );
            if ( $footer_html_content || is_customize_preview() ) {
                $footer_html_auto_add_para = get_theme_mod( 'responsive_footer_html_auto_add_paragraph', Responsive\Core\get_responsive_customizer_defaults( 'footer_html_auto_add_paragraph' ) );
                if ( $footer_html_auto_add_para ) {
                    echo do_shortcode( wpautop( $footer_html_content ) );
                } else {
                    $array = array(
                        '<p>[' => '[',
                        ']</p>' => ']',
                        '<p></p>' => '',
                        ']<br />' => ']',
                        '<br />[' => '[',
                    );
                    $footer_html_content = strtr( $footer_html_content, $array );
                    echo do_shortcode( $footer_html_content );
                }
            }
            ?>
        </div>
    </div>
</div>