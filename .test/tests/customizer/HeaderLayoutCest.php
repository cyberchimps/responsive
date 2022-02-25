<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderLayoutCest
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

    	//Check default class without customizer
    	$I->amGoingTo('Check Default body Class without customizer');
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->amOnPage($HomaPage->url);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderLayoutVertical);
		//$bodyClass = $I->executeJS('return jQuery("body").hasClass("site-header-site-branding-main-navigation")');
    	//$I->assertEquals($bodyClass,true);

    	//Open Customizer
    	$I->amGoingTo('Open Customizer');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	//Check default customizer values
    	$I->amGoingTo('Check Default body Class within customizer');
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->switchToIFrame();

    	
    	//Update sequence as main navigation & sitebranding
    	//Open Customizer
    	$I->amGoingTo('Update sequence as main navigation & sitebranding');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	$I->wait(1);
    	$I->executeJS('jQuery("#customize-control-responsive_header_elements > label > ul > li:nth-child(2)").prependTo("#customize-control-responsive_header_elements > label > ul")');
    	$I->click($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->wait(1);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);

    	//Update sequence as sitebranding & main navigation
    	//Open Customizer
    	$I->amGoingTo('Update sequence as sitebranding & main navigation');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	$I->wait(1);
    	$I->executeJS('jQuery("#customize-control-responsive_header_elements > label > ul > li:nth-child(2)").prependTo("#customize-control-responsive_header_elements > label > ul")');
    	$I->click($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->wait(1);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	
    	//Hide sitebranding
    	//Open Customizer
    	$I->amGoingTo('Hide sitebranding');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	$I->wait(1);
    	
    	$I->click($CustomizerPage->customizer_header_layout_sitebranding_visibility);
    	$I->wait(1);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderMainNavigation);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderMainNavigation);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);

    	//Unhide sitebranding
    	//Open Customizer
    	$I->amGoingTo('Unhide sitebranding');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	$I->wait(1);
    	
    	$I->click($CustomizerPage->customizer_header_layout_sitebranding_visibility);
    	$I->wait(1);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigation);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->switchToIFrame();
    	$I->executeJS('jQuery("#customize-control-responsive_header_elements > label > ul > li:nth-child(2)").prependTo("#customize-control-responsive_header_elements > label > ul")');
    	$I->click($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->wait(1);
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigation);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);

    	//Hide main navigation
    	//Open Customizer
    	$I->amGoingTo('Hide main navigation');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	$I->wait(1);
    	
    	$I->click($CustomizerPage->customizer_header_layout_mainnavigation_visibility);
    	$I->wait(1);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);

    	//Unhide main navigation
    	//Open Customizer
    	$I->amGoingTo('Unhide main navigation');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_sitebranding);
    	$I->seeElement($CustomizerPage->customizer_header_layout_mainnavigation);
    	$I->wait(1);
    	
    	$I->click($CustomizerPage->customizer_header_layout_mainnavigation_visibility);
    	$I->wait(1);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderSiteBranding);
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);

    	//Update Layout from Horizontal to Vertical
    	//Open Customizer
    	$I->amGoingTo('Update Layout from Horizontal to Vertical');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_dropdown);
    	$I->wait(1);
    	$I->dontSeeElement($CustomizerPage->customizer_header_alignement_dropdown);
    	$I->selectOption($CustomizerPage->customizer_header_layout_dropdown,'Vertical');
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_alignement_dropdown);

    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderAlignmentCenter);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentLeft);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentRight);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);


    	//Update Layout from Vertical to Horizontal
    	//Open Customizer
    	$I->amGoingTo('Update Layout from Vertical to Horizontal');
    	$I->amOnPage($CustomizerPage->url);
    	$I->click($CustomizerPage->customizer_header);
    	$I->wait(1);
    	$I->click($CustomizerPage->customizer_header_layout);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_layout_dropdown);
    	$I->wait(1);
    	$I->seeElement($CustomizerPage->customizer_header_alignement_dropdown);
    	$I->selectOption($CustomizerPage->customizer_header_layout_dropdown,'Horizontal');
    	$I->wait(1);
    	$I->dontSeeElement($CustomizerPage->customizer_header_alignement_dropdown);
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	//$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentLeft);
    	//$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentCenter);
    	//$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentRight);
    	$I->switchToIFrame();
    	//Publish and check changes without customizer
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(1);
    	$I->amOnPage($HomaPage->url);
    	$I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderLayoutVertical);
    	$I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
    	//$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentLeft);
    	//$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentCenter);
    	//$I->dontSeeElement($HomaPage->bodyWithClass_siteHeaderAlignmentRight);
    	

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
    */
    }
}
