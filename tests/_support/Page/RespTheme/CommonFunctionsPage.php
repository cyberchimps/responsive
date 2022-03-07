<?php
namespace Page\RespTheme;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class CommonFunctionsPage
{
    // include url of current page
    public static $URL = '';

    /**
     * Common variables among all tests
     */
    //public $topcolordesk            =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div'; 
    public $tablethttop = '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div';
    public $desktophttop = '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div';
    public $mobilehttop = '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div';
    public $backgroundtabtop = '//*[@id="main-header"]/div/div[1]/div/div[1]/div';
    public $backgroundmobtop = '//*[@id="main-header"]/div/div[1]/div/div[1]/div';
    public $backgrounddesktop = '//*[@id="main-header"]/div/div[1]/div/div[1]/div';   

    public $backgrounddeskbot       =   '//*[@id="main-header"]/div/div[2]/div';
    public $backgroundtabbot        =   '//*[@id="main-header"]/div/div[2]/div';
    public $backgroundmobbot        =   '//*[@id="main-header"]/div/div[2]/div';

    public $botminhtdeskelement     =   '//*[@id="main-header"]/div/div[2]/div/div/div';  
    public $botminhttabelement      =   '//*[@id="main-header"]/div/div[2]/div/div/div';
    public $botminhtmobelement      =   '//*[@id="main-header"]/div/div[2]/div/div/div';

    public $field = '//*[@id="main-header"]/div/div[1]/div/div[1]/div';
    public $prop = 'background';
    public $editBlockBtn = '//*[text()="Edit Page"]';
    public $editWithElementorBtn = '#wp-admin-bar-elementor_edit_page';
    public $widgetSearchInput = '//input[@id="elementor-panel-elements-search-input"]';
    public $widget = '//div[@class="elementor-element-wrapper"]';
    public $dragEle = 'div.elementor-element';
    public $dropArea = '(//div[@class="elementor-add-section-inner"])[1]';
    public $closeDialogBtn = 'button[aria-label="Close dialog"]';
    public $publishBtn = '//button[@id="elementor-panel-saver-button-publish"]';
    public $tools = '//li[@id="menu-tools"]';
    public $importBtn = '//*[text()="Import"]';
    public $runImporterBtn = '//a[@aria-label="Run WordPress"]';
    public $uploadBtn = '//input[@id="upload"]';
    public $importFileBtn = '//*[@value="Upload file and import"]';
    public $importAttachmentsCheck = '//input[@id="import-attachments"]';
    public $submitBtn = '//input[@value="Submit"]';
    public $selectAllPages = '//input[@id="cb-select-all-1"]';
    public $applyBtn = '(//input[@value="Apply"])[2]';
    public $trashBtn = '//li[@class="trash"]'; 
    public $blockIframe = '#elementor-preview-iframe';
    public $blockContainer = '(//div[contains(@class," elementor-widget ")])[1]';
    public $updateBtn = '#elementor-panel-saver-button-publish';
    public $selectItems = '';
    public $item = '';
    public $classname = '';
    public $mediaLibraryBtn = '//button[@id="menu-item-browse"]';
    public $mediaImage1 = '(//ul[contains(@id, "__attachments-view")]//li)[1]';
    public $mediaImage2 = '(//ul[contains(@id, "__attachments-view")]//li)[2]';
    public $insertMediaBtn = '//button[contains(@class, "media-button-select")]';
    public $horizontalInput = '//input[@data-setting="horizontal"]';
    public $verticalInput = '//input[@data-setting="vertical"]';
    public $blurInput = '//input[@data-setting="blur"]';
    public $spreadInput = '//input[@data-setting="spread"]';
    public $desktopView = '(//a[@data-device="desktop"])[1]//i';
    public $mobileView = '(//a[@data-device="mobile"])[1]//i';
    public $mobileViewInMobile = '(//a[@data-device="mobile"])[3]//i';
    public $tabletView = '(//a[@data-device="tablet"])[3]//i';
    public $tabletViewInTablet = '(//a[@data-device="tablet"])[2]//i';
    public $resetDeskView = '(//a[@data-device="desktop"])[2]//i';
    
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
     * This function opens elementor editor
     */
    public function _openElementorEditor($I)
    {
        $I->wait(1);
        $I->click($this->editWithElementorBtn);
        $I->wait(10);
    }

    /**
     * This function switches back to parent window and see common panel
     */
    public function _seeCommonPanel($I)
    {
        $I->switchToIFrame();
        $I->wait(1);
        $I->see('Content');
        $I->see('Style');
        $I->see('Advanced');
    }

