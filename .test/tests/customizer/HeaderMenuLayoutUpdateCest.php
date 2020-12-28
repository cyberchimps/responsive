<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderMenuLayoutUpdateCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
        $I->amGoingTo('Login as Admin');
        $AdminLoginPage->adminLogin($I);

        //Disable mobile menu customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_layout);
        $I->wait(1);
        $I->amGoingTo('Disable Mobile Menu within customizer');
        $I->seeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuBreakpoint);
        $I->seeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuStyle);
        $I->click($CustomizerPage->customizer_headermenu_layout_EnableDisableMobileMenuLabel);
        $I->wait(5);
        $I->dontSeeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuBreakpoint);
        $I->dontSeeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuStyle);
        $I->click($CustomizerPage->hideCustomizer);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        //Check updated layout within customizer
        $I->amGoingTo('Check Disabled Mobile Menu within customizer');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $menuToggleButtonDisplay = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('display');
        });
        $I->assertEquals('none',$menuToggleButtonDisplay);
        $I->resizeWindow(1280, 800);
        $I->switchToIFrame();
        $I->wait(1);
        $I->click($CustomizerPage->UnhideCustomizer);
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(1);

        //Check updated header menu layout without customizer
        $I->amOnPage($HomaPage->url);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $menuToggleButtonDisplay = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('display');
        });
        $I->assertEquals('none',$menuToggleButtonDisplay);
        $I->resizeWindow(1280, 800);
        $I->wait(1);

        //Revert Mobile Menu in customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_layout);
        $I->wait(1);
        $I->amGoingTo('Revert Mobile Menu within customizer');
        $I->dontSeeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuBreakpoint);
        $I->dontSeeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuStyle);
        $I->click($CustomizerPage->customizer_headermenu_layout_EnableDisableMobileMenuLabel);
        $I->wait(5);
        $I->seeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuBreakpoint);
        $I->seeElement($CustomizerPage->customizer_headermenu_layout_MobileMenuStyle);
        
        $I->wait(5);
        $I->click($CustomizerPage->publishButton);
        $I->wait(1);
    }
}
