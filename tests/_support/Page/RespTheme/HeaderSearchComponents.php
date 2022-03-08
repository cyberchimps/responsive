<?php
namespace Page\RespTheme;

class HeaderSearchComponents
{
    // include url of current page
    public static $URL = '';
    
    

    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $searchSection           =   '//*[@id="accordion-section-responsive_customizer_header_search"]/h3';

    public $desktopButton           =   '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $tabletButton            =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobileButton            =   '//*[@id="customize-footer-actions"]/div/div/button[3]';

    public $searchStyle             =   '//*[@id="customize-control-responsive_header_search_style"]/select'; //values (defualt or bordered)
    public $borderStyle             =   '//*[@id="customize-control-responsive_header_search_border_style"]/select'; //values(none, solid, dashed, dotted)
    public $borderWidth             =   '//*[@id="customize-control-responsive_header_search_border_size"]/label/div/input[2]';
    public $borderColour            =   '//*[@id="customize-control-responsive_header_search_border_color"]/label/div/div/button';
    public $borderColour5           =   '//*[@id="customize-control-responsive_header_search_border_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $borderColour2           =   '//*[@id="customize-control-responsive_header_search_border_color"]/label/div/div/div/div[2]/div/div/div[2]/button';     
    public $borderHoverColour       =   '//*[@id="customize-control-responsive_header_search_border_hover_color"]/label/div/div/button';
    public $headerSearchLabel       =   '//*[@id="_customize-input-responsive_header_search_label"]';
    public $labelVisibilityDesktop  =   '//*[@id="responsive_header_search_label_visiblity_desktop"]';
    public $labelVisibilityTablet   =   '//*[@id="responsive_header_search_label_visiblity_tablet"]';
    public $labelVisibilityMobile   =   '//*[@id="responsive_header_search_label_visiblity_mobile"]';
    public $searchIcon              =   '//*[@id="customize-control-responsive_header_search_icon"]/select'; //values(search, search2)
    public $searchColour            =   '//*[@id="customize-control-responsive_header_search_color"]/label/div/div/button';
    public $searchColour2           =   '//*[@id="customize-control-responsive_header_search_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $searchHoverColour       =   '//*[@id="customize-control-responsive_header_search_hover_color"]/label/div/div/button';
    public $backgroundColour        =   '//*[@id="customize-control-responsive_header_search_background_color"]/label/div/div/button';
    public $backgroundColour3       =   '//*[@id="customize-control-responsive_header_search_background_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $backgroundHoverColour   =   '//*[@id="customize-control-responsive_header_search_background_hover_color"]/label/div/div/button';
    public $paddingInput            =   '//*[@id="customize-control-responsive_search_padding"]/ul[1]/li[1]/input';
    public $paddingInputTablet      =   '//*[@id="customize-control-responsive_search_padding"]/ul[2]/li[1]/input';
    public $paddingInputMobile      =   '//*[@id="customize-control-responsive_search_padding"]/ul[3]/li[1]/input';
    public $marginInput             =   '//*[@id="customize-control-responsive_search_margin"]/ul[1]/li[1]/input';
    public $marginInputTablet       =   '//*[@id="customize-control-responsive_search_margin"]/ul[2]/li[1]/input';
    public $marginInputMobile       =   '//*[@id="customize-control-responsive_search_margin"]/ul[3]/li[1]/input';
    public $borderRadius            =   '//*[@id="customize-control-responsive_header_search_border_radius"]/label/div/input[2]';
    public $iconSizeDesktop         =   '//*[@id="customize-control-responsive_header_search_icon_size_desktop"]/label/div/input[2]';
    public $iconSizeTablet          =   '//*[@id="customize-control-responsive_header_search_icon_size_tablet"]/label/div/input[2]';
    public $iconSizeMobile          =   '//*[@id="customize-control-responsive_header_search_icon_size_mobile"]/label/div/input[2]';

    //front end components
    public $searchButton            =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div/div/button';
    public $searchIconCheck         =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div/div/button/span[2]/span/svg';
    public $searchIconCheck2        =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div/div/button/span[2]/span/svg';
    public $searchColourCheck       =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div/div/button/span[1]';
    public $iconSizeCheck           =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div/div/button/span[2]';
    





    


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
