<?php 
use \Page\Acceptance\TemplatePasswordProtected;
use \Page\Acceptance\KnownErrors;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithPasswordProtectedCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplatePasswordProtected $TemplatePasswordProtectedPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($TemplatePasswordProtectedPage->url);
    	
    	$I->see('This content is password protected. To view it please enter your password below:');
    	$I->fillField($TemplatePasswordProtectedPage->passwordinput,'enter');
    	$I->click($TemplatePasswordProtectedPage->passwordsubmit);
    	$I->see('This content, comments, pingbacks, and trackbacks should not be visible until the password is entered.');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
