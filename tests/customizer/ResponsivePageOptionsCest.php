<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Samplepage;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class ResponsivePageOptionsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Samplepage $SamplePage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	$I->amOnPage($SamplePage->url);
    	$I->click($SamplePage->editPage);
    	$I->click($SamplePage->popUpCloseButton);
    	$I->see('Responsive Page Options');
    	$I->selectOption($SamplePage->pageSidebarPosition,'left');
		$I->selectOption($SamplePage->pageLayoutStyle,'flat');
		$I->fillField($SamplePage->pageContentWidth,40);
		$I->click($SamplePage->publishButton);
		$I->wait(5);
		$I->amOnPage('/sample-page');

		$mainWidth = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
        });
        $sidebarWidth = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
        });
        $I->assertGreaterThan($mainWidth,$sidebarWidth);
    }
}