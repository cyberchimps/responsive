<?php
namespace Page\RespTheme;

class Customize
{
    // include url of current page
    public static $URL = '';

    /**
     *general settings
     */
     public $url = '//*[@id="wp-admin-bar-customize"]/a';
     public $header = '//*[@id="accordion-panel-responsive_header"]/h3';
     
     //Public $mainRowButton = '//*[@id="accordion-section-responsive_customizer_header_main"]'

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

    /**public function _openDefaultSettings($I, $url, $header)
    {
        $I->amOnPage($this->url);
        $I->wait(3);
        $I->click($this->header);
        $I->wait(1);
        /**$I->click($view);
        $I->wait(1);
        $I->moveMouseOver($container);
        $I->wait(4);
        $I->click($addBtn);
        $I->wait(3);
        $I->click($item);
        $I->wait(2);
        $I->click($itemSettingBtn);
        $I->wait(2);*/
    

}
