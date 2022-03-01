<?php
namespace Page\Acceptance;

class PostFormatImageAttached
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
    public $url             = '/2010/08/08/post-format-image/';
    public $content         = '#primary';
    public $sidebar         = '#secondary';
    public $image           = '#post-1158 > div.post-entry > div.entry-content > p:nth-child(3) > a > img';
    
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
