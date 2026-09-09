<?php
/**
 * Template part for displaying the Mobile Header HTML 2 Module.
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_mobile_header_html2">
    <div class="responsive-mobile-header-html2">
        <?php
           $mobile_header_html2_link_style = get_theme_mod( 'responsive_mobile_header_html2_link_style', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html2_link_style' ) )
        ?>
        <div class="responsive-mobile-header-html2-inner<?php echo $mobile_header_html2_link_style === 'underline' ? ' responsive-mobile-header-html2-underline-link' : '' ?>">
            <?php
            $mobile_header_html2_content       = get_theme_mod( 'responsive_mobile_header_html2_content', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html2_content' ) );
            if ( $mobile_header_html2_content || is_customize_preview() ) {
                $mobile_header_html2_auto_add_para = get_theme_mod( 'responsive_mobile_header_html2_auto_add_paragraph', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html2_auto_add_paragraph' ) );
                if ( $mobile_header_html2_auto_add_para ) {
                    echo do_shortcode( wpautop( $mobile_header_html2_content ) );
                } else {
                    $array = array(
                        '<p>[' => '[',
                        ']</p>' => ']',
                        '<p></p>' => '',
                        ']<br />' => ']',
                        '<br />[' => '[',
                    );
                    $mobile_header_html2_content = strtr( $mobile_header_html2_content, $array );
                    echo do_shortcode( $mobile_header_html2_content );
                }
            }
            ?>
        </div>
    </div>
</div>

