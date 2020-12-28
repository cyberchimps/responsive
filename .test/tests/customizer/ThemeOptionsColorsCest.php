<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use \Page\Customizer\PageMarkupAndFormatting;
use \Page\Customizer\PostWithButtons;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class ThemeOptionsColorsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage, PageMarkupAndFormatting $PageMarkupAndFormattingPage, PostWithButtons $PostWithButtonsPage)
    {
        
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);
    	


        //Check default colors without customizer
    	$I->amGoingTo('Check Default Theme Option Colors without customizer');
    	$I->amOnPage($PageMarkupAndFormattingPage->url);
        
        $bodyBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(234, 234, 234, 1)',$bodyBackgroundColor);

        $boxBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#primary > div'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$boxBackgroundColor);

        $addressBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('address'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(234, 234, 234, 1)',$addressBackgroundColor);

        $bodyTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$bodyTextColor);

        $h1Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h1'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h1Color);

        $h2Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h2'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h2Color);

        $h3Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h3'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h3Color);

        $h4Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h4'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h4Color);

        $h5Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h5'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h5Color);
        
        $h6Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h6'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h6Color);

        //$I->amOnPage($PostWithButtonsPage->url);
        //$metacolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //    return $webdriver->findElement(WebDriverBy::cssSelector('.post-meta'))->getCSSValue('color');
        //});
        //$I->assertEquals('rgba(153, 153, 153, 1)',$metacolor);

        $I->amOnPage($HomePage->url);
        $linkColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('a.more-link'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(0, 102, 204, 1)',$linkColor);

        $I->amOnPage($PostWithButtonsPage->url);
        $buttonBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(0, 102, 204, 1)',$buttonBackgroundColor);

        $buttonColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$buttonColor);

        $buttonBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderTopColor);
        $buttonBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderRightColor);
        $buttonBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderBottomColor);
        $buttonBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderLeftColor);

        $inputBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$inputBackgroundColor);

        $inputTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$inputTextColor);

        $inputBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderTopColor);
        $inputBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderRightColor);
        $inputBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderBottomColor);
        $inputBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderLeftColor);
        

        
        //Check default customizer values
        //Open Customizer
        $I->amOnPage($PageMarkupAndFormattingPage->url);
        $I->amGoingTo('Open Customizer');
        $I->click($PageMarkupAndFormattingPage->customizeLink);
        //$I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->hideCustomizer);
        $I->amGoingTo('Check Default Customizer Theme Options For Colors');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");

        $bodyBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(234, 234, 234, 1)',$bodyBackgroundColor);
        

        $boxBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#primary > div'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$boxBackgroundColor);

        $addressBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('address'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(234, 234, 234, 1)',$addressBackgroundColor);

        $bodyTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$bodyTextColor);

        $h1Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h1'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h1Color);

        $h2Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h2'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h2Color);

        $h3Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h3'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h3Color);

        $h4Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h4'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h4Color);

        $h5Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h5'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h5Color);
        
        $h6Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h6'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$h6Color);

        //$I->amOnPage($PostWithButtonsPage->url);
        //$I->click($PostWithButtonsPage->customizeLink);
        //$I->click($CustomizerPage->customizer_themeOptions);
        //$I->wait(1);
        //$I->click($CustomizerPage->customizer_themeOptions_colors);
        //$I->wait(1);
        //$I->click($CustomizerPage->hideCustomizer);
        //$I->executeJS('jQuery("iframe").attr("name", "new_name")');
        //$I->switchToIFrame("new_name");
        //$metacolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //    return $webdriver->findElement(WebDriverBy::cssSelector('.post-meta'))->getCSSValue('color');
        //});
        //$I->assertEquals('rgba(153, 153, 153, 1)',$metacolor);

        $I->amOnPage($HomePage->url);
        $I->click($HomePage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->hideCustomizer);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $linkColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('a.more-link'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(0, 102, 204, 1)',$linkColor);

        $I->amOnPage($PostWithButtonsPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->hideCustomizer);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $buttonBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(0, 102, 204, 1)',$buttonBackgroundColor);

        $buttonColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$buttonColor);

        $buttonBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderTopColor);
        $buttonBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderRightColor);
        $buttonBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderBottomColor);
        $buttonBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(16, 101, 156, 1)',$buttonBorderLeftColor);

        $inputBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(255, 255, 255, 1)',$inputBackgroundColor);

        $inputTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(51, 51, 51, 1)',$inputTextColor);

        $inputBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderTopColor);
        $inputBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderRightColor);
        $inputBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderBottomColor);
        $inputBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(204, 204, 204, 1)',$inputBorderLeftColor);
        


        //Update values in customizer
        //Open Customizer
        $I->amOnPage($PageMarkupAndFormattingPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_themeOptions_colors_BackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_BackgroundColor_Input,'#123456');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_BoxBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_BoxBackgroundColor_Input,'#654321');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_AlternateBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_AlternateBackgroundColor_Input,'#456789');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_themeOptions_colors_BodyTextColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_BodyTextColor_Input,'#987654');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_themeOptions_colors_H1Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H1Color_Input,'#234567');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H2Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H2Color_Input,'#345678');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H3Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H3Color_Input,'#456789');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H4Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H4Color_Input,'#567890');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H5Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H5Color_Input,'#678901');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H6Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H6Color_Input,'#789012');
        $I->wait(1);

        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $bodyBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(18, 52, 86, 1)',$bodyBackgroundColor);

        $boxBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#primary > div'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(101, 67, 33, 1)',$boxBackgroundColor);

        $addressBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('address'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$addressBackgroundColor);

        $bodyTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(152, 118, 84, 1)',$bodyTextColor);

        $h1Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h1'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(35, 69, 103, 1)',$h1Color);

        $h2Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h2'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(52, 86, 120, 1)',$h2Color);

        $h3Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h3'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$h3Color);

        $h4Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h4'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(86, 120, 144, 1)',$h4Color);

        $h5Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h5'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(103, 137, 1, 1)',$h5Color);
        
        $h6Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h6'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(120, 144, 18, 1)',$h6Color);

        //Publish changes and see colors without customizer
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
        $I->amOnPage($PageMarkupAndFormattingPage->url);
        $bodyBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(18, 52, 86, 1)',$bodyBackgroundColor);

        $boxBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#primary > div'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(101, 67, 33, 1)',$boxBackgroundColor);

        $addressBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('address'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$addressBackgroundColor);

        $bodyTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('body'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(152, 118, 84, 1)',$bodyTextColor);

        $h1Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h1'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(35, 69, 103, 1)',$h1Color);

        $h2Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h2'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(52, 86, 120, 1)',$h2Color);

        $h3Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h3'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$h3Color);

        $h4Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h4'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(86, 120, 144, 1)',$h4Color);

        $h5Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h5'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(103, 137, 1, 1)',$h5Color);
        
        $h6Color = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h6'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(120, 144, 18, 1)',$h6Color);

        //Reset default colors
        //Open Customizer
        $I->amOnPage($PageMarkupAndFormattingPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_themeOptions_colors_BackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_BackgroundColor_Input,'#eaeaea');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_BoxBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_BoxBackgroundColor_Input,'#ffffff');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_AlternateBackgroundColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_AlternateBackgroundColor_Input,'#eaeaea');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_themeOptions_colors_BodyTextColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_BodyTextColor_Input,'#333333');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_themeOptions_colors_H1Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H1Color_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H2Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H2Color_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H3Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H3Color_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H4Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H4Color_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H5Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H5Color_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_H6Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_H6Color_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);



        
        //Update, check, reset meta color
        // $I->amOnPage($PostWithButtonsPage->url);
        // $I->click($PostWithButtonsPage->customizeLink);
        // $I->click($CustomizerPage->customizer_themeOptions);
        // $I->wait(1);
        // $I->click($CustomizerPage->customizer_themeOptions_colors);
        // $I->wait(1);
        // $I->click($CustomizerPage->customizer_themeOptions_colors_MetaTextColor);
        // $I->wait(1);
        // $I->fillField($CustomizerPage->customizer_themeOptions_colors_MetaTextColor_Input,'#455667');
        // $I->wait(1);
        // $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        // $I->switchToIFrame("new_name");
        // $metaColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //     return $webdriver->findElement(WebDriverBy::cssSelector('.post-meta'))->getCSSValue('color');
        // });
        // $I->switchToIFrame();
        // $I->click($CustomizerPage->publishButton);
        // $I->wait(3);
        // $I->amOnPage($PostWithButtonsPage->url);
        // $metaColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
        //     return $webdriver->findElement(WebDriverBy::cssSelector('.post-meta'))->getCSSValue('color');
        // });
        // $I->assertEquals('rgba(69, 86, 103, 1)',$metaColor);
        // $I->amOnPage($PostWithButtonsPage->url);
        // $I->click($PostWithButtonsPage->customizeLink);
        // $I->click($CustomizerPage->customizer_themeOptions);
        // $I->wait(1);
        // $I->click($CustomizerPage->customizer_themeOptions_colors);
        // $I->wait(1);
        // $I->click($CustomizerPage->customizer_themeOptions_colors_MetaTextColor);
        // $I->wait(1);
        // $I->fillField($CustomizerPage->customizer_themeOptions_colors_MetaTextColor_Input,'#999999');
        // $I->wait(1);
        // $I->click($CustomizerPage->publishButton);
        // $I->wait(3);
        

        

        
        //Update, check, reset link color
        $I->amOnPage($HomePage->url);
        $I->click($HomePage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_LinkColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_LinkColor_Input,'#982156');
        $I->wait(1);
        $I->wait(3);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->wait(3);
        $linkcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('a.more-link'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(152, 33, 86, 1)',$linkcolor);
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
        $I->amOnPage($HomePage->url);
        $linkcolor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('a.more-link'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(152, 33, 86, 1)',$linkcolor);
        $I->amOnPage($HomePage->url);
        $I->click($HomePage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_LinkColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_LinkColor_Input,'#0066CC');
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);



        //Update, check, reset button colors
        $I->amOnPage($PostWithButtonsPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_ButtonColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_ButtonColor_Input,'#123456');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_ButtonTextColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_ButtonTextColor_Input,'#654321');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_ButtonBorderColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_ButtonBorderColor_Input,'#246810');
        $I->wait(1);
        $I->wait(3);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->wait(3);
        $buttonBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(18, 52, 86, 1)',$buttonBackgroundColor);

        $buttonColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(101, 67, 33, 1)',$buttonColor);

        $buttonBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderTopColor);
        $buttonBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderRightColor);
        $buttonBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderBottomColor);
        $buttonBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderLeftColor);

        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
        $I->amOnPage($PostWithButtonsPage->url);
        $buttonBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(18, 52, 86, 1)',$buttonBackgroundColor);

        $buttonColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(101, 67, 33, 1)',$buttonColor);

        $buttonBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderTopColor);
        $buttonBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderRightColor);
        $buttonBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderBottomColor);
        $buttonBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(36, 104, 16, 1)',$buttonBorderLeftColor);

        $I->amOnPage($PostWithButtonsPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_ButtonColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_ButtonColor_Input,'#0066CC');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_ButtonTextColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_ButtonTextColor_Input,'#FFFFFF');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_ButtonBorderColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_ButtonBorderColor_Input,'#10659C');
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
        



        //Update, check, reset inputs color
        $I->amOnPage($HomePage->url);
        $I->click($HomePage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_InputsColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_InputsColor_Input,'#567432');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_InputsTextColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_InputsTextColor_Input,'#234567');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_InputsBorderColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_InputsBorderColor_Input,'#432567');
        $I->wait(1);
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(1);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->wait(3);
        $inputBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(86, 116, 50, 1)',$inputBackgroundColor);

        $inputTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(35, 69, 103, 1)',$inputTextColor);

        $inputBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderTopColor);
        $inputBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderRightColor);
        $inputBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderBottomColor);
        $inputBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderLeftColor);
    
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
        $I->amOnPage($HomePage->url);
        $inputBackgroundColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(86, 116, 50, 1)',$inputBackgroundColor);

        $inputTextColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(35, 69, 103, 1)',$inputTextColor);

        $inputBorderTopColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderTopColor);
        $inputBorderRightColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderRightColor);
        $inputBorderBottomColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderBottomColor);
        $inputBorderLeftColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-color');
        });
        $I->assertEquals('rgba(67, 37, 103, 1)',$inputBorderLeftColor);

        $I->amOnPage($HomePage->url);
        $I->click($HomePage->customizeLink);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_InputsColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_InputsColor_Input,'#ffffff');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_InputsTextColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_InputsTextColor_Input,'#333333');
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_colors_InputsBorderColor);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_themeOptions_colors_InputsBorderColor_Input,'#cccccc');
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
    }
}
