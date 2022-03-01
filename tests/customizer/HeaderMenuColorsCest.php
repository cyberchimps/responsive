<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderMenuColorsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);


    	//Check default class without customizer
    	$I->amGoingTo('Check Default Header Colors without customizer');
    	$I->amOnPage($HomaPage->url);
    	$I->seeElement($HomaPage->header);
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
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_colors);
        $I->wait(1);
        //Check default customizer values
        $I->amGoingTo('Check Default Colors within customizer');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
                $I->amGoingTo('Check Default Header Colors without customizer');
        $I->expectTo('See Default Header Color as rgba(255, 255, 255, 1)');
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->header);
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


        //Update colors in customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_colors);
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_headermenu_colors_LinkColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_LinkColor_Input,'#456789');
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_headermenu_colors_LinkHoverColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_LinkHoverColor_Input,'#987654');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_subMenuBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_subMenuBackgroundColor_Input,'#654789');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_subMenuLinkColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_subMenuLinkColor_Input,'#123456');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_MenuToggleBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_MenuToggleBackgroundColor_Input,'#789456');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_MenuToggleColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_MenuToggleColor_Input,'#987456');
        $I->wait(1);

        //Check updated customizer values
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->amGoingTo('Check Updated Colors within customizer');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $menuItemsColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$menuItemsColor);

        //$menuItemsHoverColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //    return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a:hover'))->getCSSValue('border-bottom-color');
        //});
        //$I->assertEquals('rgba(69, 103, 137, 1)',$menuItemsHoverColor);

        $subMenuBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li.page_item.page-item-174.page_item_has_children > ul'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(101, 71, 137, 1)',$subMenuBGColor);

        $subMenulinkColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li.page_item_has_children > ul > li.page_item_has_children > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(18, 52, 86, 1)',$subMenulinkColor);

        $I->resizeWindow(375, 812);
        $I->wait(1);

        $menuToggleBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(120, 148, 86, 1)',$menuToggleBGColor);

        $menuToggleColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(120, 148, 86, 1)',$menuToggleColor);        
        $I->resizeWindow(1280, 800);
        $I->wait(1);

        $I->switchToIFrame();
        $I->wait(1);
        $I->click($CustomizerPage->UnhideCustomizer);
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(1);


        //Check Updated Colors without customizer
        $I->amGoingTo('Check Updated Header Menu Colors within customizer');
        $I->amOnPage($HomaPage->url);
        $menuItemsColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$menuItemsColor);

        //$menuItemsHoverColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //    return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li > a:hover'))->getCSSValue('border-bottom-color');
        //});
        //$I->assertEquals('rgba(69, 103, 137, 1)',$menuItemsHoverColor);

        $subMenuBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li.page_item.page-item-174.page_item_has_children > ul'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(101, 71, 137, 1)',$subMenuBGColor);

        $subMenulinkColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#header-menu > ul > li.page_item_has_children > ul > li.page_item_has_children > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(18, 52, 86, 1)',$subMenulinkColor);

        $I->resizeWindow(375, 812);
        $I->wait(1);
        $menuToggleBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(120, 148, 86, 1)',$menuToggleBGColor);

        $menuToggleColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.menu-toggle'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(120, 148, 86, 1)',$menuToggleColor);        
        $I->resizeWindow(1280, 800);
        $I->wait(1);


        //Revert back customizer values to Original Colors
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_headermenu);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_headermenu_colors);
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_headermenu_colors_LinkColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_LinkColor_Input,'#333333');
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_headermenu_colors_LinkHoverColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_LinkHoverColor_Input,'#10659C');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_subMenuBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_subMenuBackgroundColor_Input,'#ffffff');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_subMenuLinkColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_subMenuLinkColor_Input,'#333333');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_MenuToggleBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_MenuToggleBackgroundColor_Input,'#789456');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_headermenu_colors_MenuToggleColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_headermenu_colors_MenuToggleColor_Input,'#333333');
        $I->wait(1);
    }
}
