<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class CommonPrimarySettings
{
    // include url of current page
    public static $URL = '';

    /**
     * settings for navigation style
     */
    public $navigationStyle = '//*[@id="customize-control-responsive_primary_navigation_style"]/select';

    /**
     * settings for item 
     */
    public $itemspacing = '//*[@id="menu-item-19"]/a';
    public $pItemColor = '//*[@id="menu-item-18"]/a';
    public $pActiveItemColor = '//*[@id="menu-item-18"]/a';
    public $pBgHoverColor = '//*[@id="menu-item-19"]/a';
    public $pBackgroundColor = '//*[@id="menu-item-17"]/a';
    public $pActiveBgColor = '//*[@id="menu-item-18"]/a';
    public $frame = '//*[@id="customize-preview"]/iframe';

    /**
     * settings for dropdown option
     */
    public $dDReveal = '//*[@id="customize-control-responsive_primary_dropdown_navigation_reveal"]/select';
    public $dWidth = '//*[@id="menu-item-18"]/ul';
    public $dVerSpacing = '//*[@id="menu-item-20"]/a';
    public $dividerStyle = '//*[@id="customize-control-responsive_primary_dropdown_navigation_divider_type"]/select';
    public $dividerWidth = '//*[@id="menu-item-20"]';
    public $dItemColor = '//*[@id="menu-item-20"]/a';
    public $dActiveItemColor = '//*[@id="menu-item-20"]/a';
    public $dBgColor = '//*[@id="menu-item-18"]/ul';
    public $dBgHover = '//*[@id="menu-item-20"]/a';
    public $dDividerColor = '//*[@id="menu-item-20"]';
    /**
     * settings for typography option
     */
    public $typography = '//*[@id="menu-item-19"]/a';

    /**
     * settings for dropdown typography option
     */
    public $dTypography = '//*[@id="menu-item-20"]/a';
    


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
