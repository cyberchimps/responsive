<?php
/**
 * Template part for displaying the Header Contact Info Modual.
 *
 * @package responsive
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}
require_once get_stylesheet_directory() . '/core/includes/responsive-icon-library.php';
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_header_contact_info">
	<?php
    $contact_infos      = get_theme_mod( 'responsive_header_contact_info' );
    $contact_icon_style = get_theme_mod( 'responsive_header_contact_info_icon_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_style' ) );
    $contact_icon_shape = get_theme_mod( 'responsive_header_contact_info_icon_shape', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_shape' ) );
    // error_log( print_r( $contact_infos, true ) );
	?>
    <div class="responsive-header-contact-info">
        <ul class="responsive-header-contact-info-icons-types">
            <?php
                foreach( $contact_infos as $contact_info ) {
                    ?>
                    <?php
                        if ( $contact_info['enable'] ) {
                    ?>
                    <li class="responsive-header-contact-info-icons-list">
                        <span class="responsive-header-contact-info-icon-container <?php echo 'rounded' === $contact_icon_shape ? esc_attr( 'responsive-header-contact-info-rounded' ) : ''; ?>">
                            <?php echo responsive_get_svg_icon( 'contact_' . $contact_info['id'] ); ?>
                        </span>
                        <div class="responsive-header-contact-info-contact-info">
                            <span class="responsive-header-contact-info-contact-title"><?php echo esc_html( $contact_info['label'] ); ?></span>
                            <span class="responsive-header-contact-info-contact-text">
                                <a class="responsive-header-contact-info-contact-link" href="<?php echo esc_url( $contact_info['link'] ); ?>"><?php echo esc_html( $contact_info['content'] ); ?></a>
                            </span>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                    <?php
                }
            ?>
        </ul>
    </div>
</div><!-- data-section="header_social" -->