<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class HeaderSocialComponents
{
    // include url of current page
    public static $URL = '';

    public $field     =   '';
    public $prop      =   '';

    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $headerSocial            =   '//*[@id="accordion-section-responsive_customizer_header_social"]/h3';
    public $tablet                  =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile                  =   '//*[@id="customize-footer-actions"]/div/div/button[3]';
    public $mobileSocialSettings    =   '//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[1]/div/div[1]/div[1]/div/button[1]';

    //backend
    public $OpenInNewTab            =   '//*[@id="customize-control-responsive_header_social_link_new_tab"]/select';
    public $twitter                 =   '//*[@id="_customize-input-res_header_twitter"]';
    public $facebook                =   '//*[@id="_customize-input-res_header_facebook"]';
    public $linkedIn                =   '//*[@id="_customize-input-res_header_linkedin"]';
    public $youTube                 =   '//*[@id="_customize-input-res_header_youtube"]';
    public $RSSFeed                 =   '//*[@id="_customize-input-res_header_rss"]';
    public $Instagram               =   '//*[@id="_customize-input-res_header_instagram"]';
    public $Pinterest               =   '//*[@id="_customize-input-res_header_pinterest"]';
    public $StumbleUpon             =   '//*[@id="_customize-input-res_header_stumble"]';
    public $Vimeo                   =   '//*[@id="_customize-input-res_header_vimeo"]';
    public $Yelp                    =   '//*[@id="_customize-input-res_header_yelp"]';
    public $Foursquare              =   '//*[@id="_customize-input-res_header_foursquare"]';
    public $emailAddress            =   '//*[@id="_customize-input-email_header_uid"]';
    public $iconSize                =   '//*[@id="customize-control-responsive_header_icon_size"]/label/div/input[2]';
    public $iconColor               =   '//*[@id="customize-control-responsive_header_social_icon_color"]/label/div/div/button';
    public $iconColorWhite          =   '//*[@id="customize-control-responsive_header_social_icon_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $iconHoverColor          =   '//*[@id="customize-control-responsive_header_social_icon_hover_color"]/label/div/div/button';
    public $iconHoverColor1         =   '//*[@id="customize-control-responsive_header_social_icon_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $backgroundColor         =   '//*[@id="customize-control-responsive_header_social_icon_background_color"]/label/div/div/button';
    public $backgroundColor1        =   '//*[@id="customize-control-responsive_header_social_icon_background_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $backgroundHoverColor    =   '//*[@id="customize-control-responsive_header_social_icon_background_hover_color"]/label/div/div/button';
    public $backgroundHoverColor2   =   '//*[@id="customize-control-responsive_header_social_icon_background_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $borderColor             =   '//*[@id="customize-control-responsive_header_social_icon_border_color"]/label/div/div/button';
    public $borderColor3            =   '//*[@id="customize-control-responsive_header_social_icon_border_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $borderHoverColor         =   '//*[@id="customize-control-responsive_header_social_icon_border_hover_color"]/label/div/div/button';
    public $borderHoverColor1        =   '//*[@id="customize-control-responsive_header_social_icon_border_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $borderStyle             =   '//*[@id="customize-control-responsive_header_social_border_style"]/select';
    public $borderWidth             =   '//*[@id="customize-control-responsive_header_social_border_size"]/label/div/input[2]';
    public $borderRadius            =   '//*[@id="customize-control-responsive_header_social_border_radius"]/label/div/input[2]';

    //frontend
    public $twitterIcon             =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/ul/li[1]/a';
    public $facebookIcon            =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/ul/li[2]/a';
    public $linkedInIcon            =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/ul/li[3]/a';
    public $youTubeIcon             =   '//*[@id="main-header"]/div/div/div/div[1]/div/div/div/div[1]/div/div/ul/li[4]/a';




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
