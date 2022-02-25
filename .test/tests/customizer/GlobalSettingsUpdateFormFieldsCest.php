<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use \Page\Customizer\PostWithButtons;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateFormFieldsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage, PostWithButtons $PostWithButtonsPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

//Check default values for form fields without customizer
    	$I->amGoingTo('Check default values for form fields without customizer');
        $I->amOnPage($HomePage->url);
        $I->seeElement($HomePage->search);
        $search_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals($search_padding_top,'3px');        
        $search_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals($search_padding_right,'3px');
        $search_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($search_padding_bottom,'3px');
        $search_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals($search_padding_left,'3px');

        $search_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($search_border_bottomright,'0px');
        $search_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($search_border_bottomleft,'0px');
        $search_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($search_border_topright,'0px');
        $search_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($search_border_topleft,'0px');

        $search_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        //$I->assertEquals($search_border_widthtop,'1px');
        $search_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        //$I->assertEquals($search_border_widthright,'1px');
        $search_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        //$I->assertEquals($search_border_widthbottom,'1px');
        $search_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        //$I->assertEquals($search_border_widthleft,'1px');
        
        $search_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-family');
        });
        $selectedfont = "Arial, Helvetica, sans-serif";
        $I->assertEquals($search_font_family,$selectedfont);

        $search_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-weight');
        });
        $I->assertEquals($search_font_weight,400);

        $search_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-style');
        });
        $I->assertEquals($search_font_style,'normal');

        $search_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('text-transform');
        });
        $I->assertEquals($search_text_transform,'none');

        $search_fontsize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-size');
        });
        $I->assertEquals($search_fontsize,'16px');

        $search_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('line-height');
        });
        $I->assertEquals($search_line_height,'28px');

        $search_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($search_letter_spacing,'normal');
        
        
//Check default values for form fields with customizer
        $I->amGoingTo('Check default values for form fields with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($HomePage->url);
        $I->amOnPage($CustomizerPage->url);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_formFields);
        $I->click($CustomizerPage->customizer_globalSettings_formFields);
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        
        $search_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals($search_padding_top,'3px');        
        $search_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals($search_padding_right,'3px');
        $search_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($search_padding_bottom,'3px');
        $search_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals($search_padding_left,'3px');

        $search_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($search_border_bottomright,'0px');
        $search_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($search_border_bottomleft,'0px');
        $search_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($search_border_topright,'0px');
        $search_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($search_border_topleft,'0px');

        $search_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        //$I->assertEquals($search_border_widthtop,'1px');
        $search_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        //$I->assertEquals($search_border_widthright,'1px');
        $search_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        //$I->assertEquals($search_border_widthbottom,'1px');
        $search_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        //$I->assertEquals($search_border_widthleft,'1px');
        
        $search_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-family');
        });
        $selectedfont = "Arial, Helvetica, sans-serif";
        $I->assertEquals($search_font_family,$selectedfont);

        $search_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-weight');
        });
        $I->assertEquals($search_font_weight,400);

        $search_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-style');
        });
        $I->assertEquals($search_font_style,'normal');

        $search_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('text-transform');
        });
        $I->assertEquals($search_text_transform,'none');

        $search_fontsize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-size');
        });
        $I->assertEquals($search_fontsize,'16px');

        $search_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('line-height');
        });
        $I->assertEquals($search_line_height,'28px');

        $search_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($search_letter_spacing,'normal');
        

//Check updated values for form fields with customizer
        $I->amGoingTo('Check updated values for form fields with customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($HomePage->url);
        $I->amOnPage($CustomizerPage->url);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_formFields);
        $I->click($CustomizerPage->customizer_globalSettings_formFields);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop);
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop,20);
        //$I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingRight,20);
        //$I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingBottom,20);
        //$I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingLeft,20);

        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsRadius,20);
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsBorderWidth,20);
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsFontFamily,"'Abhaya Libre', serif");
        $I->wait(2);
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsFontWeight,"800");
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsFontStyle,"italic");
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsTextTransform,"uppercase");
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsFontSize,'20px');
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsLineHeight,3);
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsLetterSpacing,5);
        $I->wait(2);

        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(3);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $search_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals($search_padding_top,'20px');
        $search_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals($search_padding_right,'20px');
        $search_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($search_padding_bottom,'20px');
        $search_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals($search_padding_left,'20px');

        $search_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($search_border_bottomleft,'20px');
        $search_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($search_border_bottomright,'20px');
        $search_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($search_border_topleft,'20px');
        $search_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($search_border_topright,'20px');

        $search_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        //$I->assertEquals($search_border_widthtop,'20px');
        $search_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        //$I->assertEquals($search_border_widthright,'20px');
        $search_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        //$I->assertEquals($search_border_widthbottom,'20px');
        $search_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        //$I->assertEquals($search_border_widthleft,'20px');
        
        $search_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-family');
        });
        $selectedfont = "'Abhaya Libre', serif";
        //$I->assertEquals($search_font_family,$selectedfont);

        $search_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-weight');
        });
        $I->assertEquals($search_font_weight,800);

        $search_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-style');
        });
        $I->assertEquals($search_font_style,'italic');

        $search_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('text-transform');
        });
        $I->assertEquals($search_text_transform,'uppercase');

        $search_fontsize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-size');
        });
        $I->assertEquals($search_fontsize,'20px');

        $search_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('line-height');
        });
        //$I->assertEquals($search_line_height,'28.8px');
        $I->assertEquals($search_line_height,'36px');//with increased font size

        $search_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($search_letter_spacing,'5px');
        
        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
     

