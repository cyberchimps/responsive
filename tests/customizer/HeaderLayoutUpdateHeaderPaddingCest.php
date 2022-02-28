<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderLayoutUpdateHeaderPaddingCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check default header padding
    	$I->amOnPage($HomaPage->url);
    	$site_branding_wrapper_paddingtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-top');
    	});
		$I->assertEquals($site_branding_wrapper_paddingtop,'28px');
		$site_branding_wrapper_paddingbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-bottom');
    	});
		$I->assertEquals($site_branding_wrapper_paddingbottom,'28px');

    	//Update Header padding from 
    	//Open Customizer
    	$I->amGoingTo('Update Header paddning');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_dropdown);
    	$I->wait(1);
    	//$I->seeElement($CustomizerPage->header_padding_top);
    	$I->fillField($CustomizerPage->header_padding_top,'20px');
    	$I->fillField($CustomizerPage->header_padding_right,'20px');
    	$I->fillField($CustomizerPage->header_padding_bottom,'20px');
    	$I->fillField($CustomizerPage->header_padding_left,'20px');
    	$I->wait(1);
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(2);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See header padding 20px for all sides');
    	/*
    	$site_branding_wrapper_paddingtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-top');
    	});
		$I->assertEquals($site_branding_wrapper_paddingtop,'20px');
		$site_branding_wrapper_paddingbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-bottom');
    	});
		$I->assertEquals($site_branding_wrapper_paddingbottom,'20px');
		$site_branding_wrapper_paddingtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-top');
    	});
		$I->assertEquals($site_branding_wrapper_paddingtop,'20px');
		$site_branding_wrapper_paddingbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-bottom');
    	});
		$I->assertEquals($site_branding_wrapper_paddingbottom,'20px');
		*/
    	
    	//Check updated passing without customizer
    	$I->amOnPage($HomaPage->url);
    	$site_branding_wrapper_paddingtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-top');
    	});
		$I->assertEquals($site_branding_wrapper_paddingtop,'20px');
		$site_branding_wrapper_paddingbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-bottom');
    	});
		$I->assertEquals($site_branding_wrapper_paddingbottom,'20px');
		$site_branding_wrapper_paddingtop = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-top');
    	});
		$I->assertEquals($site_branding_wrapper_paddingtop,'20px');
		$site_branding_wrapper_paddingbottom = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#masthead > .container > .row > .site-branding > .site-branding-wrapper'))->getCSSValue('padding-bottom');
    	});
		$I->assertEquals($site_branding_wrapper_paddingbottom,'20px');
		$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_dropdown);
    	$I->wait(1);
    	//$I->seeElement($CustomizerPage->header_padding_top);
    	$I->fillField($CustomizerPage->header_padding_top,'28px');
    	$I->fillField($CustomizerPage->header_padding_right,'0px');
    	$I->fillField($CustomizerPage->header_padding_bottom,'28px');
    	$I->fillField($CustomizerPage->header_padding_left,'0px');
    	$I->wait(1);
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(2);
    }
}
