<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class MobileSocialComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $mobileSocial            =   '//*[@id="accordion-section-responsive_customizer_mobile_social"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile                  =   '//*[@id="customize-footer-actions"]/div/div/button[3]';
   

    //backend components
    public $addElement              =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[2]/button';
    public $social                  =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[2]/span/div/div/div/div/div/button[4]';
    public $openInNewTab            =   '//*[@id="customize-control-responsive_mobile_social_link_new_tab"]/select';
    public $facebook                =   '//*[@id="_customize-input-res_mobile_facebook"]';
    public $linkedIn                =   '//*[@id="_customize-input-res_mobile_linkedin"]';
    public $youTube                 =   '//*[@id="_customize-input-res_mobile_youtube"]';
    public $removeSocial            =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[1]/div/button[2]';

    public $iconSize                =   '//*[@id="customize-control-responsive_header_icon_size_tablet"]/label/div/input[2]';
    public $iconColor               =   '//*[@id="customize-control-responsive_header_social_icon_tablet_color"]/label/div/div/button';
    public $iconColor1              =   '//*[@id="customize-control-responsive_header_social_icon_tablet_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $iconHoverColor          =   '//*[@id="customize-control-responsive_header_social_icon_hover_tablet_color"]/label/div/div/button';
    public $iconHoverColor2         =   '//*[@id="customize-control-responsive_header_social_icon_hover_tablet_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $backgroundColor         =   '//*[@id="customize-control-responsive_header_social_icon_background_tablet_color"]/label/div/div/button';
    public $backgroundColor2        =   '//*[@id="customize-control-responsive_header_social_icon_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $backgroundHoverColor    =   '//*[@id="customize-control-responsive_header_social_icon_background_hover_tablet_color"]/label/div/div/button';
    public $backgroundHoverColor1   =   '//*[@id="customize-control-responsive_header_social_icon_background_hover_tablet_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $borderColor             =   '//*[@id="customize-control-responsive_header_social_icon_border_tablet_color"]/label/div/div/button';
    public $borderColor3            =   '//*[@id="customize-control-responsive_header_social_icon_border_tablet_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $borderHoverColor        =   '//*[@id="customize-control-responsive_header_social_icon_border_hover_tablet_color"]/label/div/div/button';
    public $borderHoverColor1       =   '//*[@id="customize-control-responsive_header_social_icon_border_hover_tablet_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $borderStyle             =   '//*[@id="customize-control-responsive_header_social_border_style_tablet"]/select';
    public $borderWidth             =   '//*[@id="customize-control-responsive_header_social_border_size_tablet"]/label/div/input[2]';
    public $borderRadius            =   '//*[@id="customize-control-responsive_header_social_border_radius_tablet"]/label/div/input[2]';


    //frontend components
    public $socialIcons             =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/ul';
    public $facebookIcon            =   '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/ul/li[1]/a';


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