//Check updated values for button without customizer
        $I->amOnPage($HomePage->url);
        
        $search_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals($search_padding_top,'20px');
        $search_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals($search_padding_right,'20px');
        $search_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($search_padding_bottom,'20px');
        $search_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals($search_padding_left,'20px');

        $search_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($search_border_bottomleft,'20px');
        $search_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($search_border_bottomright,'20px');
        $search_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($search_border_topleft,'20px');
        $search_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($search_border_topright,'20px');

        $search_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        //$I->assertEquals($search_border_widthtop,'20px');
        $search_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        //$I->assertEquals($search_border_widthright,'20px');
        $search_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        //$I->assertEquals($search_border_widthbottom,'20px');
        $search_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        //$I->assertEquals($search_border_widthleft,'20px');
        
        $search_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-family');
        });
        $selectedfont = "'Abhaya Libre', serif";
        //$I->assertEquals($search_font_family,$selectedfont);

        $search_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-weight');
        });
        $I->assertEquals($search_font_weight,800);

        $search_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-style');
        });
        $I->assertEquals($search_font_style,'italic');

        $search_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('text-transform');
        });
        $I->assertEquals($search_text_transform,'uppercase');

        $search_fontsize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-size');
        });
        $I->assertEquals($search_fontsize,'20px');

        $search_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('line-height');
        });
        //$I->assertEquals($search_line_height,'28.8px');
        $I->assertEquals($search_line_height,'36px');//with increased font size

        $search_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($search_letter_spacing,'5px');
    

//Reset values for button with customizer
        $I->amGoingTo('Check values after reset for form fields with customizer');
        $I->amGoingTo('Open Customizer');

        $I->amOnPage($HomePage->url);
        $I->amOnPage($CustomizerPage->url);
        $I->waitForElement($CustomizerPage->customizer_globalSettings);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_formFields);
        $I->click($CustomizerPage->customizer_globalSettings_formFields);
        $I->waitForElement($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop);
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop,3);
        //$I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingRight,3);
        //$I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingBottom,3);
        //$I->fillField($CustomizerPage->customizer_globalSettings_formFieldsPaddingLeft,3);

        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsRadius,0);
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsBorderWidth,1);
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsFontFamily,"Arial, Helvetica, sans-serif");
        $I->wait(2);
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsFontWeight,"Default");
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsFontStyle,"Normal");
        $I->selectOption($CustomizerPage->customizer_globalSettings_formFieldsTextTransform,"Default");
        $I->fillField($CustomizerPage->customizer_globalSettings_formFieldsFontSize,'16px');
        $I->click($CustomizerPage->customizer_globalSettings_formFieldsLineHeightReset);
        $I->click($CustomizerPage->customizer_globalSettings_formFieldsLetterSpacingReset);
        $I->wait(2);

        
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);
        $I->wait(2);
        $I->amOnPage($HomePage->url);
        $I->wait(3);
        
        $search_padding_top = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-top');
        });
        $I->assertEquals($search_padding_top,'3px');        
        $search_padding_right = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-right');
        });
        $I->assertEquals($search_padding_right,'3px');
        $search_padding_bottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-bottom');
        });
        $I->assertEquals($search_padding_bottom,'3px');
        $search_padding_left = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('padding-left');
        });
        $I->assertEquals($search_padding_left,'3px');

        $search_border_bottomright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-right-radius');
        });
        $I->assertEquals($search_border_bottomright,'0px');
        $search_border_bottomleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-left-radius');
        });
        $I->assertEquals($search_border_bottomleft,'0px');
        $search_border_topright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-right-radius');
        });
        $I->assertEquals($search_border_topright,'0px');
        $search_border_topleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-left-radius');
        });
        $I->assertEquals($search_border_topleft,'0px');

        $search_border_widthtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-top-width');
        });
        //$I->assertEquals($search_border_widthtop,'1px');
        $search_border_widthright = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-right-width');
        });
        //$I->assertEquals($search_border_widthright,'1px');
        $search_border_widthbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-bottom-width');
        });
        //$I->assertEquals($search_border_widthbottom,'1px');
        $search_border_widthleft = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('border-left-width');
        });
        //$I->assertEquals($search_border_widthleft,'1px');
        
        $search_font_family = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-family');
        });
        $selectedfont = "Arial, Helvetica, sans-serif";
        $I->assertEquals($search_font_family,$selectedfont);

        $search_font_weight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-weight');
        });
        $I->assertEquals($search_font_weight,400);

        $search_font_style = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-style');
        });
        $I->assertEquals($search_font_style,'normal');

        $search_text_transform = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('text-transform');
        });
        $I->assertEquals($search_text_transform,'none');

        $search_fontsize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('font-size');
        });
        $I->assertEquals($search_fontsize,'16px');

        $search_line_height = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('line-height');
        });
        $I->assertEquals($search_line_height,'28px');

        $search_letter_spacing = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#s'))->getCSSValue('letter-spacing');
        });
        $I->assertEquals($search_letter_spacing,'normal');
        
    }
}
