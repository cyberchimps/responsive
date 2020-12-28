<?php
namespace Page\Acceptance;

class Home
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

    public $url = '/';
    public $sidebar = '#secondary';
    //public $sidebar = '//*[@id="secondary"]';

    public $sidebar_search          = '#search-2';
    public $sidebar_recentposts     = '#recent-posts-2';
    public $sidebar_recentcomments  = '#recent-comments-2';
    public $sidebar_archives        = '#archives-2';
    public $sidebar_categories      = '#categories-2';
    public $sidebar_meta            = '#meta-2';
    

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
