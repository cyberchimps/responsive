<?php 
use \Page\Acceptance\PageNotFound;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PageNotFoundCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, PageNotFound $PageNotFoundPage)
    {
    	$I->amOnPage($PageNotFoundPage->url);
    	$I->seeElement($PageNotFoundPage->title404);
    	$I->see('404 — Fancy meeting you here!',$PageNotFoundPage->title404);
    	$I->seeElement($PageNotFoundPage->searchForm);
    }
}
