<?php
namespace Page\RespTheme;

class Toprow
{
    // include url of current page
    public static $URL = '';

    //top row comoponents
    
    
    public $toprowbutton            =   '//*[@id="accordion-section-responsive_customizer_header_top"]';
    public $toprowdesklayout        =   '//*[@id="customize-control-responsive_header_top_layout"]/select';
    public $toprowtabletlayout      =   '//*[@id="customize-control-responsive_header_tablet_top_layout"]/select';
    public $toprowmoblayout         =   '//*[@id="customize-control-responsive_header_mobile_top_layout"]/select';

    public $desklayoutelement       =   '//*[@id="main-header"]/div/div/div/div[1]'; 
    public $tablayoutelement        =   '//*[@id="mobile-header"]/div/div/div/div[1]';
    public $moblayoutelement        =   '//*[@id="mobile-header"]/div/div/div/div[1]'; 
   
    public $minheightdesktop        =   '//*[@id="customize-control-responsive_top_row_min_height"]/label/div/input[2]';
    public $minheighttablet         =   '//*[@id="customize-control-responsive_top_row_min_height_tablet"]/label/div/input[2]';
    public $minheightmobile         =   '//*[@id="customize-control-responsive_top_row_min_height_mobile"]/label/div/input[2]';
   
    public $backgrounddesktop       =   '//*[@id="customize-control-responsive_top_row_background_desktop_color"]/label/div/div/button';
    public $backgroundtablet        =   '//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/div/div/button';
    public $backgroundmobile        =   '//*[@id="customize-control-responsive_top_row_background_mobile_color"]/label/div/div/button';
   
    public $colordesktop            =   '//*[@id="customize-control-responsive_top_row_background_desktop_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $colortablet             =   '//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $colormobile             =   '//*[@id="customize-control-responsive_top_row_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
   
    public $paddingspan             =   '//*[@id="customize-control-responsive_top_row_padding"]/span/span';
    public $paddinglayoutdesktop    =   '//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[1]/button';
    public $paddinglayouttablet     =   '//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[2]/button';
    public $paddinglayoutmobile     =   '//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[3]/button';
    public $paddingfielddesktop     =   '//*[@id="customize-control-responsive_top_row_padding"]/ul[1]/li[1]/input';
    public $paddingfieldtablet      =   '//*[@id="customize-control-responsive_top_row_padding"]/ul[2]/li[1]/input';
    public $paddingfieldmobile      =   '//*[@id="customize-control-responsive_top_row_padding"]/ul[3]/li[1]/input';
    public $publishbutton           =   '//*[@id="save"]';

    //general components
    public $customizebutton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerbutton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $desktoplayout           =   '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $tabletlayout            =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobilelayout            =   '//*[@id="customize-footer-actions"]/div/div/button[3]';
    public $collapsebtn          =   '//*[@id="customize-footer-actions"]/button';

    //Bottom row components
    public $bottomrowbtn            =   '//*[@id="accordion-section-responsive_customizer_header_bottom"]';
    public $bottomrowdesklayout     =   '//*[@id="customize-control-responsive_header_bottom_layout"]/select';
    public $bottomrowtabletlayout   =   '//*[@id="customize-control-responsive_header_tablet_bottom_layout"]/select';
    public $bottomrowmoblayout      =   '//*[@id="customize-control-responsive_header_mobile_bottom_layout"]/select';

    public $botdesklayoutelement    =   '//*[@id="main-header"]/div/div[2]';
    public $bottablayoutletelement  =   '//*[@id="mobile-header"]/div/div[2]';
    public $botmobilelayoutelement  =   '//*[@id="mobile-header"]/div/div[2]'; 
   
    public $botminhtdeskelement     =   '//*[@id="main-header"]/div/div[2]/div/div/div';
    public $botminhttabelement      =   '//*[@id="main-header"]/div/div[2]/div/div/div';
    public $botminhtmobelement      =   '//*[@id="main-header"]/div/div[2]/div/div/div';
    

    public $botminheightdesktop     =   '//*[@id="customize-control-responsive_bottom_row_min_height"]/label/div/input[2]';
    public $botminheighttablet      =   '//*[@id="customize-control-responsive_bottom_row_min_height_tablet"]/label/div/input[2]';
    public $botminheightmobile      =   '//*[@id="customize-control-responsive_bottom_row_min_height_mobile"]/label/div/input[2]';
    
    public $botbackgrounddesktop    =   '//*[@id="customize-control-responsive_bottom_row_background_desktop_color"]/label/div/div/button';
    public $botbackgroundtablet     =   '//*[@id="customize-control-responsive_bottom_row_background_tablet_color"]/label/div/div/button';
    public $botbackgroundmobile     =   '//*[@id="customize-control-responsive_bottom_row_background_mobile_color"]/label/div/div/button';

    public $backgrounddeskbot       =   '//*[@id="main-header"]/div/div[2]/div';
    public $backgroundtabbot        =   '//*[@id="main-header"]/div/div[2]/div';
    public $backgroundmobbot        =   '//*[@id="main-header"]/div/div[2]/div';
   
    public $botdeskcolor            =   '//*[@id="customize-control-responsive_bottom_row_background_desktop_color"]/label/div/div/div/div[2]/div/div/div[7]/button';
    public $bottabletcolor          =   '//*[@id="customize-control-responsive_bottom_row_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $botmobilecolor          =   '//*[@id="customize-control-responsive_bottom_row_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    
    public $botpaddingspan          =   '//*[@id="customize-control-responsive_bottom_row_padding"]/span/span';
    public $botpaddinglayoutdesktop =   '//*[@id="customize-control-responsive_bottom_row_padding"]/span/ul/li[1]/button';
    public $botpaddinglayouttablet  =   '//*[@id="customize-control-responsive_bottom_row_padding"]/span/ul/li[2]/button';
    public $botpaddinglayoutmobile  =   '//*[@id="customize-control-responsive_bottom_row_padding"]/span/ul/li[3]/button';
    public $botpaddingfielddesktop  =   '//*[@id="customize-control-responsive_bottom_row_padding"]/ul[1]/li[1]/input';
    public $botpaddingfieldtablet   =   '//*[@id="customize-control-responsive_bottom_row_padding"]/ul[2]/li[1]/input';
    public $botpaddingfieldmobile   =   '//*[@id="customize-control-responsive_bottom_row_padding"]/ul[3]/li[1]/input';



    
   
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
