<?php 
use \Page\Acceptance\TemplateCommentsDisabled;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithCommentsDisabledCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplateCommentsDisabled $TemplateCommentsDisabledPage)
    {
    	$I->amOnPage($TemplateCommentsDisabledPage->url);
    	$I->dontSee('Leave a Reply');
    	$I->see('Comments Disabled');
    }
}
