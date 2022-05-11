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

    public $url                     = '/';
    public $sidebar                 = '#secondary';
    //public $sidebar = '//*[@id="secondary"]';
    
    public $footercredits           = '.footer-layouts.copyright';
    public $footercreditslink       = '.footer-layouts.copyright >a';

    public $sidebar_search          = '#search-2';
    public $sidebar_search_textbox  = '#s';
    #public $sidebar_search_textbox  = '#s';
    public $sidebar_search_submit   = '#searchsubmit';
    public $sidebar_recentposts     = '#recent-posts-2';
    public $sidebar_recentcomments  = '#recent-comments-2';
    public $sidebar_archives        = '#archives-2';
    public $sidebar_categories      = '#categories-2';
    public $sidebar_meta            = '#meta-2';

    public $sticky                  = '.sticky';
    public $stickyPost              = '#post-1241 > div.post-entry > h2 > a';
    public $stickyPostReadMore      = '#post-1241 > div.post-entry > div.entry-content > p.read-more > a';
    
    public $navlinks                = '.nav-links';
    public $nav2                    = '#primary > div > nav > div > a:nth-child(2)';
    public $nav3                    = '#primary > div > nav > div > a:nth-child(3)';
    
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
