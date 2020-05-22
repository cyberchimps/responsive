<?php
namespace Page\Charitypurestartercontent;

class Customizer
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

    public $url                                                 = '/wp-admin/customize.php';
    public $hideCustomizer                                      = '.collapse-sidebar-label';
    public $unHideCustomizer                                    = '.collapse-sidebar-arrow';
    public $publishButton                                       = 'input[value="Publish"]';
    
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \CharitypurestartercontentTester;
     */
    protected $charitypurestartercontentTester;

    public function __construct(\CharitypurestartercontentTester $I)
    {
        $this->charitypurestartercontentTester = $I;
    }

}
