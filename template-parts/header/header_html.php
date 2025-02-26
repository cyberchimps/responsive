<?php
/**
 * Template part for displaying the Header HTML Modual.
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_header_html">
    <div class="responsive-header-html">
        <?php
           $header_html_link_style = get_theme_mod( 'responsive_header_html_link_style', Responsive\Core\get_responsive_customizer_defaults( 'header_html_link_style' ) )
        ?>
        <div class="responsive-header-html-inner<?php echo $header_html_link_style === 'underline' ? ' responsive-header-html-underline-link' : '' ?>">
            <?php
            $header_html_content       = get_theme_mod( 'responsive_header_html_content', Responsive\Core\get_responsive_customizer_defaults( 'header_html_content' ) );
            if ( $header_html_content || is_customize_preview() ) {
                $header_html_auto_add_para = get_theme_mod( 'responsive_header_html_auto_add_paragraph', Responsive\Core\get_responsive_customizer_defaults( 'header_html_auto_add_paragraph' ) );
                if ( $header_html_auto_add_para ) {
                    echo do_shortcode( wpautop( $header_html_content ) );
                } else {
                    $array = array(
                        '<p>[' => '[',
                        ']</p>' => ']',
                        '<p></p>' => '',
                        ']<br />' => ']',
                        '<br />[' => '[',
                    );
                    $header_html_content = strtr( $header_html_content, $array );
                    echo do_shortcode( $header_html_content );
                }
            }
            ?>
        </div>
    </div>
</div>