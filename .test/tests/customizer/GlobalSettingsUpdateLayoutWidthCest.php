<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsUpdateLayoutWidthCest
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
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_width);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_containerWidth);
    
        //Update Width to Full Width
        $I->selectOption($CustomizerPage->customizer_globalSettings_layout_width,'full-width');
    	$I->wait(2);
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->waitForElement($CustomizerPage->publishedButton);

        //Check updated Width to Full Width class without customizer
		$I->amGoingTo('Check Updated Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->amOnPage($HomaPage->url);
        $I->waitForElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);


//RESET LAYOUT TO CONTAINED


        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_layout_width);
        $I->dontSeeElement($CustomizerPage->customizer_globalSettings_layout_containerWidth);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);

        //Update Width to Contained
        $I->selectOption($CustomizerPage->customizer_globalSettings_layout_width,'contained');
    	$I->wait(2);
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        $I->switchToIFrame();
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
		$I->waitForElement($CustomizerPage->publishedButton);
        //Check updated Width to Full Width class without customizer
		$I->amGoingTo('Check Updated Global Setting Options Within Customizer');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->bodyWithClass_ResponsiveSiteContained);
        $I->dontSeeElement($HomaPage->bodyWithClass_ResponsiveSiteFullWidth);
        
    }
}