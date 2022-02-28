<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\Home;
use \Page\Acceptance\TemplateEdgeCaseNoTitle;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithNoTitleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplateEdgeCaseNoTitle $TemplateEdgeCaseNoTitlePage, Home $HomePage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($HomePage->url);
    	$I->fillField($HomePage->sidebar_search_textbox, 'no title');
        $I->pressKey($HomePage->sidebar_search_textbox,WebDriverKeys::ENTER);
    	//$I->click($HomePage->sidebar_search_submit);
    	$I->see('Search results for: no title');
    	$I->see('This post has no title');
    	$I->see('September 5, 2009');
    	$I->click('September 5, 2009');

    	$I->seeInCurrentUrl($TemplateEdgeCaseNoTitlePage->url);
    	$I->see('This post has no title, but it still must link to the single post view somehow.');
    	$I->see('This is typically done by placing the permalink on the post date.');
    	//$I->amOnPage($TemplateEdgeCaseNoTitlePage->url);

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
