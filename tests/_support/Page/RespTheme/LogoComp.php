<?php
namespace Page\RespTheme;

class LogoComp
{
    // include url of current page
    public static $URL = '';
    
    /** 
     * General settings
     */
    public $url = '//*[@id="wp-admin-bar-customize"]/a';
    public $header = '//*[@id="accordion-panel-responsive_header"]/h3';
    public $logoButton = '//*[@id="accordion-section-responsive_customizer_logo"]/h3';
    public $publishButton = '//*[@id="save"]';
    public $deskrow = '//*[@id="main-header"]/div/div/div/div/div';
    public $desktopview = '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $tabletview = '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobileview = '//*[@id="customize-footer-actions"]/div/div/button[3]';

    /**
     * logo layout settings
     */
    public $desktopLogoLayout = '//*[@id="customize-control-responsive_desktop_logo_layout_include"]/select';
    public $tabletLogoLayout = '//*[@id="customize-control-responsive_tablet_logo_layout_include"]/select';
    public $mobileLogoLayout = '//*[@id="customize-control-responsive_mobile_logo_layout_include"]/select';
    
    /**
     * logo layout structure settings
     */
    public $desktopLogoLayoutStructure = '//*[@id="customize-control-responsive_desktop_logo_layout_structure"]/select';
    public $tabletLogoLayoutStructure = '//*[@id="customize-control-responsive_tablet_logo_layout_structure"]/select';
    public $mobileLogoLayoutStructure = '//*[@id="customize-control-responsive_mobile_logo_layout_structure"]/select';
   
    /**
     * padding settings for logo component
     */
    public $paddingSpan = '//*[@id="customize-control-responsive_logo_padding"]/span/span';
    public $desktopPadding = '//*[@id="customize-control-responsive_logo_padding"]/span/ul/li[1]/button/i';
    public $desktopPField = '//*[@id="customize-control-responsive_logo_padding"]/ul[1]/li[1]/input';
    public $tabletPadding = '//*[@id="customize-control-responsive_logo_padding"]/span/ul/li[2]/button/i';
    public $tabletPField = '//*[@id="customize-control-responsive_logo_padding"]/ul[2]/li[1]/input';
    public $mobilePadding = '//*[@id="customize-control-responsive_logo_padding"]/span/ul/li[3]/button/i';
    public $mobilePField = '//*[@id="customize-control-responsive_logo_padding"]/ul[3]/li[1]/input';

    /**
     * site color settings
     */
    public $siteTitleColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/button/span';
    public $selectSiteTitle = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $tsiteTitleColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/button/span';
    public $selectTsiteTitle = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $msiteTitleColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/button/span';
    public $selectMsiteTitle = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $siteTitleHoverColor = '//*[@id="customize-control-responsive_site_title_hover_color"]/label/div/div/button/span';
    public $selectSiteTitleHover = '//*[@id="customize-control-responsive_site_title_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    
    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \RespThemeTester;
     */
    protected $respThemeTester;

    public function __construct(\RespThemeTester $I)
    {
        $this->respThemeTester = $I;
    }

}
