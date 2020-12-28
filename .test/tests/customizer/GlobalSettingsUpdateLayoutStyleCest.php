<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateLayoutStyleCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

		//$bodyClass = $I->executeJS('return jQuery("body").hasClass("site-header-site-branding-main-navigation")');
    	//$I->assertEquals($bodyClass,true);
        
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);

        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxRadius);

//Update Boxed to Content Boxed
        $I->selectOption($CustomizerPage->customizer_globalSettings_layout_style,'content-boxed');
    	$I->wait(2);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxRadius);
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);

        //Check updated Boxed to Content Boxed class without customizer
		$I->amGoingTo('Check Updated Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);


//Update Content Boxed to Flat
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->selectOption($CustomizerPage->customizer_globalSettings_layout_style,'flat');
        $I->wait(2);
        $I->dontSeeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);
        $I->dontSeeElement($CustomizerPage->customizer_globalSettings_layout_boxRadius);
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);

        //Check updated Width to Full Width class without customizer
        $I->amGoingTo('Check Updated Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);




//RESET Flat to Content Boxed

        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_style);
        $I->selectOption($CustomizerPage->customizer_globalSettings_layout_style,'boxed');
        $I->wait(2);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_boxRadius);
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);

        //Check updated Width to Full Width class without customizer
        $I->amGoingTo('Check Updated Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleBoxed);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleFlat);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteStyleContentBoxed);
        
    }
}