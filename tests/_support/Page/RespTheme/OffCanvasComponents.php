<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class OffCanvasComponents
{
    //general
    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerbutton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishbutton           =   '//*[@id="save"]';
    public $offCanvas               =   '//*[@id="accordion-section-responsive_customizer_header_popup"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile                  =   '//*[@id="customize-footer-actions"]/div/div/button[3]';

    //components on backend 
    public $breakpoint              =   '//*[@id="customize-control-responsive_mobile_menu_breakpoint"]/label/div/input[2]';
    public $drawerLayout            =   '//*[@id="customize-control-responsive_header_popup_layout"]/select'; //sidepanel fullwidth
    public $sidepanelPopup          =   '//*[@id="customize-control-responsive_header_popup_side"]/select';  //right left
    public $fullwidthAnimation      =   '//*[@id="customize-control-responsive_header_popup_animation"]/select';  //fade scale slice
    public $contentAlignment        =   '//*[@id="customize-control-responsive_header_popup_content_align"]/select';  //left center right
    public $contentVerticalAlignment=   '//*[@id="customize-control-responsive_header_popup_vertical_align"]/select'; //top middle bottom
    public $iconSize                =   '//*[@id="customize-control-responsive_header_popup_close_icon_size"]/label/div/input[2]';
    
    public $drawerTabletColor       =   '//*[@id="customize-control-responsive_header_popup_background_tablet_color"]/label/div/div/button';
    public $drawerTabletColor5      =   '//*[@id="customize-control-responsive_header_popup_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $drawerMobileColor       =   '//*[@id="customize-control-responsive_header_popup_background_mobile_color"]/label/div/div/button';
    public $drawerMobileColor3      =   '//*[@id="customize-control-responsive_header_popup_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $closeToggleColor        =   '//*[@id="customize-control-responsive_header_popup_close_color"]/label/div/div/button';
    public $closeToggleColor1       =   '//*[@id="customize-control-responsive_header_popup_close_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $closeToggleHover        =   '//*[@id="customize-control-responsive_header_popup_close_hover_color"]/label/div/div/button';
    public $closeToggleHover2       =   '//*[@id="customize-control-responsive_header_popup_close_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $closeToggleBkg          =   '//*[@id="customize-control-responsive_header_popup_close_background_color"]/label/div/div/button';
    public $closeToggleBkg8         =   '//*[@id="customize-control-responsive_header_popup_close_background_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $closeToggleBkgHover     =   '//*[@id="customize-control-responsive_header_popup_close_background_hover_color"]/label/div/div/button';
    public $closeToggleBkgHover6    =   '//*[@id="customize-control-responsive_header_popup_close_background_hover_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $paddingInputTab         =   '//*[@id="customize-control-responsive_header_popup_close_padding"]/ul[2]/li[1]/input';
    public $paddingInputMobile      =   '//*[@id="customize-control-responsive_header_popup_close_padding"]/ul[3]/li[1]/input';
    public $mobileMenuPadding       =   '//*[@id="customize-control-responsive_header_popup_close_padding"]/span/ul/li[3]/button';
     
    //components on frontend  
    public $MenuButtonTablet        =   '//*[@id="mobile-toggle"]';
    public $sidepanelDrawerPopup    =   '//*[@id="mobile-drawer"]'; 
    public $alignment               =   '//*[@id="mobile-drawer"]/div[2]/div[2]';
    public $closeIconButton         =   '//*[@id="mobile-drawer"]/div[2]/div[1]/button';
    public $checkDrawerBkgColorTab  =   '//*[@id="mobile-drawer"]/div[2]';   




    /**
     * This function checks style in the frontend
     */
    public function _checkStyle($I, $field, $prop, $getSelectorBy, $expectedStyle)
    {
        $this->field = $field;
        $this->prop = $prop;
        $actualStyle = '';
        if($getSelectorBy == 'css')
        {
            $actualStyle = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
                return $webdriver->findElement(WebDriverBy::cssSelector($this->field))->getCSSValue($this->prop);
            });
        }
        else {
            $actualStyle = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
                return $webdriver->findElement(WebDriverBy::xpath($this->field))->getCSSValue($this->prop);
            });
        }
        $I->assertEquals($expectedStyle, $actualStyle);
    }

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
