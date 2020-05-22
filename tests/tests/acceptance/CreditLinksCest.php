<?php 
use \Page\Acceptance\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class CreditLinksCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Home $Homepage)
    {
    	$I->amOnPage($Homepage->url);
    	$I->scrollTo($Homepage->footercredits);
    	$I->seeElement($Homepage->footercredits);
    	$I->see('Powered by Responsive Theme');
    	$I->seeElement($Homepage->footercreditslink);
    	$I->click($Homepage->footercreditslink);
       	$url = $I->executeJS('return jQuery(location).attr("href");');
    	$I->assertEquals($url,'https://cyberchimps.com/');
    }
}
