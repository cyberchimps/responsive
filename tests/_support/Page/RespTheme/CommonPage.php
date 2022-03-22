<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;




class CommonPage
{
    // include url of current page
    public static $URL = '';

    /**
     *settings for secondary navigation style
     */
    public $frame = '//*[@id="customize-preview"]/iframe';
    public $navigationStyle = '//*[@id="customize-control-responsive_secondary_navigation_style"]/select';

     /**
     *item settings for secondary navigation
     */
    public $itemspacing = '//*[@id="menu-item-166"]/a';
    public $sItemColor = '//*[@id="menu-item-166"]/a';
    public $sItemHColor = '//*[@id="menu-item-166"]/a';
    public $sActiveItemColor = '//*[@id="menu-item-433"]/a';
    public $sBackgroundColor = '//*[@id="menu-item-433"]/a';

    /**
     * dropdown settings for secondary navigation 
     */
    public $dDReveal = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_reveal"]/select';
    public $dWidth = '//*[@id="menu-item-166"]/ul';
    public $dVerSpacing ='//*[@id="menu-item-167"]/a';
    public $dividerStyle = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_divider_type"]/select';
    public $dividerWidth = '//*[@id="menu-item-167"]';
    public $dItemColor = '//*[@id="menu-item-167"]/a';
    public $dBgColor = '//*[@id="menu-item-166"]/ul';
    public $dBgHover = '//*[@id="menu-item-168"]/a';
    public $dActiveBg = '//*[@id="menu-item-167"]/a';
    public $dDividerColor = '//*[@id="menu-item-167"]';
    /**
     * typography settings for secondary navigation
     */
    public $typography = '//*[@id="menu-item-166"]/a';
    /**
     * dropdown typograhy settings for secondary navigation
     */
    public $dTypography = '//*[@id="menu-item-167"]/a';

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
