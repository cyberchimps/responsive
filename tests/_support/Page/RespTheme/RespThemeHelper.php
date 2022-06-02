<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class RespThemeHelper
{
    // include url of current page
    public static $URL = '';

    // include selectors to pen header settings
    public $publishBtn = '//div[@id="customize-save-button-wrapper"]';
    public $item = '';
    public $selectItems = '';

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
     * This function select a single opton from a dropdown
     */
    public function _selectItem($I, $selectItems, $item)
    {
        $this->selectItems = $selectItems;
        $this->item = $item;
        $item = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::xpath($this->selectItems))->
            findElement( WebDriverBy::cssSelector($this->item) )->click();
        });
    }

    /**
     * This function scroll to the required selector
     */
    public function _scrollTo($I, $selector)
    {
        $this->field = $selector;
        $field = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::xpath($this->field))->getLocationOnScreenOnceScrolledIntoView();
        });
        $I->wait(2);
    }

    /**
     * This function sets given value for given field
     */
    public function _setInput($I, $inputField, $value)
    {
        $I->click($inputField);
        $I->clearField($inputField);
        $I->fillField($inputField, $value);
    }

     /**
     * This function checks style in the frontend
     */
    public function _checkStyle($I, $field, $prop, $getSelectorBy, $expectedStyle)
    {
        $this->field = $field;
        $this->prop = $prop;
        $actualStyle = '';
        if($getSelectorBy == 'css')
        {
            $actualStyle = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
                return $webdriver->findElement(WebDriverBy::cssSelector($this->field))->getCSSValue($this->prop);
            });
        }
        else {
            $actualStyle = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
                return $webdriver->findElement(WebDriverBy::xpath($this->field))->getCSSValue($this->prop);
            });
        }
        $I->assertEquals($expectedStyle, $actualStyle);
    }

    /**
     * This function sets given color for given field
     */
    public function _setColor($I, $colorBtn, $colorInput, $color)
    {
        $this->field = $colorInput;
        $I->click($colorBtn);
        $I->wait(1);
        $I->click($colorInput);
        $I->wait(1);
        $field= $I->executeInSelenium(function(RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::xpath($this->field));
        });
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $field->sendKeys(WebDriverKeys::BACKSPACE);
        $I->wait(1);
        $I->fillField($colorInput, $color);
        $I->wait(2);
        $I->click($colorBtn);
        $I->wait(2);
    }

    /**
     * This function sets given color for given field
     */
    public function _resetColor($I, $resetBtn, $colorBtn)
    {
        $I->click($colorBtn);
        $I->wait(1);
        $I->click($resetBtn);
        $I->wait(1);
        $I->click($colorBtn);
        $I->wait(2);
    }
}
