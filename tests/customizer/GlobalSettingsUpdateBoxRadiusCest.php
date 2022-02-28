<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateBoxRadiusCest
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

//Check default Boxed Radius without customizer
        $I->amGoingTo('Check default Boxed Radius Without Customizer');
        $I->amOnPage($HomaPage->url);
        $box_radius_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($box_radius_bottomleft,'0px');
        $box_radius_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($box_radius_bottomright,'0px');
        $box_radius_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($box_radius_topleft,'0px');
        $box_radius_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($box_radius_topright,'0px');

//Check default Boxed Radius with customizer   
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
        $box_radius_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($box_radius_bottomleft,'0px');
        $box_radius_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($box_radius_bottomright,'0px');
        $box_radius_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($box_radius_topleft,'0px');
        $box_radius_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($box_radius_topright,'0px');
        $I->switchToIFrame();


//Update Box radius for Boxed
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);

        $I->fillField($CustomizerPage->customizer_globalSettings_layout_boxRadiusinput,'20px');
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $box_radius_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($box_radius_bottomleft,'20px');
        $box_radius_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($box_radius_bottomright,'20px');
        $box_radius_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($box_radius_topleft,'20px');
        $box_radius_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($box_radius_topright,'20px');
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);

//Check updated Boxed Padding without customizer
        $I->amGoingTo('Check Updated Boxed Padding Without Customizer');
        $I->amOnPage($HomaPage->url);
        $box_radius_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($box_radius_bottomleft,'20px');
        $box_radius_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($box_radius_bottomright,'20px');
        $box_radius_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($box_radius_topleft,'20px');
        $box_radius_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($box_radius_topright,'20px');

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

        $I->fillField($CustomizerPage->customizer_globalSettings_layout_boxRadiusinput,'0px');
        
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $box_radius_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($box_radius_bottomleft,'0px');
        $box_radius_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($box_radius_bottomright,'0px');
        $box_radius_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($box_radius_topleft,'0px');
        $box_radius_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#main-blog > div:nth-child(1) > article'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($box_radius_topright,'0px');
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
    }
}