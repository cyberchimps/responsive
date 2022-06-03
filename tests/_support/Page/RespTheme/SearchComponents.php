<?php
namespace Page\RespTheme;

class SearchComponents
{
    // include url of current page
    public static $URL = '';

    /**
     * General Settings
     */
    public $search = '//button[contains(@class, "components-button") and text()="Search"]';
    public $searchSettingBtn = '//button[@aria-label="Setting settings for Search"]';
    public $fDefaultButton = '//button[@aria-label="View Search Form"]';
    public $removeSearchSettings = '//button[@aria-label="Remove Search"]';

    /**
     * Desktop Settings
     */
    public $searchStyleSelect = '//li[@id="customize-control-responsive_header_search_style"]//select';
    public $defaultSearchStyle = 'option[value="default"]';
    public $desktopSearchStyle = 'option[value="bordered"]';
    public $labelInput = '//input[@id="_customize-input-responsive_header_search_label"]';
    public $defaultLabel = 'Search';
    public $desktopLabelVisibilityCheck = '//input[@id="responsive_header_search_label_visiblity_desktop"]';
    public $tabletLabelVisibilityCheck = '//input[@id="responsive_header_search_label_visiblity_tablet"]';
    public $mobileLabelVisibilityCheck = '//input[@id="responsive_header_search_label_visiblity_mobile"]';
    public $searchIconSelect = '//li[@id="customize-control-responsive_header_search_icon"]//select';
    public $defaultSearchIcon = 'option[value="search"]';
    public $desktopSearchIcon = 'option[value="search2"]';
    public $fSearchIcon = '(//span[@class="responsive-svg-iconset"])[1]';
    public $fSearchLabel = '//span[contains(@class, "search-toggle-label") and text()="Find"]';
    public $outlinesSearch = 'button.search-toggle-style-bordered';

    /**
     * Mobile Settings
     */

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
