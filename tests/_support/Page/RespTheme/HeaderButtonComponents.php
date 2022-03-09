<?php
namespace Page\RespTheme;

class HeaderButtonComponents
{
    // include url of current page
    public static $URL = '';

    //general
    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $headerButtonSection     =   '//*[@id="accordion-section-responsive_customizer_header_button"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $tabletLayout            =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobileLayout            =   '//*[@id="customize-footer-actions"]/div/div/button[3]';

    public $buttonLabel             =   '//*[@id="_customize-input-responsive_header_button_label"]';
    public $buttonUrl               =   '//*[@id="_customize-input-responsive_header_button_link"]';
    public $headerButtonSize        =   '//*[@id="customize-control-responsive_header_button_size"]/select';
    public $headerButtonStyle       =   '//*[@id="customize-control-responsive_header_button_style"]/select';
    public $headerButtonVisibility  =   '//*[@id="customize-control-responsive_header_button_visibility"]/select';
    public $buttonBorderStyle       =   '//*[@id="customize-control-responsive_header_button_border_style"]/select';
    public $buttonBorderWidth       =   '//*[@id="customize-control-responsive_header_button_border_size"]/label/div/input[2]';
    public $buttonBorderRadius      =   '//*[@id="customize-control-responsive_header_button_border_radius"]/label/div/input[2]';
    public $buttonColor             =   '//*[@id="customize-control-responsive_header_button_color"]/label/div/div/button';
    public $buttonColor2            =   '//*[@id="customize-control-responsive_header_button_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $buttonHoverColor        =   '//*[@id="customize-control-responsive_header_button_hover_color"]/label/div/div/button';
    public $buttonHoverColor1       =   '//*[@id="customize-control-responsive_header_button_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $buttonBackgroundColor   =   '//*[@id="customize-control-responsive_header_button_background_color"]/label/div/div/button';
    public $buttonBackgroundColor3  =   '//*[@id="customize-control-responsive_header_button_background_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $backgroundHoverColor    =   '//*[@id="customize-control-responsive_header_button_background_hover_color"]/label/div/div/button';
    public $backgroundHoverColor2   =   '//*[@id="customize-control-responsive_header_button_background_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $buttonBorderColor       =   '//*[@id="customize-control-responsive_header_button_border_color"]/label/div/div/button';
    public $buttonBorderColor1      =   '//*[@id="customize-control-responsive_header_button_border_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $buttonBorderHoverColor  =   '//*[@id="customize-control-responsive_header_button_border_hover_color"]/label/div/div/button';
    public $buttonBorderHoverColor6 =   '//*[@id="customize-control-responsive_header_button_border_hover_color"]/label/div/div/div/div[2]/div/div/div[6]/button';

    public $fontFamily              =   '//*[@id="customize-control-header_button_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-header_button_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-header_button_typography-font-style"]/select';
    public $textTransform           =   '//*[@id="customize-control-header_button_typography-text-transform"]/select';
    public $lineHeight              =   '//*[@id="customize-control-header_button_typography-line-height"]/label/div/input[2]';
    public $lineSpacing             =   '//*[@id="customize-control-header_button_typography-letter-spacing"]/label/div/input[2]';
    public $fontSize                =   '//*[@id="customize-control-header_button_typography-font-size"]/div[1]/input';

    //frontend
    public $button                  =   '//*[@id="main-header"]/div/div[2]/div/div/div/div[1]/div[2]/div/div/a';
    public $buttonOnTablet          =   '//*[@id="mobile-header"]/div/div[2]/div/div/div/div[1]/div/div/div/a';
    

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
