<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class MobileHtmlComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $mobileHtmlAndText       =   '//*[@id="accordion-section-responsive_customizer_mobile_html"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';

    //backend components
    public $addelement              =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[2]/button';
    public $removeHtml              =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[1]/div/button[2]';
    public $html                    =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[2]/span/div/div/div/div/div/button[5]';
    public $addmedia                =   '//*[@id="wp-responsive_mobile_html_content-wrap"]/div/div[1]/button';
    public $mediaLibrary            =   '//*[@id="menu-item-browse"]';
    public $imageThumbnail          =   '//html/body/div[13]/div[1]/div/div/div[3]/div[2]/div/div[3]/ul/li[2]/div/div/div/img';
    public $insertIntoPost          =   '//*[@id="__wp-uploader-id-3"]/div[4]/div/div[2]/button';

    public $iFrame                  =   '//*[@id="responsive_mobile_html_content_ifr"]';
    public $htmlText                =   '//*[@id="tinymce"]'; 

    public $fontFamily              =   '//*[@id="customize-control-mobile_header_html_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-mobile_header_html_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-mobile_header_html_typography-font-style"]/select';
    public $fontSize                =   '//*[@id="customize-control-mobile_header_html_typography-font-size"]/div[2]/input';
    public $fontSizeTablet          =   '//*[@id="customize-control-header_html_typography-font-size"]/div[2]/input';
    public $textTransform           =   '//*[@id="customize-control-mobile_header_html_typography-text-transform"]/select';
    public $lineHeight              =   '//*[@id="customize-control-mobile_header_html_typography-line-height"]/label/div/input[2]';
    public $letterSpacing           =   '//*[@id="customize-control-mobile_header_html_typography-letter-spacing"]/label/div/input[2]';
    
    //frontend components
    public $htmlelement             =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div';
    public $TypoSettings            =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div';


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
