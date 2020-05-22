<?php 
use \Page\Acceptance\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class StickyPostAndNavigationCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Home $HomePage)
    {
    	$I->amOnPage($HomePage->url);
    	$I->seeElement($HomePage->sticky);
    	$I->seeElement($HomePage->stickyPost);
    	$I->see('Template: Sticky',$HomePage->stickyPost);

    	$I->scrollTo($HomePage->navlinks);
    	$I->click($HomePage->nav2);
    	$I->see('Block category: Layout Elements');

    	$I->amOnPage($HomePage->url);
    	$I->scrollTo($HomePage->navlinks);
    	$I->click($HomePage->nav3);
    	$I->see('Template: More Tag');
    }
}
