<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class Helper
{
    // include url of current page
    public static $URL = '';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
   
    public $desktopMinheight = '//*[@id="main-header"]/div/div/div/div/div/div/div';
    public $desktopBgColor = '//*[@id="main-header"]/div/div/div/div/div';
    public $desktopPadding = '//*[@id="main-header"]/div/div/div/div/div';
    public $tabletPadding = '//*[@id="main-header"]/div/div/div/div/div';
    public $tabletBgColor = '//*[@id="main-header"]/div/div/div/div/div';
    public $tabletMinheight = '//*[@id="main-header"]/div/div/div/div/div/div/div';
    public $mobilePadding = '//*[@id="mobile-header"]/div/div/div/div/div';
    public $mobileBgColor = '//*[@id="mobile-header"]/div/div/div/div/div';
    public $mobileMinheight = '//*[@id="mobile-header"]/div/div/div/div/div/div/div';

    /**
      *layout settings
     */
    public $desktop = '//*[@id="customize-control-responsive_header_main_layout"]/select';
    public $tablet = '//*[@id="customize-control-responsive_header_main_layout"]/select';
    public $mobile = '//*[@id="customize-control-responsive_header_main_layout"]/select';


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




}
