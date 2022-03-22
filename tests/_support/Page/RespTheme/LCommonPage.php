<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class LCommonPage
{
    // include url of current page
    public static $URL = '';
    /**
     * logolayout settings
     */
    public $dLogoLayout = '//*[@id="customize-control-responsive_desktop_logo_layout_include"]/select';
    public $tLogoLayout = '//*[@id="customize-control-responsive_tablet_logo_layout_include"]/select';
    public $mLogoLayout = '//*[@id="customize-control-responsive_mobile_logo_layout_include"]/select';

    /**
     * logolayout structure settings
     */
    public $dLogoLayoutStructure = '//*[@id="customize-control-responsive_desktop_logo_layout_structure"]/select';
    public $tLogoLayoutStructure = '//*[@id="customize-control-responsive_tablet_logo_layout_structure"]/select';
    public $mLogoLayoutStructure = '//*[@id="customize-control-responsive_mobile_logo_layout_structure"]/select';
    /**
     * Padding settings
     */
    public $desktopPadding = '//*[@id="main-header"]/div/div/div/div/div/div/div/div[1]/div/div';
    public $tabletPadding = '//*[@id="main-header"]/div/div/div/div/div/div/div/div[1]/div/div';
    public $mobilePadding = '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div';
    /**
     * item settings
     */
    public $siteTitle = '//*[@id="main-header"]/div/div/div/div/div/div/div/div[1]/div/div/a/div/p';
    public $tSiteTitle = '//*[@id="main-header"]/div/div/div/div/div/div/div/div[1]/div/div/a/div/p';
    public $mSiteTitle = '//*[@id="main-header"]/div/div/div/div/div/div/div/div[1]/div/div/a/div/p';
    public $siteTitleHover = '//*[@id="main-header"]/div/div/div/div/div/div/div/div[1]/div/div/a/div/p';
    public $frame = '//*[@id="customize-preview"]/iframe';
    public $title = '//*[@id="main-header"]/div/div/div/div/div/div[2]/div/div[1]/div/div/a/div/p';
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
