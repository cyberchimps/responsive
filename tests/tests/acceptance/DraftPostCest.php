<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class DraftPostCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Home $HomePage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($HomePage->url);
    	$I->seeElement($HomePage->sidebar_search_textbox);
    	$I->fillField($HomePage->sidebar_search_textbox, 'Draft');
        $I->pressKey($HomePage->sidebar_search_textbox,WebDriverKeys::ENTER);
    	//$I->click($HomePage->sidebar_search_submit);

    	$I->see('Search results for: Draft');
    	$I->see('Your search for Draft did not match any entries.');
        $I->wait(3);

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
