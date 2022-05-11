<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\TemplateCommentsDisabled;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithCommentsDisabledCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplateCommentsDisabled $TemplateCommentsDisabledPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($TemplateCommentsDisabledPage->url);
    	$I->dontSee('Leave a Reply');
    	$I->see('Comments Disabled');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
