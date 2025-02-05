<?php
/**
 * Template part for displaying the header Search Element
 *
 * @package responsive
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}

$search_label = esc_html( get_theme_mod( 'responsive_header_search_label' ) );
$search_style = get_theme_mod( 'search_style','search' );
$search_icon  = get_theme_mod( 'responsive_header_search_icon','search1' );

if ( 'search2' === $search_icon ) {
    $search_icon_svg = '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    <path d="M15.7656 15.1895L10.6934 10.1172C11.4805 9.09961 11.9062 7.85547 11.9062 6.54688C11.9062 4.98047 11.2949 3.51172 10.1895 2.4043C9.08398 1.29687 7.61133 0.6875 6.04688 0.6875C4.48242 0.6875 3.00977 1.29883 1.9043 2.4043C0.796875 3.50977 0.1875 4.98047 0.1875 6.54688C0.1875 8.11133 0.798828 9.58398 1.9043 10.6895C3.00977 11.7969 4.48047 12.4062 6.04688 12.4062C7.35547 12.4062 8.59766 11.9805 9.61523 11.1953L14.6875 16.2656C14.7024 16.2805 14.72 16.2923 14.7395 16.3004C14.7589 16.3084 14.7797 16.3126 14.8008 16.3126C14.8218 16.3126 14.8427 16.3084 14.8621 16.3004C14.8815 16.2923 14.8992 16.2805 14.9141 16.2656L15.7656 15.416C15.7805 15.4011 15.7923 15.3835 15.8004 15.364C15.8084 15.3446 15.8126 15.3238 15.8126 15.3027C15.8126 15.2817 15.8084 15.2609 15.8004 15.2414C15.7923 15.222 15.7805 15.2043 15.7656 15.1895ZM9.14062 9.64062C8.3125 10.4668 7.21484 10.9219 6.04688 10.9219C4.87891 10.9219 3.78125 10.4668 2.95312 9.64062C2.12695 8.8125 1.67188 7.71484 1.67188 6.54688C1.67188 5.37891 2.12695 4.2793 2.95312 3.45312C3.78125 2.62695 4.87891 2.17188 6.04688 2.17188C7.21484 2.17188 8.31445 2.625 9.14062 3.45312C9.9668 4.28125 10.4219 5.37891 10.4219 6.54688C10.4219 7.71484 9.9668 8.81445 9.14062 9.64062Z" fill="currentColor"/></svg>';
} else {
    $search_icon_svg = '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    <path d="M17.375 16.125L12.75 11.5C13.5 10.375 14 9 14 7.625C14 3.875 10.875 0.75 7.125 0.75C3.375 0.75 0.25 3.875 0.25 7.625C0.25 11.375 3.375 14.5 7.125 14.5C8.625 14.5 9.875 14 11 13.25L15.625 17.875L17.375 16.125ZM2.125 7.625C2.125 4.875 4.375 2.625 7.125 2.625C9.875 2.625 12.125 4.875 12.125 7.625C12.125 10.375 9.875 12.625 7.125 12.625C4.375 12.625 2.125 10.375 2.125 7.625Z" fill="currentColor"/></svg>';
}

$search_id = ( $search_style === 'search' ) ? 'res-search-link' : ( ( $search_style === 'full-screen' ) ? 'full-screen-res-search-link' : 'responsive-inline-search-link' );

?>
<div class="site-header-item site-header-focus-item responsive-header-search" data-section="responsive_customizer_header_search">
	<?php
	/**
	 * Responsive Header Search
	 */
    if ( 'search-box' === $search_style ) {
        ?>
            <div class="search-type-box responsive-header-inline-search">
                <form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'responsive' ); ?></label>
                    <div class="res-search-wrapper responsive-header-search-icon-wrap">
                        <input type="search" class="search-field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'responsive' ); ?>" autocomplete="off" />
                        <button type="submit" class="search-submit" value="Search">
                            <span class="responsive-header-search-icon">
                                <?php echo $search_icon_svg; ?>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        <?php
    } else if( 'search' === $search_style ) {
    ?>
        <div class="search-type-responsive-slide">
            <form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'responsive' ); ?></label>
                <div class="res-search-wrapper responsive-header-search-icon-wrap">
                    <input type="search" class="search-field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'responsive' ); ?>" autocomplete="off" />
                    <button type="submit" class="search-submit responsive-header-slide-search" value="Search">
                        <span class="responsive-header-search-icon">
                            <?php echo $search_icon_svg; ?>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="responsive-header-search-link" id="<?php echo esc_attr( $search_id ); ?>">
            <div class="res-search-icon" aria-label="Search icon link">
                <div class="responsive-header-search-icon-wrap">
                    <span class="responsive-header-search-icon"><?php echo $search_icon_svg; ?></span>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="full-screen-search-wrapper" id="full-screen-search-wrapper">
            <span id="search-close" class="search-close"></span>
            <div class="full-screen-search-container">
                <div class="container">
                <form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'responsive' ); ?></label>
                    <div class="res-search-wrapper">
                        <input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search here &hellip;', 'responsive' ); ?>" autocomplete="off" />
                        <button type="submit" class="search-submit" value="Search">
                            <span class="responsive-header-search-icon">
                                <?php echo $search_icon_svg; ?>
                            </span>
                        </button>
                    </div>
                </form>
                    </div>
            </div>
        </div>
        <div class="responsive-header-search-link" id="<?php echo esc_attr( $search_id ); ?>">
            <div class="res-search-icon" aria-label="Search icon link">
                <div class="responsive-header-search-icon-wrap">
                    <span class="responsive-header-search-label"><?php echo $search_label; ?></span>
                    <span class="responsive-header-search-icon"><?php echo $search_icon_svg; ?></span>
                </div>
            </div>
        </div>
    <?php
    }
	?>
</div><!-- data-section="header_search" -->