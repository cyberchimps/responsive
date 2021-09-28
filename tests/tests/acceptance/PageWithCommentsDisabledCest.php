<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PageWithCommentsDisabled;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PageWithCommentsDisabledCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,PageWithCommentsDisabled $PageWithCommentsDisabledPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PageWithCommentsDisabledPage->url);
    	$I->dontSee('Leave a Reply');
    	//$I->dontSee('Comments Disabled');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
