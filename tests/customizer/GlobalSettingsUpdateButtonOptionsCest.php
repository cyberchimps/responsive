<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use \Page\Customizer\PostWithButtons;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateButtonOptionsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage, PostWithButtons $PostWithButtonsPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

//Check default values for button without customizer
    	$I->amGoingTo('Check default values for button without customizer');
        $I->amOnPage($PostWithButtonsPage->url);
        $I->seeElement($PostWithButtonsPage->button);
        $button_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_top,'10px');
        
        $button_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals($button_padding_right,'10px');

        $button_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($button_padding_bottom,'10px');
        $button_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_left,'10px');

        $button_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($button_border_bottomleft,'0px');
        $button_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($button_border_bottomright,'0px');
        $button_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($button_border_topleft,'0px');
        $button_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($button_border_topright,'0px');

        $button_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals($button_border_widthtop,'0px');
        $button_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals($button_border_widthtop,'0px');
        $button_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals($button_border_widthright,'0px');
        $button_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals($button_border_widthbottom,'0px');
        $button_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals($button_border_widthleft,'0px');
        
        $button_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-family');
        });
        $selectedfont = "Arial, Helvetica, sans-serif";
        $I->assertEquals($button_font_family,$selectedfont);

        $button_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals($button_font_weight,400);

        $button_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-style');
        });
        $I->assertEquals($button_font_style,'normal');

        $button_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('text-transform');
        });
        $I->assertEquals($button_text_transform,'none');

        $button_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('line-height');
        });
        $I->assertEquals($button_line_height,'16px');

        $button_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($button_letter_spacing,'normal');
        
        
//Check default values for button with customizer
        $I->amGoingTo('Check default values for button with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($PostWithButtonsPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_buttons);
        $I->click($CustomizerPage->customizer_globalSettings_buttons);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        
        $button_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_top,'10px');
        
        $button_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals($button_padding_right,'10px');

        $button_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($button_padding_bottom,'10px');
        $button_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_left,'10px');

        $button_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($button_border_bottomleft,'0px');
        $button_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($button_border_bottomright,'0px');
        $button_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($button_border_topleft,'0px');
        $button_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($button_border_topright,'0px');

        $button_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals($button_border_widthtop,'0px');
        $button_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals($button_border_widthright,'0px');
        $button_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals($button_border_widthbottom,'0px');
        $button_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals($button_border_widthleft,'0px');
        
        $button_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-family');
        });
        $selectedfont = "Arial, Helvetica, sans-serif";
        $I->assertEquals($button_font_family,$selectedfont);

        $button_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals($button_font_weight,400);

        $button_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-style');
        });
        //$I->assertEquals($button_font_style,'normal');

        $button_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('text-transform');
        });
        $I->assertEquals($button_text_transform,'none');

        $button_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('line-height');
        });
        $I->assertEquals($button_line_height,'16px');

        $button_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($button_letter_spacing,'normal');
        

//Check updated values for button with customizer
        $I->amGoingTo('Check updated values for button with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($PostWithButtonsPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_buttons);
        $I->click($CustomizerPage->customizer_globalSettings_buttons);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingTop,20);
        //$I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingRight,20);
        //$I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingBottom,20);
        //$I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingLeft,20);

        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsRadius,20);
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsWidth,20);
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsFontFamily,"'Abhaya Libre', serif");
        $I->wait(2);
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsFontWeight,"800");
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsFontStyle,"italic");
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsTextTransform,"uppercase");
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsFontSize,'20px');
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsLineHeight,3);
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsLetterSpacing,5);
        $I->wait(2);

        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $button_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_top,'20px');
        $button_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals($button_padding_right,'20px');
        $button_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($button_padding_bottom,'20px');
        $button_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-left');
        });
        $I->assertEquals($button_padding_left,'20px');

        $button_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($button_border_bottomleft,'20px');
        $button_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($button_border_bottomright,'20px');
        $button_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($button_border_topleft,'20px');
        $button_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($button_border_topright,'20px');

        $button_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals($button_border_widthtop,'20px');
        $button_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals($button_border_widthright,'20px');
        $button_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals($button_border_widthbottom,'20px');
        $button_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals($button_border_widthleft,'20px');
        
        $button_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-family');
        });
        $selectedfont = "'Abhaya Libre', serif";
        //$I->assertEquals($button_font_family,$selectedfont);

        $button_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals($button_font_weight,800);

        $button_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-style');
        });
        $I->assertEquals($button_font_style,'italic');

        $button_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('text-transform');
        });
        $I->assertEquals($button_text_transform,'uppercase');

        $button_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('line-height');
        });
        $I->assertEquals($button_line_height,'80px');

        $button_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($button_letter_spacing,'5px');
        
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
     

