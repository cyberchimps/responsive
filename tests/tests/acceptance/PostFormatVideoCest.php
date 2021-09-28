<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PostFormatVideoYoutube;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostFormatVideoCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, PostFormatVideoYoutube $PostFormatVideoYoutubePage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PostFormatVideoYoutubePage->url);

    	$I->seeElement($PostFormatVideoYoutubePage->content);
    	$I->see('Post Format: Video (YouTube)');
    	$content_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($content_width,'752.391px');

    	$I->seeElement($PostFormatVideoYoutubePage->sidebar);
    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');

    	$I->seeElement($PostFormatVideoYoutubePage->youtubeiframe);

    	//$url = $I->executeJS('return jQuery(location).attr("href");');
    	//$I->executeJS('return jQuery("iframe").attr("name", "youtubeiframe");');
	    //$I->switchToIFrame('youtubeiframe');
	    
	    //$I->switchToIFrame(); // switch back to main window

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
	    

    }
}
