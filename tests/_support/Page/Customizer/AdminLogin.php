<?php
namespace Page\Customizer;

class AdminLogin
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
    public $url             = '/wp-admin';
    public $username        = '#user_login';
    public $password        = '#user_pass';
    public $loginButton     = '#wp-submit';

    public function adminLogin($I){
        $I->amOnPage($this->url);
        $I->fillField($this->username,'your_username');
        $I->fillField($this->password,'your_password');
        $I->click($this->loginButton);
    }
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
