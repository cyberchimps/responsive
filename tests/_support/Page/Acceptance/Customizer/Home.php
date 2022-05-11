<?php
namespace Page\Customizer;

class Home
{
    // include url of current page
    public static $URL = '';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */

    public $url                                                = '/';
    public $customizeLink                                      = '#wp-admin-bar-customize > a';
    public $body                                               = 'body';
    public $bodyWithClass_SiteHeaderSiteBrandingMainNavigation = 'body.site-header-site-branding-main-navigation';
    public $bodyWithClass_SiteHeaderMainNavigationSiteBranding = 'body.site-header-main-navigation-site-branding';
    public $bodyWithClass_SiteHeaderMainNavigation             = 'body.site-header-main-navigation';
    public $bodyWithClass_SiteHeaderSiteBranding               = 'body.site-header-site-branding';

    public $bodyWithClass_siteHeaderLayoutVertical             = 'body.site-header-layout-vertical';
    public $bodyWithClass_siteHeaderAlignmentCenter            = 'body.site-header-alignment-center';
    public $bodyWithClass_siteHeaderAlignmentLeft              = 'body.site-header-alignment-left';
    public $bodyWithClass_siteHeaderAlignmentRight             = 'body.site-header-alignment-right';
    
    public $bodyWithClass_siteHeaderLayoutHorizontal           = 'body.site-header-layout-horizontal';

    public $bodyWithClass_headerWidgetAlignmentSpread          = 'body.header-widget-alignment-spread';
    public $bodyWithClass_headerWidgetPositionTop              = 'body.header-widget-position-top';

    public $header                                             = '#masthead';
    public $siteTitle                                          = '.site-title > a';
    public $siteTagline                                        = '.site-description';

    public $menuItems                                          = '#header-menu > ul > li > a';
    public $subMenuItems                                       = '#header-menu > ul > li.page_item_has_children > ul > li.page_item_has_children > a';
    public $menuToggleButton                                   = '.menu-toggle';

    public $bodyWithClass_FooterBarLayoutHorizontal            = 'body.footer-bar-layout-horizontal';
    public $bodyWithClass_FooterBarLayoutVertical              = 'body.footer-bar-layout-vertical';
    public $bodyWithClass_FooterWidgetsColumns0                = 'body.footer-widgets-columns-0';
    public $bodyWithClass_FooterWidgetsColumns1                = 'body.footer-widgets-columns-1';
    public $bodyWithClass_FooterWidgetsColumns2                = 'body.footer-widgets-columns-2';
    public $bodyWithClass_FooterWidgetsColumns3                = 'body.footer-widgets-columns-3';
    public $bodyWithClass_FooterWidgetsColumns4                = 'body.footer-widgets-columns-4';
    public $bodyWithClass_FooterScrollToTopDeviceBoth          = 'body.scroll-to-top-device-both';
    public $bodyWithClass_FooterScrollToTopAlignmentRight      = 'body.scroll-to-top-aligmnment-right';



    public $bodyWithClass_ResponsiveSiteContained              = 'body.responsive-site-contained';
    public $bodyWithClass_ResponsiveSiteFullWidth              = 'body.responsive-site-full-width';
    
    public $bodyWithClass_ResponsiveSiteStyleBoxed             = 'body.responsive-site-style-boxed';
    public $bodyWithClass_ResponsiveSiteStyleContentBoxed      = 'body.responsive-site-style-content-boxed';
    public $bodyWithClass_ResponsiveSiteStyleFlat              = 'body.responsive-site-style-flat';


    public $boxElements                                        = '#main-blog > div > article';
    

    public $search                                             = '#s';


    public $parent1menu = 'parent1';
    public $parent1sub1menu = 'parent1sub1';
    public $parent1sub1sub1menu = 'parent1sub1sub1';
    public $parent1sub1sub2menu = 'parent1sub1sub2';
    public $parent1sub2menu = 'parent1sub2';
    public $parent1sub2sub1menu = 'parent1sub2sub1';
    public $parent1sub2sub2menu = 'parent1sub2sub2';

    public $parent2menu = 'parent2';
    public $parent2sub1menu = 'parent2sub1';
    public $parent2sub1sub1menu = 'parent2sub1sub1';
    public $parent2sub1sub2menu = 'parent2sub1sub2';
    public $parent2sub2menu = 'parent2sub2';
    public $parent2sub2sub1menu = 'parent2sub2sub1';
    public $parent2sub2sub2menu = 'parent2sub2sub2';


    
    
    
    


     
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \CustomizerTester;
     */
    protected $customizerTester;

    public function __construct(\CustomizerTester $I)
    {
        $this->customizerTester = $I;
    }

}
