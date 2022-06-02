<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use \Page\Customizer\PostWithButtons;

use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class ThemeOptionsLayoutDefaultValuesCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage, PostWithButtons $PostWithButtonsPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	
        //Check default class without customizer
        $I->amGoingTo('Check Default Theme Option Layouts without customizer');
    	$I->amOnPage($HomePage->url);
    	$I->seeElement($HomePage->bodyWithClass_ResponsiveSiteContained);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->seeElement($HomePage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleFlat);

        $I->amOnPage($PostWithButtonsPage->url);
        $I->seeElement($PostWithButtonsPage->button);
        
        //Button Padding
        $buttonPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('10px',$buttonPaddingBottom);
        $buttonPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-left');
        });
        $I->assertEquals('10px',$buttonPaddingLeft);
        $buttonPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals('10px',$buttonPaddingRight);
        $buttonPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals('10px',$buttonPaddingTop);

        //Button Border Radius
        $buttonBorderRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusBottomLeft);
        $buttonBorderRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusBottomRight);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusTopLeft);
        $buttonBorderRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusTopRight);

        //Button Border Width
        $buttonBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('0px',$buttonBorderWidthTop);
        $buttonBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('0px',$buttonBorderRadiusBottomRight);
        $buttonBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('0px',$buttonBorderWidthBottom);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('0px',$buttonBorderRadiusTopLeft);
        
        //Form Inputs Padding
        $formInputsPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals('3px',$formInputsPaddingTop);
        $formInputsPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals('3px',$formInputsPaddingRight);
        $formInputsPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('3px',$formInputsPaddingBottom);
        $formInputsPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals('3px',$formInputsPaddingLeft);

        //Form Inputs Radius
        $formInputsRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusBottomLeft);
        $formInputsRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusBottomRight);
        $formInputsRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusTopLeft);
        $formInputsRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusTopRight);

        //Form Inputs Border Width
        $formInputsBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('1px',$formInputsBorderWidthTop);
        $formInputsBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('1px',$formInputsBorderWidthRight);
        $formInputsBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('1px',$formInputsBorderWidthBottom);
        $formInputsBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('1px',$formInputsBorderRadiusTopLeft);
        

        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_layout);
        $I->wait(1);
        $I->click($CustomizerPage->hideCustomizer);
        //Check default customizer values
        $I->amGoingTo('Check Default Customizer Theme Options For Layout');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");

        $I->click('Block: Button');
        $I->wait(6);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");

        //$I->amOnPage($PostWithButtonsPage->url);
        $I->seeElement('.wp-block-button.alignleft > a');
        $I->seeElement($PostWithButtonsPage->button);
        
        //Button Padding
        $buttonPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('10px',$buttonPaddingBottom);
        $buttonPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-left');
        });
        $I->assertEquals('10px',$buttonPaddingLeft);
        $buttonPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals('10px',$buttonPaddingRight);
        $buttonPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals('10px',$buttonPaddingTop);

        //Button Border Radius
        $buttonBorderRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusBottomLeft);
        $buttonBorderRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusBottomRight);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusTopLeft);
        $buttonBorderRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('0px',$buttonBorderRadiusTopRight);

        //Button Border Width
        $buttonBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('0px',$buttonBorderWidthTop);
        $buttonBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('0px',$buttonBorderRadiusBottomRight);
        $buttonBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('0px',$buttonBorderWidthBottom);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('0px',$buttonBorderRadiusTopLeft);
        
        //Form Inputs Padding
        $formInputsPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals('3px',$formInputsPaddingTop);
        $formInputsPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals('3px',$formInputsPaddingRight);
        $formInputsPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('3px',$formInputsPaddingBottom);
        $formInputsPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals('3px',$formInputsPaddingLeft);

        //Form Inputs Radius
        $formInputsRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusBottomLeft);
        $formInputsRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusBottomRight);
        $formInputsRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusTopLeft);
        $formInputsRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('0px',$formInputsRadiusTopRight);

        //Form Inputs Border Width
        $formInputsBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('1px',$formInputsBorderWidthTop);
        $formInputsBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('1px',$formInputsBorderWidthRight);
        $formInputsBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('1px',$formInputsBorderWidthBottom);
        $formInputsBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('1px',$formInputsBorderRadiusTopLeft);
        
    }
}
