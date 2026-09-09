<?php
/**
 * Template part for displaying the Header HTML 2 Module.
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_header_html2">
    <div class="responsive-header-html2">
        <?php
           $header_html2_link_style = get_theme_mod( 'responsive_header_html2_link_style', Responsive\Core\get_responsive_customizer_defaults( 'header_html2_link_style' ) )
        ?>
        <div class="responsive-header-html2-inner<?php echo $header_html2_link_style === 'underline' ? ' responsive-header-html2-underline-link' : '' ?>">
            <?php
            $header_html2_content       = get_theme_mod( 'responsive_header_html2_content', Responsive\Core\get_responsive_customizer_defaults( 'header_html2_content' ) );
            if ( $header_html2_content || is_customize_preview() ) {
                $header_html2_auto_add_para = get_theme_mod( 'responsive_header_html2_auto_add_paragraph', Responsive\Core\get_responsive_customizer_defaults( 'header_html2_auto_add_paragraph' ) );
                if ( $header_html2_auto_add_para ) {
                    echo do_shortcode( wpautop( $header_html2_content ) );
                } else {
                    $array = array(
                        '<p>[' => '[',
                        ']</p>' => ']',
                        '<p></p>' => '',
                        ']<br />' => ']',
                        '<br />[' => '[',
                    );
                    $header_html2_content = strtr( $header_html2_content, $array );
                    echo do_shortcode( $header_html2_content );
                }
            }
            ?>
        </div>
    </div>
</div>