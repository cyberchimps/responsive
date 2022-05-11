<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderLayoutUpdateBrandingNavigationSequenceCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);
    	
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
        $I->wait(3);
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
    	$I->wait(3);
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
    }
}
