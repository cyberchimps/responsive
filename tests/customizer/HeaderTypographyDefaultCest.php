<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderTypographyDefaultCest
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
    	$I->amGoingTo('Check Default Header Typography without customizer');
    	$I->amOnPage($HomaPage->url);
    	$I->seeElement($HomaPage->header);

        $siteTitleFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Arial, Helvetica, sans-serif',$siteTitleFontFamily);

        $siteTitleFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('700',$siteTitleFontWeight);

        $siteTitleFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('normal',$siteTitleFontStyle);

        $siteTitleFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('20px',$siteTitleFontSize);

        $siteTitleLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('line-height');
        });
        $I->assertEquals('28px',$siteTitleLineHeight);
        //Site Tagline
        $siteTaglineFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-family');
        });
        $I->assertEquals('Arial, Helvetica, sans-serif',$siteTaglineFontFamily);

        $siteTaglineFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-weight');
        });
        $I->assertEquals('400',$siteTaglineFontWeight);

        $siteTaglineFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-style');
        });
        $I->assertEquals('normal',$siteTaglineFontStyle);

        $siteTaglineFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-size');
        });
        $I->assertEquals('13px',$siteTaglineFontSize);

        $siteTaglineLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('line-height');
        });
        $I->assertEquals('28px',$siteTaglineLineHeight);
    }
}
