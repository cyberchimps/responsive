<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class FooterHtmlComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $footerButton            =   '//*[@id="accordion-panel-responsive_footer"]/h3';
    public $footerHtmlSettings      =   '//*[@id="accordion-section-responsive_customizer_footer_html"]/h3';
    public $publishButton           =   '//*[@id="save"]';

    //backend components
    public $iframe                  =   '//*[@id="responsive_footer_html_content_ifr"]';
    public $inputHtml               =   '//*[@id="tinymce"]/p[1]';
    public $addImage                =   '//*[@id="wp-responsive_footer_html_content-wrap"]/div/div[1]/button';
    public $mediaLibrary            =   '//*[@id="menu-item-browse"]';
    public $image                   =   '/html/body/div[9]/div[1]/div/div/div[3]/div[2]/div/div[3]/ul/li';  
    public $insertIntoPost          =   '//*[@id="__wp-uploader-id-0"]/div[4]/div/div[2]/button';
    public $linkStyle               =   '//*[@id="customize-control-responsive_footer_html_link_style"]/select';
    public $textColor               =   '//*[@id="customize-control-responsive_footer_html_text_color"]/label/div/div/button';
    public $textColor1              =   '//*[@id="customize-control-responsive_footer_html_text_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $linkColor               =   '//*[@id="customize-control-responsive_footer_html_link_color"]/label/div/div/button';
    public $linkColor8              =   '//*[@id="customize-control-responsive_footer_html_link_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $linkHoverColor          =   '//*[@id="customize-control-responsive_footer_html_link_hover_color"]/label/div/div/button';
    public $linkHoverColor1         =   '//*[@id="customize-control-responsive_footer_html_link_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    
    public $contentAlignDesk        =   '//*[@id="customize-control-responsive_footer_html_align_desktop"]/select';
    public $contentAlignTab         =   '//*[@id="customize-control-responsive_footer_html_align_tablet"]/select';
    public $contentAlignMob         =   '//*[@id="customize-control-responsive_footer_html_align_mobile"]/select';
    public $verticalAlignDesk       =   '//*[@id="customize-control-responsive_footer_html_vertical_align_desktop"]/select';
    public $verticalAlignTab        =   '//*[@id="customize-control-responsive_footer_html_vertical_align_tablet"]/select';
    public $verticalAlignMob        =   '//*[@id="customize-control-responsive_footer_html_vertical_align_mobile"]/select';
    
    public $marginDesk              =   '//*[@id="customize-control-responsive_footer_html_margin"]/span/ul/li[1]/button';
    public $marginTab               =   '//*[@id="customize-control-responsive_footer_html_margin"]/span/ul/li[2]/button';
    public $marginMob               =   '//*[@id="customize-control-responsive_footer_html_margin"]/span/ul/li[3]/button';
    public $marginInputDesk         =   '//*[@id="customize-control-responsive_footer_html_margin"]/ul[1]/li[1]/input';
    public $marginInputTab          =   '//*[@id="customize-control-responsive_footer_html_margin"]/ul[2]/li[1]/input';
    public $marginInputMob          =   '//*[@id="customize-control-responsive_footer_html_margin"]/ul[3]/li[1]/input';

    public $fontFamily              =   '//*[@id="customize-control-footer_html_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-footer_html_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-footer_html_typography-font-style"]/select';
    public $textTransform           =   '//*[@id="customize-control-footer_html_typography-text-transform"]/select';
    public $fontSize                =   '//*[@id="customize-control-footer_html_typography-font-size"]/div[1]/input';
    public $lineHeight              =   '//*[@id="customize-control-footer_html_typography-line-height"]/label/div/input[2]';
    public $letterSpacing           =   '//*[@id="customize-control-footer_html_typography-letter-spacing"]/label/div/input[2]';

    //frontend components
    public $footerImg               =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div/div/div/div/p[2]/img';
    public $link                    =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div/div/div/div/p[1]/a';
    public $AlignSettings           =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div';
    public $margin                  =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div/div/div';
    public $TypoSettings            =   '//*[@id="colophon"]/div/div/div';
    
    


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
