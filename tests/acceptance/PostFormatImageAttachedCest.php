<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PostFormatImageAttached;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostFormatImageAttachedCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, PostFormatImageAttached $PostFormatImageAttachedPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PostFormatImageAttachedPage->url);
    	$I->seeElement($PostFormatImageAttachedPage->content);
    	$I->seeElement($PostFormatImageAttachedPage->sidebar);

    	$primary_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($primary_width,'752.391px');

    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');

    	$I->seeElement($PostFormatImageAttachedPage->image);
    	$image_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#post-1158 > div.post-entry > div.entry-content > p:nth-child(3) > a > img'))->getCSSValue('width');
    	});
    	$I->assertEquals($image_width,'604px');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
