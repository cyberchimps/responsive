<?php
namespace Page\RespTheme;

class TopRowComponents
{
    // include url of current page
    public static $URL = '';

    /**
     * General Settings
     */
    public $topRow = '//li[@id="accordion-section-responsive_customizer_header_top"]';
    public $minHeightInput = '(//input[@class="responsive-range-input"])[1]';
    public $minTabletHeight = '(//input[@class="responsive-range-input"])[2]';
    public $minHeightMobile = '(//input[@class="responsive-range-input"])[3]';

    /**
     * Desktop Settings
     */
    public $desktopLayoutSelect = '//li[@id="customize-control-responsive_header_top_layout"]//select';
    public $desktopLayout = 'option[value="fullwidth"]';
    public $tabletLayoutSelect = '//li[@id="customize-control-responsive_header_tablet_top_layout"]//select';
    public $tabletLayout = 'option[value="contained"]';

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
