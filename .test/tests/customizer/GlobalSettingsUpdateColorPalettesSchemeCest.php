<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use \Page\Customizer\PostWithButtons;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateColorPalettesSchemeCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage, PostWithButtons $PostWithButtonsPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

//Check default values for Color Palette Schemes without customizer
    	$I->amGoingTo('Check default values for Color Palette Schemes without customizer');
        $I->amOnPage($HomePage->url);
        
        $header_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals($header_backgroundcolor,'rgba(255, 255, 255, 1)');
        $body_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals($body_backgroundcolor,'rgba(234, 234, 234, 1)');
        
        
//Check default values for Color Palette Schemes with customizer
        $I->amGoingTo('Check default values for Color Palette Schemes with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($HomePage->url);
        $I->amOnPage($CustomizerPage->url);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->click($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $header_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals($header_backgroundcolor,'rgba(255, 255, 255, 1)');
        $body_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals($body_backgroundcolor,'rgba(234, 234, 234, 1)');
        

//Check updated values for Color Palette Schemes with customizer
        $I->amGoingTo('Check updated values for Color Palette Schemes with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($HomePage->url);
        $I->amOnPage($CustomizerPage->url);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->click($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->wait(2);
        //Frolic
        $I->click($CustomizerPage->customizer_globalSettings_colorPalettesSchemeFrolic);
        $I->wait(2);
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(3);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $header_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals($header_backgroundcolor,'rgba(63, 70, 174, 1)');
        $body_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals($body_backgroundcolor,'rgba(247, 251, 255, 1)');
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
     

//Check updated values for Color Palette Schemes without customizer
        $I->amOnPage($HomePage->url);
        
        $header_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals($header_backgroundcolor,'rgba(63, 70, 174, 1)');
        $body_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals($body_backgroundcolor,'rgba(247, 251, 255, 1)');
    

//Reset values for Color Palette Schemes with customizer
        $I->amGoingTo('Check values after reset for Color Palette Schemes with customizer');
        $I->amGoingTo('Open Customizer');

        $I->amOnPage($HomePage->url);
        $I->amOnPage($CustomizerPage->url);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->click($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->wait(2);
        //Default
        $I->click($CustomizerPage->customizer_globalSettings_colorPalettesSchemeDefault);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
        $I->wait(2);
        $I->amOnPage($HomePage->url);
        $I->wait(3);
        $header_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals($header_backgroundcolor,'rgba(255, 255, 255, 1)');
        $body_backgroundcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals($body_backgroundcolor,'rgba(234, 234, 234, 1)');
    }
}
