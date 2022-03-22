<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class MobileCartComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerbutton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $mobileCart              =   '//*[@id="accordion-section-responsive_customizer_mobile_cart"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile                  =   '//*[@id="customize-footer-actions"]/div/div/button[3]';

    //backend components
    public $cartLabel               =   '//*[@id="_customize-input-responsive_header_mobile_cart_label"]';
    public $cartIcon                =   '//*[@id="customize-control-responsive_header_mobile_cart_icon"]/select';
    public $cartClickAction         =   '//*[@id="customize-control-responsive_header_mobile_cart_style"]/select';
    public $iconSize                =   '//*[@id="customize-control-responsive_mobile_cart_icon_size"]/label/div/input[2]';

    public $cartColor               =   '//*[@id="customize-control-responsive_mobile_cart_color"]/label/div/div/button';
    public $cartColor1              =   '//*[@id="customize-control-responsive_mobile_cart_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $cartHoverColor          =   '//*[@id="customize-control-responsive_mobile_cart_hover_color"]/label/div/div/button';
    public $cartHoverColor3         =   '//*[@id="customize-control-responsive_mobile_cart_hover_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $bkgdColor               =   '//*[@id="customize-control-responsive_mobile_cart_background_color"]/label/div/div/button';
    public $bkgdColor8              =   '//*[@id="customize-control-responsive_mobile_cart_background_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $bkgdHoverColor          =   '//*[@id="customize-control-responsive_mobile_cart_background_hover_color"]/label/div/div/button';
    public $bkgdHoverColor4         =   '//*[@id="customize-control-responsive_mobile_cart_background_hover_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $cartTotalColor          =   '//*[@id="customize-control-responsive_mobile_cart_total_color"]/label/div/div/button';
    public $cartTotalColor1         =   '//*[@id="customize-control-responsive_mobile_cart_total_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $cartTotalHoverColor     =   '//*[@id="customize-control-responsive_mobile_cart_total_hover_color"]/label/div/div/button';
    public $cartTotalHoverColor2    =   '//*[@id="customize-control-responsive_mobile_cart_total_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $cartTotalBkgdColor      =   '//*[@id="customize-control-responsive_mobile_cart_total_background_color"]/label/div/div/button';
    public $cartTotalBkgdColor3     =   '//*[@id="customize-control-responsive_mobile_cart_total_background_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $cartTotalBkgdHover      =   '//*[@id="customize-control-responsive_mobile_cart_total_background_hover_color"]/label/div/div/button';
    public $cartTotalBkgdHover1     =   '//*[@id="customize-control-responsive_mobile_cart_total_background_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';



    //frontend components
    public $cart                    =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/div/button/span[2]';
    public $slide                   =   '//*[@id="cart-drawer"]';
    public $popupDrawerforSlide     =   'body.admin-bar .popup-drawer';
    public $cartButton              =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/div/button';
    public $icon                    =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/div/button/span[2]';
    public $cartValue               =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/div/button/span[3]';



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
