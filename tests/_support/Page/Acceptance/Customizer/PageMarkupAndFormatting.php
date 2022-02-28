<?php
namespace Page\Customizer;

class PageMarkupAndFormatting
{
    // include url of current page
    public static $URL = '';

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

    public $url                             = '/about/page-markup-and-formatting/';
    public $customizeLink                   = '#wp-admin-bar-customize > a';
    
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \CustomizerTester;
     */
    protected $customizerTester;

    public function __construct(\CustomizerTester $I)
    {
        $this->customizerTester = $I;
    }

}
