<?php
namespace Page\RespTheme;

class HTMLComponents
{
    // include url of current page
    public static $URL = '';

    /**
     * General Settings
     */
    public $html = '//button[contains(@class, "components-button") and text()="HTML"]';
    public $htmlSettingBtn = '//button[@aria-label="Setting settings for HTML"]';
    public $removeHtmlSettings = '//button[@aria-label="Remove HTML"]';

    /**
     * Desktop Settings
     */
    public $htmlContentInput = '//textarea[@id="_customize-input-responsive_header_html_content"]';
    public $deafultContent = '<p>Enter HTML here!</p>';
    public $addContentCheckbox = '//input[@id="responsive_header_html_wpautop"]';
    public $fDefaultHTML = '//div[@class="header-html-inner"]//p';

    /**
     * Tablet Settings
     */
    public $mobileHtmlContentInput = '//textarea[@id="_customize-input-responsive_mobile_html_content"]';
    public $defaultMobileContent = '<p>Enter HTML here!</p>';
    public $mobileAddContentCheckbox = '//input[@id="responsive_mobile_html_wpautop"]';
    public $fDefaultMobileHTML = '//div[@class="mobile-html-inner"]';
    
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
