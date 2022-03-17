<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class FooterTopRowComponents
{
    // include url of current page
    public static $URL = '';

    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $footerButton            =   '//*[@id="accordion-panel-responsive_footer"]/h3';
    public $TopRowSettings          =   '//*[@id="customize-control-footer_items"]/div/div/div[1]/button[1]';
    public $publishButton           =   '//*[@id="save"]';

    //backend components
    public $numberOfColumns         =   '//*[@id="customize-control-responsive_footer_top_columns"]/label/div/input[2]';
    public $containerWidthDesk      =   '//*[@id="customize-control-responsive_footer_top_contain"]/select'; //standard fullwidth contained
    public $containerWidthTab       =   '//*[@id="customize-control-responsive_footer_tablet_top_contain"]/select';
    public $containerWidthMob       =   '//*[@id="customize-control-responsive_footer_mobile_top_contain"]/select';
    public $rowDirectionDesk        =   '//*[@id="customize-control-responsive_footer_top_direction_desktop"]/select'; //row column
    public $rowDirectionTab         =   '//*[@id="customize-control-responsive_footer_top_direction_tablet"]/select';
    public $rowDirectionMob         =   '//*[@id="customize-control-responsive_footer_top_direction_mobile"]/select';
    public $collapseRow             =   '//*[@id="customize-control-responsive_footer_top_collapse"]/select';
    
    public $topSpacingDesk          =   '//*[@id="customize-control-responsive_footer_top_row_top_spacing"]/label/div/input[2]';
    public $topSpacingTab           =   '//*[@id="customize-control-responsive_footer_top_row_top_spacing_tablet"]/label/div/input[2]';
    public $topSpacingMob           =   '//*[@id="customize-control-responsive_footer_top_row_top_spacing_mobile"]/label/div/input[2]';
    public $botSpacingDesk          =   '//*[@id="customize-control-responsive_footer_top_row_bottom_spacing"]/label/div/input[2]';
    public $botSpacingTab           =   '//*[@id="customize-control-responsive_footer_top_row_bottom_spacing_tablet"]/label/div/input[2]';
    public $botSpacingMob           =   '//*[@id="customize-control-responsive_footer_top_row_bottom_spacing_mobile"]/label/div/input[2]';
    public $minHtDesk               =   '//*[@id="customize-control-responsive_footer_top_row_min_height"]/label/div/input[2]';
    public $minHtTab                =   '//*[@id="customize-control-responsive_footer_top_row_min_height_tablet"]/label/div/input[2]';
    public $minHtMob                =   '//*[@id="customize-control-responsive_footer_top_row_min_height_mobile"]/label/div/input[2]';

    public $linkStyle               =   '//*[@id="customize-control-responsive_footer_top_link_style"]/select'; //normal noline
    public $linkColor               =   '//*[@id="customize-control-responsive_footer_top_row_link_color"]/label/div/div/button';
    public $linkColor8              =   '//*[@id="customize-control-responsive_footer_top_row_link_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $linkHoverColor          =   '//*[@id="customize-control-responsive_footer_top_row_link_hover_color"]/label/div/div/button';
    public $linkHoverColor2         =   '//*[@id="customize-control-responsive_footer_top_row_link_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';

    public $backgroundDesk          =   '//*[@id="customize-control-responsive_footer_top_row_background_desktop_color"]/label/div/div/button';
    public $backgroundDesk3         =   '//*[@id="customize-control-responsive_footer_top_row_background_desktop_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $backgroundTab           =   '//*[@id="customize-control-responsive_footer_top_row_background_tablet_color"]/label/div/div/button';
    public $backgroundTab4          =   '//*[@id="customize-control-responsive_footer_top_row_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $backgroundMob           =   '//*[@id="customize-control-responsive_footer_top_row_background_mobile_color"]/label/div/div/button';
    public $backgroundMob2          =   '//*[@id="customize-control-responsive_footer_top_row_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[2]/button';

    public $fontFamily              =   '//*[@id="customize-control-footer_top_widget_content_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-footer_top_widget_content_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-footer_top_widget_content_typography-font-style"]/select';
    public $textTransform           =   '//*[@id="customize-control-footer_top_widget_content_typography-text-transform"]/select';
    public $fontSize                =   '//*[@id="customize-control-footer_top_widget_content_typography-font-size"]/div[1]/input';
    public $lineHeight              =   '//*[@id="customize-control-footer_top_widget_content_typography-line-height"]/label/div/input[2]';
    public $letterSpacing           =   '//*[@id="customize-control-footer_top_widget_content_typography-letter-spacing"]/label/div/input[2]';


    //frontend
    public $topRowColumns           =   '//*[@id="colophon"]/div/div[1]/div/div/div'; 
    public $columns3                =   '.site-footer-row.site-footer-row-columns-3';
    public $topRowWidthDesk         =   '//*[@id="colophon"]/div/div[1]';
    public $standardLayout          =   '.site-footer-row-layout-standard';  
    public $fullwidthLayout         =   '.site-footer-row-layout-fullwidth';
    public $rowCollapse             =   '//*[@id="colophon"]/div/div[1]/div/div/div';
    public $link                    =   '//*[@id="primary-menu"]/li/a'; 
    public $bkgColorTopRow          =   '//*[@id="colophon"]/div/div[1]/div';
    public $bkgColorMob             =   '//*[@id="colophon"]/div/div[1]/div';
    public $typoTopRow              =   '//*[@id="block-8"]';
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
