<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderLayoutDefaultValuesCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
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
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetAlignmentSpread);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetPositionTop);

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

        $I->seeElement($HomaPage->bodyWithClass_headerWidgetAlignmentSpread);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetPositionTop);
        
        $I->switchToIFrame();
    }
}
