<?php 
use \Page\Acceptance\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class ScheduledPostCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Home $HomePage)
    {
    	$I->amOnPage($HomePage->url);
    	$I->seeElement($HomePage->sidebar_search_textbox);
    	$I->fillField($HomePage->sidebar_search_textbox, 'Scheduled');
        $I->pressKey($HomePage->sidebar_search_textbox,WebDriverKeys::ENTER);
    	//$I->click($HomePage->sidebar_search_submit);

    	$I->see('Search results for: Scheduled');
    	$I->see('Your search for Scheduled did not match any entries.');
    }
}