    /**
     * This function checks style in frontend.
     */
    public function _checkFrontEndStyle($I, $expectedStyle) {
        $actualStyle = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector($this->field))->getCSSValue($this->prop);
        });
        $I->assertEquals($expectedStyle, $actualStyle);
    }

    /**
     * This function checks style in frontend by xpath.
     */
    public function _checkFrontEndStyleByXpath($I, $expectedStyle) {
        $actualStyle = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::xpath($this->field))->getCSSValue($this->prop);
        });
        $I->assertEquals($expectedStyle, $actualStyle);
    }

    /**
     * This function imports all pages
     */
    public function _importPages($I, $filename)
    {
        $I->click($this->tools);
        $I->click($this->importBtn);
        $I->scrollTo($this->runImporterBtn, 20);
        $I->wait(1);
        $I->click($this->runImporterBtn);
        $I->wait(1);
        $I->attachFile($this->uploadBtn, $filename);
        $I->wait(1);
        $I->click($this->importFileBtn);
        $I->wait(1);
        $I->click($this->importAttachmentsCheck);
        $I->click($this->submitBtn);
        $I->wait(1);

    }

    /**
     * This function removes all pages 
     */
    public function _removePages($I)
    {
        $I->amOnPage('/wp-admin/edit.php?post_type=page');
        $I->wait(1);
        $I->click($this->selectAllPages);
        $I->selectOption('Select bulk action', 'Move to Trash');
        $I->wait(1);
        $I->click($this->applyBtn);
        $I->wait(2);
        $I->click($this->trashBtn);
        $I->wait(1);
        $I->click($this->selectAllPages);
        $I->selectOption('Select bulk action', 'Delete permanently');
        $I->wait(1);
        $I->click($this->applyBtn);
    }

    
    /**
     * This function removes all posts 
     */
    public function _removePosts($I)
    {
        $I->amOnPage('/wp-admin/edit.php');
        $I->wait(1);
        $I->click($this->selectAllPages);
        $I->selectOption('Select bulk action', 'Move to Trash');
        $I->wait(1);
        $I->click($this->applyBtn);
        $I->wait(2);
        $I->click($this->trashBtn);
        $I->wait(1);
        $I->click($this->selectAllPages);
        $I->selectOption('Select bulk action', 'Delete permanently');
        $I->wait(1);
        $I->click($this->applyBtn);
    }

    /**
     * This function removes all the other imports 
     */
    public function _removeImports($I)
    {
        $I->wait(1);
        $I->click($this->selectAllPages);
        $I->selectOption('Select bulk action', 'Move to Trash');
        $I->wait(1);
        $I->click($this->applyBtn);
        $I->wait(2);
        $I->click($this->trashBtn);
        $I->wait(1);
        $I->click($this->selectAllPages);
        $I->selectOption('Select bulk action', 'Delete permanently');
        $I->wait(1);
        $I->click($this->applyBtn);
    }

    /**
     * This function opens common widget panel
     */
    public function _clickWiget($I)
    {
        $I->switchToIFrame($this->blockIframe);
        $I->click($this->blockContainer);
        $I->wait(1);
        $this->_seeCommonPanel($I);
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
     * This function sets given color for given field
     */
    public function _setColor($I, $colorBtn, $colorInput, $color)
    {
        $I->click($colorBtn);
        $I->wait(2);
        $I->fillField($colorInput, $color);
        $I->wait(2);
        $I->click($colorBtn);
        $I->wait(2);
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
        $I->wait(2);
    }

    /**
     * This function update the settings and opens frontend to view the updates
     */
    public function _updateAndView($I, $page)
    {
        $I->wait(1);
        $I->click($this->updateBtn);
        $I->wait(3);
        $I->openNewTab();
        $I->amOnPage($page);
        $I->wait(2);
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
     * This function selects the image
     */
    public function _setImage($I, $previewSelector, $img)
    {
        $I->wait(1);
        $I->click($previewSelector);
        $I->wait(3);
        $I->click($this->mediaLibraryBtn);
        $I->wait(3);
        $I->click($img);
        $I->wait(1);
        $I->click($this->insertMediaBtn);
        $I->wait(1);
    }

    /**
     * This function changes the view
     */
    public function _changeView($I, $from, $to)
    {
        $this->_scrollTo($I, $from);
        $I->click($from);
        $I->wait(1);
        $I->click($to);
        $I->wait(1);
    }

    /**
     * This function set icon 
     */
    public function _setIcon($I, $selectIconBtn, $icon, $insertIconBtn)
    {
        $I->click($selectIconBtn);
        $I->wait(3);
        $I->click($icon);
        $I->wait(1);
        $I->click($insertIconBtn);
        $I->wait(1);
    }

    /**
     * This function sets property value for different views
     */
    public function _setPropertyForDifferentViews($I, $deskInput, $mobInput, $tabInput, $value)
    {
        $this->_setInput($I, $deskInput, $value[0]);
        $I->click($this->desktopView);
        $I->wait(1);
        $I->click($this->mobileView);
        $I->wait(1);
        $this->_setInput($I, $mobInput, $value[1]);
        $I->wait(1);
        $I->click($this->mobileViewInMobile);
        $I->wait(1);
        $I->click($this->tabletView);
        $I->wait(1);
        $this->_setInput($I, $tabInput, $value[2]);
        $I->wait(1);
        $I->click($this->tabletViewInTablet);
        $I->wait(1);
        $I->click($this->resetDeskView);
        $I->wait(1);
    }

    /**
     * This function counts the Item numbers based on their class name
     */
    public function _countItems($I, $classname, $expectedCount)
    {
        $this->classname = $classname;
        $actualCount = $I->executeInSelenium(function(RemoteWebDriver $webdriver){
            return $webdriver->findElements(WebDriverBy::className($this->classname));
        }); 
        $I->assertCount($expectedCount, $actualCount);
        $I->wait(1);
    }

    /**
     * This function check the attribute value in all views
     */
    public function _checkStyleInViews($I, $selector, $property, $values)
    {
        $I->resizeWindow(360, 640);
        $I->wait(1);
        $this->_checkStyle($I, $selector, $property, 'xpath', $values[0]);
        $I->resizeWindow(950, 1024); 
        $I->wait(1);
        $this->_checkStyle($I, $selector, $property, 'xpath', $values[1]);
        $I->resizeWindow(1280, 950);
        $I->wait(1);
        $this->_checkStyle($I, $selector, $property, 'xpath', $values[2]);
        $I->wait(1);
    }

    /**
     * This function changes view and set new value
     */
    public function _changeViewAndSetInput($I, $currentView, $newView, $selector, $value)
    {
        $I->wait(1);
        $I->click($currentView);
        $I->wait(1);
        $I->click($newView);
        $I->wait(1);
        $this->_setInput($I, $selector, $value);
        $I->wait(1);
    }
}
