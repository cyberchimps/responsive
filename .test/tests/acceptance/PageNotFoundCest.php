<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PageNotFound;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PageNotFoundCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, PageNotFound $PageNotFoundPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PageNotFoundPage->url);
    	$I->seeElement($PageNotFoundPage->title404);
    	$I->see('404 — Fancy meeting you here!',$PageNotFoundPage->title404);
    	$I->seeElement($PageNotFoundPage->searchForm);

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
