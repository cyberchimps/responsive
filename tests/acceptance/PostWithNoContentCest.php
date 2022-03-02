<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\TemplateEdgeCaseNoContent;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithNoContentCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, TemplateEdgeCaseNoContent $TemplateEdgeCaseNoContentPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($TemplateEdgeCaseNoContentPage->url);
    	$I->seeElement($TemplateEdgeCaseNoContentPage->content);
    	$I->seeElement($TemplateEdgeCaseNoContentPage->sidebar);

    	$primary_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($primary_width,'752.391px');

    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
