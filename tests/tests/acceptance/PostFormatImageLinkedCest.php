<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PostFormatImageLinked;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostFormatImageLinkedCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, PostFormatImageLinked $PostFormatImageLinkedPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PostFormatImageLinkedPage->url);
    	$I->seeElement($PostFormatImageLinkedPage->content);
    	$I->seeElement($PostFormatImageLinkedPage->sidebar);

    	$primary_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($primary_width,'752.391px');

    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');

    	$I->seeElement($PostFormatImageLinkedPage->image);
    	$image_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#attachment_612 > a > img'))->getCSSValue('width');
    	});
    	$I->assertEquals($image_width,'618.469px');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
