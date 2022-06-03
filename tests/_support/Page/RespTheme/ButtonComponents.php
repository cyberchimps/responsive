<?php
namespace Page\RespTheme;

class ButtonComponents
{
    // include url of current page
    public static $URL = '';

    /**
     * General Components
     */
    public $button                  = '//button[contains(@class, "components-button") and text()="Button"]';
    public $removeButtonBtn         = '//button[@aria-label="Remove Button"]';

    /**
     * Default Settings
     */
    public $buttonLabelInput        = '//input[@id="_customize-input-responsive_header_button_label"]';
    public $defaultLabel            = 'Search';
    public $buttonUrlInput          = '//input[@id="_customize-input-responsive_header_button_link"]';
    public $defaultUrl              = '';
    public $buttonSizeSelect        = '//li[@id="customize-control-responsive_header_button_size"]//select';
    public $defaultButtonSize       = 'option[value="medium"]';
    public $buttonStyleSelect       = '//li[@id="customize-control-responsive_header_button_style"]//select';
    public $defaultButtonStyle      = 'option[value="filled"]';
    public $buttonVisibilitySelect  = '//li[@id="customize-control-responsive_header_button_visibility"]//select';
    public $defaultButtonVisibility = 'option[value="everyone"]';
    public $newTabCheck             = '//input[@id="responsive_header_button_target"]';
    public $noFollowCheck           = '//input[@id="responsive_header_button_nofollow"]';
    public $linkAtrributeCheck      = '//input[@id="responsive_header_button_sponsored"]';
    public $linkDownloadCheck       = '//input[@id="responsive_header_button_download"]';

    /**
     * Button desktop settings
     */
    public $buttonSettingBtn        = '//button[@aria-label="Setting settings for Button"]';
    public $desktopButtonLabel      = 'Find';
    public $desktopButtonUrl        = 'https://www.google.com';
    public $desktopButtonSize       = 'option[value="small"]';
    public $desktopButtonStyle      = 'option[value="outline"]';
    public $desktopButtonVisibility = 'option[value="loggedin"]';

    /**
     * Button mobile settings
     */
    public $defaultMobileBtnLabel = 'Search';
    public $defaultMobileBtnLink = '';
    public $defaultMobileBtnSize = 'option[value="medium"]';
    public $defaultMobileBtnStyle = 'option[value="filled"]';
    public $defaultMobileBtnVisibility = 'option[value="everyone"]';
    public $mobileBtnLabelInput = '//input[@id="_customize-input-responsive_mobile_button_label"]';
    public $mobileBtnLabel = 'Click Here';
    public $mobileBtnLinkInput = '//input[@id="_customize-input-responsive_mobile_button_link"]';
    public $mobileBtnLink = 'https://www.cyberchimps.com';
    public $mobileOpenInNewTabCheck = '//input[@id="responsive_mobile_button_target"]';
    public $mobileNoFollowCheck = '//input[@id="responsive_mobile_button_nofollow"]';
    public $mobileLinkAttributeCheck = '//input[@id="responsive_mobile_button_sponsored"]';
    public $mobileLinkDownloadCheck = '//input[@id="responsive_mobile_button_download"]';
    public $mobileBtnSizeSelect = '//li[@id="customize-control-responsive_mobile_button_size"]//select';
    public $mobileBtnSize = 'option[value="large"]';
    public $mobileBtnStyleSelect = '//li[@id="customize-control-responsive_mobile_button_style"]//select';
    public $mobileBtnStyle = 'option[value="outline"]';
    public $mobileBtnVisibilitySelect = '//li[@id="customize-control-responsive_mobile_button_visibility"]//select';
    public $mobileBtnVisibility = 'option[value="everyone"]';

    /**
     * Desktop preview items
     */
    public $previewIFrame = '//iframe[@title="Site Preview"]';
    public $fButton = '//a[@target="_blank" and @rel="noopener noreferrer nofollow" and text()="Find"]';
    public $fSmallSizeOutlineStyleButton = 'a.button-size-small.button-style-outline';
    public $fDefaultButton = '//a[@target="_self" and text()="Search"]';
    public $fMediumSizeFilledStyleButton = 'a.button-size-medium.button-style-filled';

    /**
     * Tablet preview items
     */
    public $fMobileBtn = '//a[@target="_blank" and @rel="noopener noreferrer nofollow sponsored" and text()="Click Here"]';
    public $fMobileLargeSizeOutlineStyleButton = 'a.button-size-large.button-style-outline';
    
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
