<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\TemplateComments;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithCommentsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplateComments $TemplateCommentsPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($TemplateCommentsPage->url);
    	$I->wait(2);

    	$I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);

    }
}
