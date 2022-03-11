<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class triggerComponents
{
    // include url of current page
    public static $URL = '';

    public $field     =   '';
    public $prop      =   '';

    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $triggerSection          =   '//*[@id="accordion-section-responsive_customizer_mobile_trigger"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile                  =   '//*[@id="customize-footer-actions"]/div/div/button[3]';

    //backend
    public $triggerStyle            =   '//*[@id="customize-control-responsive_mobile_trigger_style"]/select';
    public $triggerIcon             =   '//*[@id="customize-control-responsive_mobile_trigger_icon"]/select';
    public $triggerLabel            =   '//*[@id="_customize-input-responsive_mobile_trigger_label"]';
    public $iconSize                =   '//*[@id="customize-control-responsive_mobile_trigger_icon_size"]/label/div/input[2]';
    public $triggerColor            =   '//*[@id="customize-control-responsive_trigger_color"]/label/div/div/button';
    public $triggerColor2           =   '//*[@id="customize-control-responsive_trigger_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $triggerHoverColor       =   '//*[@id="customize-control-responsive_trigger_hover_color"]/label/div/div/button';
    public $triggerHoverColor1      =   '//*[@id="customize-control-responsive_trigger_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $navigationColor         =   '//*[@id="customize-control-responsive_trigger_navigation_color"]/label/div/div/button';
    public $navigationColor1        =   '//*[@id="customize-control-responsive_trigger_navigation_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $navigationHoverColor    =   '//*[@id="customize-control-responsive_trigger_navigation_hover_color"]/label/div/div/button';
    public $navigationHoverColor2   =   '//*[@id="customize-control-responsive_trigger_navigation_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';

    //frontend
    public $triggerButton           =   '//*[@id="mobile-toggle"]';
    public $triggerSpan             =   '//*[@id="mobile-toggle"]/span[2]';

    public $menuToggleStyleDefault  =   '.menu-toggle-open.menu-toggle-style-default';
    public $menuToggleIcon          =   '.mobile-toggle-open-container .menu-toggle-open .menu-toggle-icon';
    


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