//Check updated values for button without customizer
        $I->amOnPage($PostWithButtonsPage->url);
        $button_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_top,'20px');
        $button_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals($button_padding_right,'20px');
        $button_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($button_padding_bottom,'20px');
        $button_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-left');
        });
        $I->assertEquals($button_padding_left,'20px');

        $button_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($button_border_bottomleft,'20px');
        $button_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($button_border_bottomright,'20px');
        $button_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($button_border_topleft,'20px');
        $button_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($button_border_topright,'20px');

        $button_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals($button_border_widthtop,'20px');
        $button_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals($button_border_widthright,'20px');
        $button_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals($button_border_widthbottom,'20px');
        $button_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals($button_border_widthleft,'20px');
        
        $button_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-family');
        });
        $selectedfont = "'Abhaya Libre', serif";
        //$I->assertEquals($button_font_family,$selectedfont);

        $button_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals($button_font_weight,800);

        $button_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-style');
        });
        $I->assertEquals($button_font_style,'italic');

        $button_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('text-transform');
        });
        $I->assertEquals($button_text_transform,'uppercase');

        $button_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('line-height');
        });
        $I->assertEquals($button_line_height,'80px');

        $button_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($button_letter_spacing,'5px');
    

//Reset values for button with customizer
        $I->amGoingTo('Check values after reset for button with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($PostWithButtonsPage->url);
        $I->click($PostWithButtonsPage->customizeLink);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_buttons);
        $I->click($CustomizerPage->customizer_globalSettings_buttons);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingTop,10);
        //$I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingRight,10);
        //$I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingBottom,10);
        //$I->fillField($CustomizerPage->customizer_globalSettings_buttonsPaddingLeft,10);

        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsRadius,0);
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsWidth,0);
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsFontFamily,"Arial, Helvetica, sans-serif");
        $I->wait(2);
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsFontWeight,"Default");
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsFontStyle,"Normal");
        $I->selectOption($CustomizerPage->customizer_globalSettings_buttonsTextTransform,"Default");
        $I->fillField($CustomizerPage->customizer_globalSettings_buttonsFontSize,'16px');
        $I->click($CustomizerPage->customizer_globalSettings_buttonsLineHeightReset);
        $I->click($CustomizerPage->customizer_globalSettings_buttonsLetterSpacingReset);
        $I->wait(2);

        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
        $I->amOnpage($PostWithButtonsPage->url);
        
        $button_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_top,'10px');
        
        $button_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-right');
        });
        $I->assertEquals($button_padding_right,'10px');

        $button_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($button_padding_bottom,'10px');
        $button_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('padding-top');
        });
        $I->assertEquals($button_padding_left,'10px');

        $button_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($button_border_bottomleft,'0px');
        $button_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($button_border_bottomright,'0px');
        $button_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($button_border_topleft,'0px');
        $button_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($button_border_topright,'0px');

        $button_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-top-width');
        });
        $I->assertEquals($button_border_widthtop,'0px');
        $button_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-right-width');
        });
        $I->assertEquals($button_border_widthright,'0px');
        $button_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-bottom-width');
        });
        $I->assertEquals($button_border_widthbottom,'0px');
        $button_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('border-left-width');
        });
        $I->assertEquals($button_border_widthleft,'0px');
        
        $button_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-family');
        });
        $selectedfont = "Arial, Helvetica, sans-serif";
        $I->assertEquals($button_font_family,$selectedfont);

        $button_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals($button_font_weight,400);

        $button_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('font-style');
        });
        $I->assertEquals($button_font_style,'normal');

        $button_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('text-transform');
        });
        $I->assertEquals($button_text_transform,'none');

        $button_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('line-height');
        });
        $I->assertEquals($button_line_height,'16px');

        $button_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.wp-block-button.alignleft > a'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($button_letter_spacing,'normal');
        
        
    }
}
