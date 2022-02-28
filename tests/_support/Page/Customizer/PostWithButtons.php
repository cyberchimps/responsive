<?php
namespace Page\Customizer;

class PostWithButtons
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

    public $url                             = '/2018/11/03/block-button/';
    //public $button                          = '#post-1785 > div.post-entry > div.entry-content > div:nth-child(3)';
    public $button                          = '.wp-block-button.alignleft > a';
    //#post-1785 > div.post-entry > div.entry-content > div:nth-child(3)
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
