<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class FooterSocialComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $footerButton            =   '//*[@id="accordion-panel-responsive_footer"]/h3';
    public $footerSocialSettings    =   '//*[@id="accordion-section-responsive_customizer_footer_social"]/h3';
    public $publishButton           =   '//*[@id="save"]';

    //backend components

    public $topRowContentAdd        =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/div/div[1]/div[2]/button';
    public $socialButton            =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/div/div[1]/div[2]/span/div/div/div/div/div/button[2]';

    public $contentAlignDesk        =   '//*[@id="customize-control-responsive_footer_social_align_desktop"]/select';
    public $contentAlignTab         =   '//*[@id="customize-control-responsive_footer_social_align_tablet"]/select';
    public $contentAlignMob         =   '//*[@id="customize-control-responsive_footer_social_align_mobile"]/select';
    public $contentVertAlignDesk    =   '//*[@id="customize-control-responsive_footer_social_vertical_align_desktop"]/select';
    public $contentVertAlignTab     =   '//*[@id="customize-control-responsive_footer_social_vertical_align_tablet"]/select';
    public $contentVertAlignMob     =   '//*[@id="customize-control-responsive_footer_social_vertical_align_mobile"]/select';

    public $facebookInp             =   '//*[@id="_customize-input-res_footer_facebook"]';
    public $linkedInInp             =   '//*[@id="_customize-input-res_footer_linkedin"]';
    public $youtubeInp              =   '//*[@id="_customize-input-res_footer_youtube"]';
    public $iconSize                =   '//*[@id="customize-control-responsive_footer_icon_size"]/label/div/input[2]';
    public $openInNewTab            =   '//*[@id="customize-control-responsive_footer_social_link_new_tab"]/select';  //_self  _blank

    public $iconColor               =   '//*[@id="customize-control-responsive_footer_social_icon_color"]/label/div/div/button';
    public $iconColor1              =   '//*[@id="customize-control-responsive_footer_social_icon_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $iconHoverColor          =   '//*[@id="customize-control-responsive_footer_social_icon_hover_color"]/label/div/div/button';
    public $iconHoverColor2         =   '//*[@id="customize-control-responsive_footer_social_icon_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $backgroundColor         =   '//*[@id="customize-control-responsive_footer_social_icon_background_color"]/label/div/div/button';
    public $backgroundColor1        =   '//*[@id="customize-control-responsive_footer_social_icon_background_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $bkgdHoverColor          =   '//*[@id="customize-control-responsive_footer_social_icon_background_hover_color"]/label/div/div/button';
    public $bkgdHoverColor2         =   '//*[@id="customize-control-responsive_footer_social_icon_background_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $borderColor             =   '//*[@id="customize-control-responsive_footer_social_icon_border_color"]/label/div/div/button';
    public $borderColor3            =   '//*[@id="customize-control-responsive_footer_social_icon_border_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $borderHoverColor        =   '//*[@id="customize-control-responsive_footer_social_icon_border_hover_color"]/label/div/div/button';
    public $borderHoverColor5       =   '//*[@id="customize-control-responsive_footer_social_icon_border_hover_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $borderStyle             =   '//*[@id="customize-control-responsive_footer_social_border_style"]/select';
    public $borderWidth             =   '//*[@id="customize-control-responsive_footer_social_border_size"]/label/div/input[2]';
    public $borderRadius            =   '//*[@id="customize-control-responsive_footer_social_border_radius"]/label/div/input[2]';
    

    //frontend components
    public $alignment               =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div'; 
    public $socialIcons             =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div/div/div/ul';
    public $facebookIcon            =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div/div/div/ul/li[1]/a';
    public $youtubeIcon             =   '//*[@id="colophon"]/div/div/div/div/div/div[1]/div/div/div/ul/li[3]/a';


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
