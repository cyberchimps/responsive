<?php
/**
 * Template part for displaying the Mobile Header HTML Modual.
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_mobile_header_html">
    <div class="responsive-mobile-header-html">
        <?php
           $mobile_header_html_link_style = get_theme_mod( 'responsive_mobile_header_html_link_style', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_link_style' ) )
        ?>
        <div class="responsive-mobile-header-html-inner<?php echo $mobile_header_html_link_style === 'underline' ? ' responsive-mobile-header-html-underline-link' : '' ?>">
            <?php
            $mobile_header_html_content       = get_theme_mod( 'responsive_mobile_header_html_content', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_content' ) );
            if ( $mobile_header_html_content || is_customize_preview() ) {
                $mobile_header_html_auto_add_para = get_theme_mod( 'responsive_mobile_header_html_auto_add_paragraph', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_auto_add_paragraph' ) );
                if ( $mobile_header_html_auto_add_para ) {
                    echo do_shortcode( wpautop( $mobile_header_html_content ) );
                } else {
                    $array = array(
                        '<p>[' => '[',
                        ']</p>' => ']',
                        '<p></p>' => '',
                        ']<br />' => ']',
                        '<br />[' => '[',
                    );
                    $mobile_header_html_content = strtr( $mobile_header_html_content, $array );
                    echo do_shortcode( $mobile_header_html_content );
                }
            }
            ?>
        </div>
    </div>
</div>

