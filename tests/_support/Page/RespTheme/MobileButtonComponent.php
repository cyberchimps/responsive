<?php
namespace Page\RespTheme;

class MobileButtonComponent
{
    // include url of current page
    public static $URL = '';
    /**
     * general settings
     */
    public $url = '//*[@id="wp-admin-bar-customize"]/a';
    public $header = '//*[@id="accordion-panel-responsive_header"]/h3';
    public $mobileButton = '//*[@id="accordion-section-responsive_customizer_mobile_button"]/h3';
    public $mobileView = '//*[@id="customize-footer-actions"]/div/div/button[3]';
    public $publishButton = '//*[@id="save"]';
    public $tabletrow = '//*[@id="mobile-header"]/div/div/div/div[1]';
    public $mobilerow = '//*[@id="mobile-header"]/div/div/div/div[1]';
    public $button = '//*[@id="mobile-header"]/div/div/div/div/div/div/div/div[1]/div/div/div/a';
    public $buttonLabel = '//*[@id="_customize-input-responsive_mobile_button_label"]';
    public $buttonUrl = '//*[@id="_customize-input-responsive_mobile_button_link"]';
    public $newTab = '//*[@id="responsive_mobile_button_target"]';
    public $linkNotToFollow = '//*[@id="responsive_mobile_button_nofollow"]';
    public $attributeSponsored = '//*[@id="responsive_mobile_button_sponsored"]';
    public $linktoDownload = '//*[@id="responsive_mobile_button_download"]';
    /**
     * button size,width and visibility settings
     */
    public $buttonSize = '//*[@id="customize-control-responsive_mobile_button_size"]/select';
    public $buttonStyle = '//*[@id="customize-control-responsive_mobile_button_style"]/select';
    public $buttonVisibility = '//*[@id="customize-control-responsive_mobile_button_visibility"]/select';

    /**
     * border style settings
     */
    public $borderStyle = '//*[@id="customize-control-responsive_mobile_button_border_style"]/select';
    public $borderWidth = '//*[@id="customize-control-responsive_mobile_button_border_size"]/label/div/input[2]';
    public $borderRadius = '//*[@id="customize-control-responsive_mobile_button_border_radius"]/label/div/input[2]';
    /**
     * color settings
     */
    public $selectButtonColor = '//*[@id="customize-control-responsive_mobile_button_color"]/label/div/div/button/span';
    public $buttonColor = '//*[@id="customize-control-responsive_mobile_button_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $selectButtonFocusColor = '//*[@id="customize-control-responsive_mobile_button_hover_color"]/label/div/div/button/span';
    public $buttonFocusColor = '//*[@id="customize-control-responsive_mobile_button_hover_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $selectButtonBgColor = '//*[@id="customize-control-responsive_mobile_button_background_color"]/label/div/div/button/span';
    public $buttonBgColor = '//*[@id="customize-control-responsive_mobile_button_background_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $selectButtonBgFocusColor = '//*[@id="customize-control-responsive_mobile_button_background_hover_color"]/label/div/div/button/span';
    public $buttonBgFocusColor = '//*[@id="customize-control-responsive_mobile_button_background_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $selectButtonBorderColor = '//*[@id="customize-control-responsive_mobile_button_border_color"]/label/div/div/button/span';
    public $buttonBorderColor = '//*[@id="customize-control-responsive_mobile_button_border_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $selectButtonBorderFocusColor = '//*[@id="customize-control-responsive_mobile_button_border_hover_color"]/label/div/div/button/span';
    public $buttonBorderFocusColor = '//*[@id="customize-control-responsive_mobile_button_border_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    /**
     * typography settings
     */
    public $fontFamily = '//*[@id="customize-control-mobile_header_button_typography-font-family"]/label/select';
    public $fontWeight = '//*[@id="customize-control-mobile_header_button_typography-font-weight"]/label/select';
    public $fontStyle = '//*[@id="customize-control-mobile_header_button_typography-font-style"]/select';
    public $textTransform = '//*[@id="customize-control-mobile_header_button_typography-text-transform"]/select';
    public $fontSize = '//*[@id="customize-control-mobile_header_button_typography-font-size"]/div[3]/input';
    public $lineHeight = '//*[@id="customize-control-mobile_header_button_typography-line-height"]/label/div/input[2]';
    public $letterSpacing = '//*[@id="customize-control-mobile_header_button_typography-letter-spacing"]/label/div/input[2]';
    public $mobile ='//*[@id="customize-control-mobile_header_button_typography-font-size"]/span/ul/li[3]/button/i';
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
