<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use \Page\Customizer\PostWithButtons;

use Codeception\Module\WebDriver;
use Codeception\Module\Assert;
use Codeception\Util\Locator;


class ThemeOptionsLayoutUpdateValuesCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage, PostWithButtons $PostWithButtonsPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);
    
        //Update values in customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_layout);
        $I->wait(1);

        $I->selectOption($CustomizerPage->customizer_themeOptions_layout_width,'Full Width');
        $I->wait(1);
        $I->selectOption($CustomizerPage->customizer_themeOptions_layout_style,'Content Boxed');
        $I->wait(3);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");

        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteContained);
        $I->seeElement($HomePage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->seeElement($HomePage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->switchToIFrame();
        $I->selectOption($CustomizerPage->customizer_themeOptions_layout_style,'Flat');
        $I->wait(3);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->wait(1);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->seeElement($HomePage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->switchToIFrame();

        $I->scrollTo('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input');

        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input','40');
        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input','40');
        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input','40');
        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input','40');
        $I->wait(1);

        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius,'40');
        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth,'10');

        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius,'40');
        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth,'10');

        $I->scrollTo('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input');

        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input','40');
        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input','40');
        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input','40');
        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input','40');

        $I->clearField($CustomizerPage->customizer_themeOptions_layout_formInputsRadius);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_formInputsRadius,'40');
        $I->clearField($CustomizerPage->customizer_themeOptions_layout_formInputsBorderWidth);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_formInputsBorderWidth,'10');
        
        $I->wait(1);
        $I->click($CustomizerPage->hideCustomizer);
        
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->wait(4);
        //$I->see('Block: Button');
        //$I->click(Locator::contains('a', 'Block: Button')); // label containing name);
        $I->click('#recent-posts-2 > ul > li:nth-child(3) > a');
        //$I->click('#recent-posts-2 > ul > li:nth-child(3) > a');
        $I->wait(6);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        //Button Padding
        $buttonPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('40px',$buttonPaddingBottom);
        $buttonPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-left');
        });
        $I->assertEquals('40px',$buttonPaddingLeft);
        $buttonPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals('40px',$buttonPaddingRight);
        $buttonPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals('40px',$buttonPaddingTop);

        //Button Border Radius
        $buttonBorderRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusBottomLeft);
        $buttonBorderRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusBottomRight);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusTopLeft);
        $buttonBorderRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusTopRight);

        //Button Border Width
        $buttonBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('10px',$buttonBorderWidthTop);
        $buttonBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('10px',$buttonBorderWidthRight);
        $buttonBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('10px',$buttonBorderWidthBottom);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('10px',$buttonBorderRadiusTopLeft);

        //Form Inputs Padding
        $formInputsPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals('40px',$formInputsPaddingTop);
        $formInputsPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals('40px',$formInputsPaddingRight);
        $formInputsPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('40px',$formInputsPaddingBottom);
        $formInputsPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals('40px',$formInputsPaddingLeft);

        //Form Inputs Radius
        $formInputsRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusBottomLeft);
        $formInputsRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusBottomRight);
        $formInputsRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusTopLeft);
        $formInputsRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusTopRight);

        //Form Inputs Border Width
        $formInputsBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('10px',$formInputsBorderWidthTop);
        $formInputsBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('10px',$formInputsBorderWidthRight);
        $formInputsBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('10px',$formInputsBorderWidthBottom);
        $formInputsBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('10px',$formInputsBorderRadiusTopLeft);
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(1);
        
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);


        //Check without customizer after publishing changes
        $I->amOnPage($HomePage->url);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteContained);
        $I->seeElement($HomePage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomePage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->seeElement($HomePage->bodyWithClass_ResponsiveSiteStyleFlat);
        
        $I->amOnPage($PostWithButtonsPage->url);
        $I->seeElement($PostWithButtonsPage->button);
        
        //Button Padding
        $buttonPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('40px',$buttonPaddingBottom);
        $buttonPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-left');
        });
        $I->assertEquals('40px',$buttonPaddingLeft);
        $buttonPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals('40px',$buttonPaddingRight);
        $buttonPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals('40px',$buttonPaddingTop);

        //Button Border Radius
        $buttonBorderRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusBottomLeft);
        $buttonBorderRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusBottomRight);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusTopLeft);
        $buttonBorderRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('40px',$buttonBorderRadiusTopRight);

        //Button Border Width
        $buttonBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('10px',$buttonBorderWidthTop);
        $buttonBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('10px',$buttonBorderWidthRight);
        $buttonBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('10px',$buttonBorderWidthBottom);
        $buttonBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('10px',$buttonBorderRadiusTopLeft);

        //Form Inputs Padding
        $formInputsPaddingTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals('40px',$formInputsPaddingTop);
        $formInputsPaddingRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals('40px',$formInputsPaddingRight);
        $formInputsPaddingBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals('40px',$formInputsPaddingBottom);
        $formInputsPaddingLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals('40px',$formInputsPaddingLeft);

        //Form Inputs Radius
        $formInputsRadiusBottomLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusBottomLeft);
        $formInputsRadiusBottomRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusBottomRight);
        $formInputsRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusTopLeft);
        $formInputsRadiusTopRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals('40px',$formInputsRadiusTopRight);

        //Form Inputs Border Width
        $formInputsBorderWidthTop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        $I->assertEquals('10px',$formInputsBorderWidthTop);
        $formInputsBorderWidthRight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        $I->assertEquals('10px',$formInputsBorderWidthRight);
        $formInputsBorderWidthBottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals('10px',$formInputsBorderWidthBottom);
        $formInputsBorderRadiusTopLeft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        $I->assertEquals('10px',$formInputsBorderRadiusTopLeft);
        

        //Reset default values in customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_themeOptions);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_themeOptions_layout);
        $I->wait(1);

        $I->selectOption($CustomizerPage->customizer_themeOptions_layout_width,'Contained');
        $I->wait(1);
        $I->selectOption($CustomizerPage->customizer_themeOptions_layout_style,'Boxed');
        $I->wait(1);
        
        $I->scrollTo('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input');
        $I->clearField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input');

        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input','10');
        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input','10');
        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input','10');
        $I->fillField('#customize-control-responsive_buttons_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input','10');
        $I->wait(1);

        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius,'0');
        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth,'0');

        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsRadius,'0');
        $I->clearField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_buttonsBorderWidth,'0');

        $I->scrollTo('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input');
        $I->clearField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input');

        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input','3');
        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input','3');
        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input','3');
        $I->fillField('#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input','3');

        $I->clearField($CustomizerPage->customizer_themeOptions_layout_formInputsRadius);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_formInputsRadius,'0');
        $I->clearField($CustomizerPage->customizer_themeOptions_layout_formInputsBorderWidth);
        $I->fillField($CustomizerPage->customizer_themeOptions_layout_formInputsBorderWidth,'1');
        
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(4);
        
    }
}
