<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsLayoutCest
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
    	$I->amGoingTo('Check Default Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->amOnPage($HomaPage->url);
        
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);

        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);


		//$bodyClass = $I->executeJS('return jQuery("body").hasClass("site-header-site-branding-main-navigation")');
    	//$I->assertEquals($bodyClass,true);

        
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_width);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_containerWidth);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxRadius);
        
        //Check default class with customizer
        $I->amGoingTo('Check Default Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");

        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);

        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);

        $I->switchToIFrame();
        
    }
}
