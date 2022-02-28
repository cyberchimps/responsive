<?php
namespace Page\RespTheme;

class Customizer
{
    // include url of current page
    public static $URL = '';

    /**
     * General Settings
     */
    public $url = '/wp-admin/customize.php';
    public $header = '//li[@id="accordion-panel-responsive_header"]';
    public $desktopTab = '//div[contains(@class, "responsive-build-tabs")]//a[1]';
    public $tabletMobileTab = '//div[contains(@class, "responsive-build-tabs")]//a[2]';
    public $hideControl = '//button[@class="collapse-sidebar button"]';
    public $showControl = '//button[@class="collapse-sidebar button"]';
    public $itemContainer = '(//button[@class="components-button responsive-builder-item-add-icon"])[5]';
    public $addItemButton = '(//span[@class="dashicon dashicons dashicons-plus"])[5]';
    public $mobileItemContainer = '(//button[@class="components-button responsive-builder-item-add-icon"])[20]';
    public $mobileAddItemButton = '(//span[@class="dashicon dashicons dashicons-plus"])[20]';
    public $previewIFrame = '//iframe[@title="Site Preview"]';
    public $desktopPreviewBtn = '//button[contains(@class, "preview-desktop")]';
    public $tabletPreviewBtn = '//button[contains(@class, "preview-tablet")]';
    public $mobilePreviewBtn = '//button[contains(@class, "preview-mobile")]';

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

    /**
     * This function opens default settings for given component
     */
    public function _openDefaultSettings($I, $view , $container, $addBtn, $item, $itemSettingBtn)
    {
        $I->amOnPage($this->url);
        $I->wait(3);
        $I->click($this->header);
        $I->wait(1);
        $I->click($view);
        $I->wait(1);
        $I->moveMouseOver($container);
        $I->wait(4);
        $I->click($addBtn);
        $I->wait(3);
        $I->click($item);
        $I->wait(2);
        $I->click($itemSettingBtn);
        $I->wait(2);
    }

    /**
     * This function removes item from customizer
     */
    public function _removeItem($I, $tab, $removeItemBtn)
    {
        $I->click($tab);
        $I->wait(1);
        $I->click($removeItemBtn);
    }

    /**
     * This functio opens updated settings to reset them to default
     */
    public function _openSettings($I, $view, $itemSettingBtn)
    {
        $I->amOnPage($this->url);
        $I->wait(3);
        $I->click($this->header);
        $I->wait(2);
        $I->click($view);
        $I->wait(2);
        $I->click($itemSettingBtn);
        $I->wait(1);
    }

    /**
     * This function open layout setting
     */
    public function _openLayout($I, $layout, $view)
    {
        $I->amOnPage($this->url);
        $I->wait(3);
        $I->click($this->header);
        $I->wait(2);
        $I->click($layout);
        $I->wait(2);
        $I->click($view);
        $I->wait(2);
    }
}
