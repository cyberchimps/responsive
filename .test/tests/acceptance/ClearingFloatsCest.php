<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\ClearingFloats;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;
class ClearingFloatsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, ClearingFloats $ClearingFloatsPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($ClearingFloatsPage->url);
    	
        $I->seeElement($ClearingFloatsPage->lastImage);
        $lastElement_clear = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.pagination'))->getCSSValue('clear');
        });
        $I->assertEquals($lastElement_clear,'both');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
