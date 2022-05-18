<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class FooterNavigationComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $footerButton            =   '//*[@id="accordion-panel-responsive_footer"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $footerNavigation        =   '//*[@id="accordion-section-responsive_customizer_footer_navigation"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';

    
    //backend components
    public $addelement              =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/div/div[2]/div[2]/button';
    public $nav                     =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/div/div[2]/div[2]/span/div/div/div/div/div/button[1]';
    public $removenav               =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/div/div[2]/div[1]/div/button[2]';
    public $iframe                  =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/div/div[1]/div[2]/span/div/div/div/iframe';

    public $contentAlignDesk        =   '//*[@id="customize-control-responsive_footer_navigation_align_desktop"]/select';  //left center right
    public $contentAlignTab         =   '//*[@id="customize-control-responsive_footer_navigation_align_tablet"]/select';
    public $contentAlignMob         =   '//*[@id="customize-control-responsive_footer_navigation_align_mobile"]/select';
    public $verticalAlignDesk       =   '//*[@id="customize-control-responsive_footer_navigation_vertical_align_desktop"]/select';  //top middle bottom
    public $verticalAlignTab        =   '//*[@id="customize-control-responsive_footer_navigation_vertical_align_tablet"]/select';
    public $verticalAlignMob        =   '//*[@id="customize-control-responsive_footer_navigation_vertical_align_mobile"]/select';
    public $stretchMenu             =   '//*[@id="responsive_footer_stretch_menu"]';

    public $itemSpacing             =   '//*[@id="customize-control-responsive_footer_navigation_item_spacing"]/label/div/input[1]';
    public $itemPadding             =   '//*[@id="customize-control-responsive_footer_navigation_item_top_bottom_spacing"]/label/div/input[2]';

    public $fontFamily              =   '//*[@id="customize-control-footer_navigation_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-footer_navigation_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-footer_navigation_typography-font-style"]/select';
    public $fontSize                =   '//*[@id="customize-control-footer_navigation_typography-font-size"]/div[1]/input';
    public $textTransform           =   '//*[@id="customize-control-footer_navigation_typography-text-transform"]/select';
    public $lineHeight              =   '//*[@id="customize-control-footer_navigation_typography-line-height"]/label/div/input[2]';
    public $letterSpacing           =   '//*[@id="customize-control-footer_navigation_typography-letter-spacing"]/label/div/input[2]';

    //frontend components
    public $alignment               =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div';
    public $stretchlayout           =   '//*[@id="footer-navigation"]'; 
    public $typoSettings            =   '//*[@id="primary-menu"]/li/a'; 

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
