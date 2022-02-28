<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderMenuTypographyDefaultValuesCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check default values without customizer
        //Site Title
    	$I->amGoingTo('Check Default Header Menu Typography Values without customizer');
    	$I->amOnPage($HomaPage->url);
    	$I->seeElement($HomaPage->menuItems);

        $menuItemsFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Arial, Helvetica, sans-serif',$menuItemsFontFamily);

        $menuItemsFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('400',$menuItemsFontWeight);

        $menuItemsFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('normal',$menuItemsFontStyle);

        $menuItemsFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('16px',$menuItemsFontSize);

        $menuItemsLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('line-height');
        });
        $I->assertEquals('28px',$menuItemsLineHeight);
    }
}
