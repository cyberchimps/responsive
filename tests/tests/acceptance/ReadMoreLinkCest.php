<?php 
use \Page\Acceptance\Home;
use \Page\Acceptance\TemplateSticky;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class ReadMoreLinkCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Home $HomePage, TemplateSticky $TemplateStickyPage)
    {
    	$I->amOnPage($HomePage->url);
    	$I->seeElement($HomePage->sticky);
    	$I->seeElement($HomePage->stickyPostReadMore);
    	$I->click($HomePage->stickyPostReadMore);

    	$I->see('Template: Sticky',$TemplateStickyPage->stickyTitle);
    	$I->see('This is a sticky post.',$TemplateStickyPage->stickyText);
    }
}
