<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class FooterMiddleRowComponents
{
    // include url of current page
    public static $URL = '';

    //general components
    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $footerButton            =   '//*[@id="accordion-panel-responsive_footer"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $middleRowButton         =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/button[1]';

    //backend component
    public $noOfColumns             =   '//*[@id="customize-control-responsive_footer_middle_columns"]/label/div/input[2]';
    public $addElement              =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[1]/div[2]/button';
    public $addElement2             =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[2]/div[2]/button';
    public $footerNavigation        =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[1]/div[2]/span/div/div/div/div/div/button[1]';
    public $removeFooterNavigation  =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[1]/div[1]/div/button[2]';
    public $deskWidth               =   '//*[@id="customize-control-responsive_footer_middle_contain"]/select';
    public $tabWidth                =   '//*[@id="customize-control-responsive_footer_tablet_middle_contain"]/select';
    public $mobWidth                =   '//*[@id="customize-control-responsive_footer_mobile_middle_contain"]/select';
    public $rowDirectionDesk        =   '//*[@id="customize-control-responsive_footer_middle_direction_desktop"]/select';
    public $rowDirectionTab         =   '//*[@id="customize-control-responsive_footer_middle_direction_tablet"]/select';
    public $rowDirectionMob         =   '//*[@id="customize-control-responsive_footer_middle_direction_mobile"]/select';
    public $rowCollapse             =   '//*[@id="customize-control-responsive_footer_middle_collapse"]/select';

    public $topSpacingDesk          =   '//*[@id="customize-control-responsive_footer_middle_row_top_spacing"]/label/div/input[2]';
    public $topSpacingTab           =   '//*[@id="customize-control-responsive_footer_middle_row_top_spacing_tablet"]/label/div/input[2]';
    public $topSpacingMob           =   '//*[@id="customize-control-responsive_footer_middle_row_top_spacing_mobile"]/label/div/input[2]';
    public $bottomSpacingDesk       =   '//*[@id="customize-control-responsive_footer_middle_row_bottom_spacing"]/label/div/input[2]';
    public $bottomSpacingTab        =   '//*[@id="customize-control-responsive_footer_middle_row_bottom_spacing_tablet"]/label/div/input[2]';
    public $bottomSpacingMob        =   '//*[@id="customize-control-responsive_footer_middle_row_bottom_spacing_mobile"]/label/div/input[2]';
    public $minHtDesk               =   '//*[@id="customize-control-responsive_footer_middle_row_min_height"]/label/div/input[2]';
    public $minHtTab                =   '//*[@id="customize-control-responsive_footer_middle_row_min_height_tablet"]/label/div/input[2]';
    public $minHtMob                =   '//*[@id="customize-control-responsive_footer_middle_row_min_height_mobile"]/label/div/input[2]';

    public $linkStyle               =   '//*[@id="customize-control-responsive_footer_middle_link_style"]/select';
    public $linkColor               =   '//*[@id="customize-control-responsive_footer_middle_row_link_color"]/label/div/div/button';
    public $linkColor8              =   '//*[@id="customize-control-responsive_footer_middle_row_link_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $linkHoverColor          =   '//*[@id="customize-control-responsive_footer_middle_row_link_hover_color"]/label/div/div/button';
    public $linkHoverColor1         =   '//*[@id="customize-control-responsive_footer_middle_row_link_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $copyright               =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[2]/div[2]/span/div/div/div/div/div/button[3]';
    public $link                    =   '//*[@id="block-16"]/div/p/a';
    public $widget1                 =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[1]/div[2]/span/div/div/div/div/div/button[4]';
    public $removeWidget1           =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[1]/div[1]/div/button[3]';
    public $widgetSettings          =   '//*[@id="customize-control-footer_items"]/div/div/div[2]/div/div[1]/div[1]/div/button[1]';

    public $backgroundDesk          =   '//*[@id="customize-control-responsive_footer_middle_row_background_desktop_color"]/label/div/div/button';
    public $backgroundDesk4         =   '//*[@id="customize-control-responsive_footer_middle_row_background_desktop_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $backgroundTab           =   '//*[@id="customize-control-responsive_footer_middle_row_background_tablet_color"]/label/div/div/button';
    public $backgroundTab5          =   '//*[@id="customize-control-responsive_footer_middle_row_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $backgroundMob           =   '//*[@id="customize-control-responsive_footer_middle_row_background_mobile_color"]/label/div/div/button';
    public $backgroundMob3          =   '//*[@id="customize-control-responsive_footer_middle_row_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[3]/button';

    public $fontFamily              =   '//*[@id="customize-control-footer_middle_widget_content_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-footer_middle_widget_content_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-footer_middle_widget_content_typography-font-style"]/select';
    public $textTransform           =   '//*[@id="customize-control-footer_middle_widget_content_typography-text-transform"]/select';
    public $fontSize                =   '//*[@id="customize-control-footer_middle_widget_content_typography-font-size"]/div[1]/input';
    public $lineHeight              =   '//*[@id="customize-control-footer_middle_widget_content_typography-line-height"]/label/div/input[2]';
    public $letterSpacing           =   '//*[@id="customize-control-footer_middle_widget_content_typography-letter-spacing"]/label/div/input[2]';


    //frontend components
    public $layoutElement           =   '//*[@id="colophon"]/div/div';
    public $standard                =   '.site-footer-row-layout-standard ';
    public $columns                 =   '//*[@id="colophon"]/div/div/div/div/div';
    public $middleRow                 =   '//*[@id="colophon"]/div/div/div'; 
    



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
