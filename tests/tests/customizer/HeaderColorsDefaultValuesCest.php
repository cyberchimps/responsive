<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderColorsDefaultValuesCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check default class without customizer
    	$I->amGoingTo('Check Default Header Colors without customizer');
    	$I->amOnPage($HomePage->url);
    	$I->seeElement($HomePage->header);
        $headerBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            $selector = '#masthead';
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$headerBGColor);

        $headerBorderColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(234, 234, 234, 1)',$headerBorderColor);

        $siteTitleColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$siteTitleColor);

        //$siteTitleHoverColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //    return $webdriver->findElement(WebDriverBy::cssSelector('.site-title'))->getCSSValue('color:hover');
        //});
        //$I->assertEquals('rgba(00, 66, CC, 1)',$siteTitleHoverColor);

        $siteTaglineColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(153, 153, 153, 1)',$siteTaglineColor);



        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_colors);
        $I->wait(1);
        //Check default customizer values
        $I->amGoingTo('Check Default Colors within customizer');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
                $I->amGoingTo('Check Default Header Colors without customizer');
        $I->expectTo('See Default Header Color as rgba(255, 255, 255, 1)');
        $I->amOnPage($HomePage->url);
        $I->seeElement($HomePage->header);
        $headerBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$headerBGColor);

        $headerBorderColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(234, 234, 234, 1)',$headerBorderColor);

        $siteTitleColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$siteTitleColor);

        $siteTaglineColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(153, 153, 153, 1)',$siteTaglineColor);

    }
}
