<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class HeaderCartComponents
{
    // include url of current page
    public static $URL = '';

    //general
    public $field = '';
    public $prop = '';

    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $headerCart              =   '//*[@id="accordion-section-responsive_customizer_header_cart"]/h3';
    

    //backend
    public $cartLabel               =   '//*[@id="_customize-input-responsive_header_cart_label"]';
    public $showCartTotal           =   '//*[@id="responsive_header_cart_show_total"]';
    public $cartIcon                =   '//*[@id="customize-control-responsive_header_cart_icon"]/select';
    public $cartClickAction         =   '//*[@id="customize-control-responsive_header_cart_style"]/select';
    public $iconSize                =   '//*[@id="customize-control-responsive_header_cart_icon_size"]/label/div/input[2]';
    public $cartColor               =   '//*[@id="customize-control-responsive_header_cart_color"]/label/div/div/button';
    public $cartColor1              =   '//*[@id="customize-control-responsive_header_cart_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $cartHoverColor          =   '//*[@id="customize-control-responsive_header_cart_hover_color"]/label/div/div/button';
    public $cartHoverColor2         =   '//*[@id="customize-control-responsive_header_cart_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $backgroundColor         =   '//*[@id="customize-control-responsive_header_cart_background_color"]/label/div/div/button';
    public $backgroundColor4        =   '//*[@id="customize-control-responsive_header_cart_background_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $backgroundHoverColor    =   '//*[@id="customize-control-responsive_header_cart_background_hover_color"]/label/div/div/button';
    public $backgroundHoverColor1   =   '//*[@id="customize-control-responsive_header_cart_background_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $cartTotalColor          =   '//*[@id="customize-control-responsive_header_cart_total_color"]/label/div/div/button';
    public $cartTotalColor7         =   '//*[@id="customize-control-responsive_header_cart_total_color"]/label/div/div/div/div[2]/div/div/div[7]/button';
    public $cartTotalHoverColor     =   '//*[@id="customize-control-responsive_header_cart_total_hover_color"]/label/div/div/button';
    public $cartTotalHoverColor5    =   '//*[@id="customize-control-responsive_header_cart_total_hover_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $cartTotBackColor        =   '//*[@id="customize-control-responsive_header_cart_total_background_color"]/label/div/div/button';
    public $cartTotBackColor3       =   '//*[@id="customize-control-responsive_header_cart_total_background_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $cartTotBackHoverColor   =   '//*[@id="customize-control-responsive_header_cart_total_background_hover_color"]/label/div/div/button';
    public $cartTotBackHoverColor2  =   '//*[@id="customize-control-responsive_header_cart_total_background_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';

    //frotend
    public $icon               =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/div/a/span[2]/svg';
    public $cartButton         =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/div/button'; 
    public $cartDrawer         =   '//*[@id="cart-drawer"]';
    public $cart               =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/div';
    public $cartForColor       =   '//*[@id="cart-menu"]/li/a';
    public $cartLabelColor       =   '//*[@id="cart-menu"]/li/a/span[1]'; 
    public $cartValueColor     =   '//*[@id="cart-menu"]/li/a/span[2]'; 
    public $cartElement        =   '//*[@id="cart-menu"]/li';

    public $cartTotal          =   '/.header-cart-wrap .header-cart-button .header-cart-total'; 
    public $dropDownAnimation  =   '.header-navigation'; 


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
