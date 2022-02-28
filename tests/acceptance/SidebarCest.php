<?php
use \Page\Acceptance\KnownErrors;
 use \Page\Acceptance\Login;
 use \Page\Acceptance\Home;
 use Codeception\Module\WebDriver;
 use Codeception\Module\Assert;
class SidebarCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Login $LoginPage, Home $HomePage,KnownErrors $KnownErrorsPage){
    	//$I->amOnPage($LoginPage->url);
    	$I->amOnPage($HomePage->url);

        $I->seeElement($HomePage->sidebar);
    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');

        $I->seeElement($HomePage->sidebar_search);
        $sidebar_search_padding = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#search-2'))->getCSSValue('padding');
        });
        $I->assertEquals($sidebar_search_padding,'30px');
    	
    	$I->seeElement($HomePage->sidebar_recentposts);
        $sidebar_recentposts_padding = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#recent-posts-2'))->getCSSValue('padding');
        });
        $I->assertEquals($sidebar_recentposts_padding,'30px');

    	$I->seeElement($HomePage->sidebar_recentcomments);
        $sidebar_recentcomments_padding = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#recent-comments-2'))->getCSSValue('padding');
        });
        $I->assertEquals($sidebar_recentcomments_padding,'30px');

    	$I->seeElement($HomePage->sidebar_archives);
        $sidebar_archives_padding = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#archives-2'))->getCSSValue('padding');
        });
        $I->assertEquals($sidebar_archives_padding,'30px');

    	$I->seeElement($HomePage->sidebar_categories);
        $sidebar_categories_padding = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#categories-2'))->getCSSValue('padding');
        });
        $I->assertEquals($sidebar_categories_padding,'30px');

    	$I->seeElement($HomePage->sidebar_meta);
        $sidebar_meta_padding = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#meta-2'))->getCSSValue('padding');
        });
        $I->assertEquals($sidebar_meta_padding,'30px');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
