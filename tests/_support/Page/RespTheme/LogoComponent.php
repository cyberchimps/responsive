<?php
namespace Page\RespTheme;

class LogoComp
{
    // include url of current page
    public static $URL = '';
    /**
     * general settings
     */
    public $url = '//*[@id="wp-admin-bar-customize"]/a';
    public $header = '//*[@id="accordion-panel-responsive_header"]/h3';
    public $logoButton = '//*[@id="accordion-section-responsive_customizer_logo"]/h3';
    public $publishButton = '//*[@id="save"]';
    public $deskrow = '//*[@id="main-header"]/div/div/div/div/div';
    public $tabletrow = '//*[@id="mobile-header"]/div/div/div/div[1]';
    public $mobilerow = '//*[@id="mobile-header"]/div/div/div/div[1]';
    public $desktopView = '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $tabletview = '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobileView = '//*[@id="customize-footer-actions"]/div/div/button[3]';

    /**
     * logolayout settings
     */
    public $desktopLayout = '//*[@id="customize-control-responsive_desktop_logo_layout_include"]/select';
    public $tabletLayout = '//*[@id="customize-control-responsive_tablet_logo_layout_include"]/select';
    public $mobileLayout = '//*[@id="customize-control-responsive_mobile_logo_layout_include"]/select';
    public $desktopLayoutStructure = '//*[@id="customize-control-responsive_desktop_logo_layout_structure"]/select';
    public $tabletLayoutStructure = '//*[@id="customize-control-responsive_tablet_logo_layout_structure"]/select';
    public $mobileLayoutStructure = '//*[@id="customize-control-responsive_mobile_logo_layout_structure"]/select';
    /**
     * padding span
     */
    public $paddingSpan = '//*[@id="customize-control-responsive_logo_padding"]/span/span';
    public $desktopPadding  = '//*[@id="customize-control-responsive_logo_padding"]/span/ul/li[1]/button/i';
    public $desktopPField = '//*[@id="customize-control-responsive_logo_padding"]/ul[1]/li[1]/input';
    public $tabletPadding = '//*[@id="customize-control-responsive_logo_padding"]/span/ul/li[2]/button/i';
    public $tabletPField = '//*[@id="customize-control-responsive_logo_padding"]/ul[2]/li[1]/input';
    public $mobilePadding = '//*[@id="customize-control-responsive_logo_padding"]/span/ul/li[3]/button/i';
    public $mobilePField = '//*[@id="customize-control-responsive_logo_padding"]/ul[3]/li[1]/input';
    /**
     * site tilte color settings
     */
    public $selectSiteTitleColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/button/span';
    public $siteTitleColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $selectSiteTitleTabletColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/button/span';
    public $siteTitleTabletColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $selectSiteTitleMobileColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/button/span';
    public $siteTitleMobileColor = '//*[@id="customize-control-responsive_site_title_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $selectSiteTitleHoverColor = '//*[@id="customize-control-responsive_site_title_hover_color"]/label/div/div/button/span';
    public $siteTitleHoverColor = '//*[@id="customize-control-responsive_site_title_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $selectTSiteTitleHoverColor = '//*[@id="customize-control-responsive_site_title_hover_color"]/label/div/div/button/span';
    public $tSiteTitleHoverColor = '//*[@id="customize-control-responsive_site_title_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
     /**
     * typography settings
     */
    public $fontFamily = '//*[@id="customize-control-site_title_typography-font-family"]/label/select';
    public $fontWeight = '//*[@id="customize-control-site_title_typography-font-weight"]/label/select';
    public $fontStyle = '//*[@id="customize-control-site_title_typography-font-style"]/select';
    public $textTransform = '//*[@id="customize-control-site_title_typography-text-transform"]/select';
    public $fontSize = '//*[@id="customize-control-site_title_typography-font-size"]/div[1]/input';
    public $lineHeight = '//*[@id="customize-control-site_title_typography-line-height"]/label/div/input[2]';
    public $letterSpacing = '//*[@id="customize-control-site_title_typography-letter-spacing"]/label/div/input[2]';
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
