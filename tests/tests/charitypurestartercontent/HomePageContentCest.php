<?php 
use \Page\Charitypurestartercontent\AdminLogin;
use \Page\Charitypurestartercontent\Customizer;
use \Page\Charitypurestartercontent\StarterContentHome;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HomePageContentCest
{
    public function _before(CharitypurestartercontentTester $I)
    {
    }

    // tests
    public function tryToTest(CharitypurestartercontentTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, StarterContentHome $StarterContentHomePage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check Default Homepage Without Customizer
    	$I->amOnPage('/');
    	$I->see('Hello world!');
    	$I->see('Recent Posts');
    	$I->see('Recent Comments');
    	$I->see('Archives');
    	$I->see('Categories');
    	$I->see('Meta');

    	//Check Homepage With Customizer
    	$I->amGoingTo('Open Customizer');
    	$I->amOnPage($CustomizerPage->url);

    	$I->click($CustomizerPage->hideCustomizer);
    	$I->amGoingTo('Check Starter Content within customizer');
    	$I->executeJS('jQuery("iframe").attr("name", "new_name")');
    	$I->switchToIFrame("new_name");
    	$I->dontSee('Hello world!');
    	
    	$I->seeElement($StarterContentHomePage->navigation);
    	$I->seeInSource($StarterContentHomePage->heroBGImage);
    	foreach ($StarterContentHomePage->strings as $key => $value) {
    		$I->see($value);
    	}
    	$I->switchToIFrame();
    	
    	$I->amGoingTo('Publish Starter Content');
    	$I->click($CustomizerPage->unHideCustomizer);
    	$I->wait(2);
    	$I->click($CustomizerPage->publishButton);
    	$I->wait(10);
    	
    	//Check Homepage Without Customizer
    	$I->amOnPage('/');
    	$I->seeElement($StarterContentHomePage->navigation);
    	$I->seeInSource($StarterContentHomePage->heroBGImage);
    	foreach ($StarterContentHomePage->strings as $key => $value) {
    		$I->see($value);
    	}
    }
}