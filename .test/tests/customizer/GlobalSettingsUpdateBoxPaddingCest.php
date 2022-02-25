<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateBoxPaddingCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

		//$bodyClass = $I->executeJS('return jQuery("body").hasClass("site-header-site-branding-main-navigation")');
    	//$I->assertEquals($bodyClass,true);

//Check default Boxed Padding without customizer
        $I->amGoingTo('Check default Boxed Padding Without Customizer');
        $I->amOnPage($HomaPage->url);
        $box_default_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-top');
        });
        $I->assertEquals($box_default_padding_top,'30px');
        $box_default_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-right');
        });
        $I->assertEquals($box_default_padding_right,'30px');
        $box_default_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($box_default_padding_bottom,'30px');
        $box_default_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-left');
        });
        $I->assertEquals($box_default_padding_left,'30px');

//Check default Boxed Padding with customizer   
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $box_default_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-top');
        });
        $I->assertEquals($box_default_padding_top,'30px');
        $box_default_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-right');
        });
        $I->assertEquals($box_default_padding_right,'30px');
        $box_default_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($box_default_padding_bottom,'30px');
        $box_default_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-left');
        });
        $I->assertEquals($box_default_padding_left,'30px');
        $I->switchToIFrame();



//Update Box Padding for Boxed
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);

        $I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingTop,'20px');
        //$I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingRight,'20px');
        //$I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingBottom,'20px');
        //$I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingLeft,'20px');

        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $box_default_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-top');
        });
        $I->assertEquals($box_default_padding_top,'20px');
        $box_default_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-right');
        });
        $I->assertEquals($box_default_padding_right,'20px');
        $box_default_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($box_default_padding_bottom,'20px');
        $box_default_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-left');
        });
        $I->assertEquals($box_default_padding_left,'20px');
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);

//Check updated Boxed Padding without customizer
        $I->amGoingTo('Check Updated Boxed Padding Without Customizer');
        $I->amOnPage($HomaPage->url);
        $box_default_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-top');
        });
        $I->assertEquals($box_default_padding_top,'20px');
        $box_default_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-right');
        });
        $I->assertEquals($box_default_padding_right,'20px');
        $box_default_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($box_default_padding_bottom,'20px');
        $box_default_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-left');
        });
        $I->assertEquals($box_default_padding_left,'20px');

//Reset Box Padding for Boxed
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);

        $I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingTop,'30px');
        //$I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingRight,'30px');
        //$I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingBottom,'30px');
        //$I->fillField($CustomizerPage->customizer_globalSettings_layout_boxPaddingLeft,'30px');

        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $box_default_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-top');
        });
        $I->assertEquals($box_default_padding_top,'30px');
        $box_default_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-right');
        });
        $I->assertEquals($box_default_padding_right,'30px');
        $box_default_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($box_default_padding_bottom,'30px');
        $box_default_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('padding-left');
        });
        $I->assertEquals($box_default_padding_left,'30px');
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
    }
}