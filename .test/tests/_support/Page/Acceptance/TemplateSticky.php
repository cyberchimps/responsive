<?php
namespace Page\Acceptance;

class TemplateSticky
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
    public $url             = '/2012/01/07/template-sticky/';
    public $stickyTitle     = '#post-1241 > div.post-entry > h1';
    public $stickyText      = '#post-1241 > div.post-entry > div.entry-content > p:nth-child(1)';
    
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
