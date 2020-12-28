<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderTypographyCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
        /*
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check default values without customizer
        //Site Title
    	$I->amGoingTo('Check Default Header Colors without customizer');
    	$I->amOnPage($HomaPage->url);
    	$I->seeElement($HomaPage->header);

        $siteTitleFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Arial, Helvetica, sans-serif',$siteTitleFontFamily);

        $siteTitleFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('700',$siteTitleFontWeight);

        $siteTitleFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('normal',$siteTitleFontStyle);

        $siteTitleFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('20px',$siteTitleFontSize);

        $siteTitleLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('line-height');
        });
        $I->assertEquals('28px',$siteTitleLineHeight);
        //Site Tagline
        $siteTaglineFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-family');
        });
        $I->assertEquals('Arial, Helvetica, sans-serif',$siteTaglineFontFamily);

        $siteTaglineFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-weight');
        });
        $I->assertEquals('400',$siteTaglineFontWeight);

        $siteTaglineFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-style');
        });
        $I->assertEquals('normal',$siteTaglineFontStyle);

        $siteTaglineFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-size');
        });
        $I->assertEquals('13px',$siteTaglineFontSize);

        $siteTaglineLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('line-height');
        });
        $I->assertEquals('28px',$siteTaglineLineHeight);

        //Update Typography values in customizer
        //Open Customizer
        $I->amGoingTo('Update Typography values in customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_typoraphy);
        $I->wait(1);

        //Site Title
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontFamily);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_FontFamily,'Actor');
        
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontWeight);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_FontWeight,'Black: 900');
        
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontStyle);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_FontStyle,'Italic');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_TextTransform);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_TextTransform,'Uppercase');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontSize);
        $I->fillField($CustomizerPage->customizer_header_typography_SiteTitle_FontSize,'30px');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_LineHeight);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTitle_LineHeight,'4');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_LetterSpacing);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTitle_LetterSpacing,'10');
        
        //Site Tagline
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontFamily);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_FontFamily,'Actor');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontWeight);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_FontWeight,'Black: 900');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontStyle);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_FontStyle,'Italic');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_TextTransform);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_TextTransform,'Uppercase');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontSize);
        $I->fillField($CustomizerPage->customizer_header_typography_SiteTagline_FontSize,'30px');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_LineHeight);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTagline_LineHeight,'4');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_LetterSpacing);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTagline_LetterSpacing,'10');
        $I->wait(2);

        //Check updated values in customizer
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $siteTitleFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Actor, sans-serif',$siteTitleFontFamily);

        $siteTitleFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('900',$siteTitleFontWeight);

        $siteTitleFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('italic',$siteTitleFontStyle);

        $siteTitleFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('30px',$siteTitleFontSize);

        $siteTitleLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('line-height');
        });
        //$I->assertEquals('80px',$siteTitleLineHeight);
        //Site Tagline
        $siteTaglineFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-family');
        });
        $I->assertEquals('Actor, sans-serif',$siteTaglineFontFamily);

        $siteTaglineFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-weight');
        });
        $I->assertEquals('900',$siteTaglineFontWeight);

        $siteTaglineFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-style');
        });
        $I->assertEquals('italic',$siteTaglineFontStyle);

        $siteTaglineFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-size');
        });
        $I->assertEquals('30px',$siteTaglineFontSize);

        $siteTaglineLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('line-height');
        });
        //$I->assertEquals('80px',$siteTaglineLineHeight);

        //Check updated values without customizer
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check updated values without customizer');
        $I->amOnPage($HomaPage->url);
        $siteTitleFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-family');
        });
        $I->assertEquals('Actor, sans-serif',$siteTitleFontFamily);

        $siteTitleFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-weight');
        });
        $I->assertEquals('900',$siteTitleFontWeight);

        $siteTitleFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-style');
        });
        $I->assertEquals('italic',$siteTitleFontStyle);

        $siteTitleFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('font-size');
        });
        $I->assertEquals('30px',$siteTitleFontSize);

        $siteTitleLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-title > a'))->getCSSValue('line-height');
        });
        //$I->assertEquals('80px',$siteTitleLineHeight);
        //Site Tagline
        $siteTaglineFontFamily = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-family');
        });
        $I->assertEquals('Actor, sans-serif',$siteTaglineFontFamily);

        $siteTaglineFontWeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-weight');
        });
        $I->assertEquals('900',$siteTaglineFontWeight);

        $siteTaglineFontStyle = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-style');
        });
        $I->assertEquals('italic',$siteTaglineFontStyle);

        $siteTaglineFontSize = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('font-size');
        });
        $I->assertEquals('30px',$siteTaglineFontSize);

        $siteTaglineLineHeight = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('line-height');
        });
        //$I->assertEquals('80px',$siteTaglineLineHeight);

        //Reset values to default
        $I->amGoingTo('Reset Typography values in customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_typoraphy);
        $I->wait(1);

        //Site Title
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontFamily);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_FontFamily,'Arial, Helvetica, sans-serif');
        
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontWeight);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_FontWeight,'Default');
        
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontStyle);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_FontStyle,'Normal');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_TextTransform);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTitle_TextTransform,'Default');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_FontSize);
        $I->fillField($CustomizerPage->customizer_header_typography_SiteTitle_FontSize,'20px');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_LineHeight);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTitle_LineHeight,'4');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTitle_LetterSpacing);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTitle_LetterSpacing,'10');
        
        //Site Tagline
        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontFamily);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_FontFamily,'Arial, Helvetica, sans-serif');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontWeight);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_FontWeight,'Default');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontStyle);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_FontStyle,'Normal');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_TextTransform);
        $I->selectOption($CustomizerPage->customizer_header_typography_SiteTagline_TextTransform,'Default');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_FontSize);
        $I->fillField($CustomizerPage->customizer_header_typography_SiteTagline_FontSize,'13px');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_LineHeight);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTagline_LineHeight,'4');

        $I->seeElement($CustomizerPage->customizer_header_typography_SiteTagline_LetterSpacing);
        //$I->fillField($CustomizerPage->customizer_header_typography_SiteTagline_LetterSpacing,'10');
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->wait(2);
        */

    }
}
