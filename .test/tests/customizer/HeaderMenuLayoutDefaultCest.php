<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderMenuLayoutDefaultCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

        //Check default Mobile Menu without customizer
        $I->amGoingTo('Check Default Mobile Menu without customizer');
        $I->amOnPage($HomaPage->url);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        //$I->seeElement($HomaPage->menuToggleButton);
        $menuToggleButtonDisplay = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('display');
        });
        $I->assertEquals('block',$menuToggleButtonDisplay);
        $I->resizeWindow(1280, 800);
        $I->wait(1);

        //Check default values within customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_layout);
        $I->wait(1);
        $I->amGoingTo('Check Default header Menu Layout within customizer');
        $I->seeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuBreakpoint);
        $I->seeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuStyle);
        
        $I->click($CustomizerPage->hideCustomizer);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $menuToggleButtonDisplay = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('display');
        });
        $I->assertEquals('block',$menuToggleButtonDisplay);
        $I->resizeWindow(1280, 800);
        $I->switchToIFrame();
        $I->wait(1);
        $I->click($CustomizerPage->UnhideCustomizer);
        $I->wait(1);
    }
}
