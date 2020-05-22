<?php 
use \Page\Acceptance\TemplateEdgeCaseLongTitle;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithLongTitleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,TemplateEdgeCaseLongTitle $TemplateEdgeCaseLongTitlePage)
    {
    	$I->amOnPage($TemplateEdgeCaseLongTitlePage->url);
    	$I->see('Taumatawhakatangihangakoauauotamateaturipukakapikimaungahoronukupokaiwhenuakitanatahu');
    	$I->seeElement($TemplateEdgeCaseLongTitlePage->content);
    	$I->see('Title should not overflow the content area');
    	$content_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($content_width,'752.391px');
    	$I->seeElement($TemplateEdgeCaseLongTitlePage->sidebar);
    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');
    }
}
