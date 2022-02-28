<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderLayoutHideUnhideElementsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

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
    	$I->dontSeeElement($HomaPage->bodyWithClass_SiteHeaderMainNavigationSiteBranding);
    	$I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);

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
        
    }
}
