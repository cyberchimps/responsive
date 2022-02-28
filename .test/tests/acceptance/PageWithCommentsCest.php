<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PageWithComments;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PageWithCommentsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,PageWithComments $PageWithCommentsPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PageWithCommentsPage->url);
    	$I->see('Leave a Reply');
    	$I->dontSee('Comments Disabled');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
