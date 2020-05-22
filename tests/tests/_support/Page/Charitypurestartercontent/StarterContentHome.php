<?php
namespace Page\Charitypurestartercontent;

class StarterContentHome
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
    public $navigation                                    = '#site-navigation';
    public $heroBGImage                                   = 'wp-content/themes/charitypure/assets/images/charity-bg.jpg';
    public $donateNowbutton                               = '#post-50 > div > div.wp-block-cover.alignfull.has-background-dim-60.has-background-dim > div > div.wp-block-columns > div:nth-child(1) > div > div > a';

    public $strings                                       = ['Home','Sample Page','WE LOVE WHAT WE DO','About Us','Animal','Education','Health','HOW COULD YOU HELP ?','Follow Us','Contact Us','Charity-Pure'];

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
