<?php 
use \Page\Acceptance\TemplateComments;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithCommentsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplateComments $TemplateCommentsPage)
    {
    	$I->amOnPage($TemplateCommentsPage->url);
    	$I->wait(2);

    }
}
