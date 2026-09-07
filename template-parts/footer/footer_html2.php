<?php
/**
 * Template part for displaying the Footer HTML 2 Module.
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-footer-item site-footer-focus-item" data-section="responsive_customizer_footer_html2">
    <div class="responsive-footer-html2">
        <?php
           $footer_html2_link_style = get_theme_mod( 'responsive_footer_html2_link_style', Responsive\Core\get_responsive_customizer_defaults( 'footer_html2_link_style' ) )
        ?>
        <div class="responsive-footer-html2-inner<?php echo $footer_html2_link_style === 'underline' ? ' responsive-footer-html2-underline-link' : '' ?>">
            <?php
            $footer_html2_content       = get_theme_mod( 'responsive_footer_html2_content', Responsive\Core\get_responsive_customizer_defaults( 'footer_html2_content' ) );
            if ( $footer_html2_content || is_customize_preview() ) {
                $footer_html2_auto_add_para = get_theme_mod( 'responsive_footer_html2_auto_add_paragraph', Responsive\Core\get_responsive_customizer_defaults( 'footer_html2_auto_add_paragraph' ) );
                if ( $footer_html2_auto_add_para ) {
                    echo do_shortcode( wpautop( $footer_html2_content ) );
                } else {
                    $array = array(
                        '<p>[' => '[',
                        ']</p>' => ']',
                        '<p></p>' => '',
                        ']<br />' => ']',
                        '<br />[' => '[',
                    );
                    $footer_html2_content = strtr( $footer_html2_content, $array );
                    echo do_shortcode( $footer_html2_content );
                }
            }
            ?>
        </div>
    </div>
</div>