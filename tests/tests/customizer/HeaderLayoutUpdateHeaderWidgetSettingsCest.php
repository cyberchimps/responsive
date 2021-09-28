<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderLayoutUpdateHeaderWidgetSettingsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

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
    	$I->wait(2);
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
    	$I->wait(2);
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
    }
}
