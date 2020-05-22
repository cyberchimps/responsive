<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderMenuTypographyUpdateCustomizerValuesCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

        //Update Typography values in customizer
        //Open Customizer
        $I->amGoingTo('Update Typography values in customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_typography);
        $I->wait(1);

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontFamily);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_FontFamily,'Actor');
        
        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontWeight);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_FontWeight,'Black: 900');
        
        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontStyle);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_FontStyle,'Italic');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_TextTransform);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_TextTransform,'Uppercase');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontSize);
        $I->fillField($CustomizerPage->customizer_headermenu_typography_FontSize,'30px');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_LineHeight);
        //$I->fillField($CustomizerPage->customizer_headermenu_typography_LineHeight,'4');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_LetterSpacing);
        //$I->fillField($CustomizerPage->customizer_headermenu_typography_LetterSpacing,'10');
        
        //Check updated values in customizer
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $menuItemsFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Actor, sans-serif',$menuItemsFontFamily);

        $menuItemsFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('900',$menuItemsFontWeight);

        $menuItemsFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('italic',$menuItemsFontStyle);

        $menuItemsFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('30px',$menuItemsFontSize);

        $menuItemsLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('line-height');
        });
        //$I->assertEquals('80px',$menuItemsLineHeight);
        


        //Check updated values without customizer
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check updated values without customizer');
        $I->amOnPage($HomaPage->url);
        $menuItemsFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Actor, sans-serif',$menuItemsFontFamily);

        $menuItemsFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('900',$menuItemsFontWeight);

        $menuItemsFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('italic',$menuItemsFontStyle);

        $menuItemsFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('30px',$menuItemsFontSize);

        $menuItemsLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('line-height');
        });
        //$I->assertEquals('80px',$menuItemsLineHeight);


        //Reset values to default
        //Open Customizer
        $I->amGoingTo('Reset Typography values in customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_typography);
        $I->wait(1);

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontFamily);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_FontFamily,'Arial, Helvetica, sans-serif');
        
        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontWeight);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_FontWeight,'Default');
        
        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontStyle);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_FontStyle,'Normal');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_TextTransform);
        $I->selectOption($CustomizerPage->customizer_headermenu_typography_TextTransform,'Default');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_FontSize);
        $I->fillField($CustomizerPage->customizer_headermenu_typography_FontSize,'16px');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_LineHeight);
        //$I->fillField($CustomizerPage->customizer_headermenu_typography_LineHeight,'4');

        $I->seeElement($CustomizerPage->customizer_headermenu_typography_LetterSpacing);
        //$I->fillField($CustomizerPage->customizer_headermenu_typography_LetterSpacing,'10');
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->wait(2);
    }
}
