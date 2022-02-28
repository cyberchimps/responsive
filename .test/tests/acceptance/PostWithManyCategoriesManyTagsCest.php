<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\TemplateEdgeCaseManyCategories;
use \Page\Acceptance\TemplateEdgeCaseManyTags;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostWithManyCategoriesManyTagsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function manyCategories(AcceptanceTester $I,TemplateEdgeCaseManyCategories $TemplateEdgeCaseManyCategoriesPage)
    {
    	$I->amOnPage($TemplateEdgeCaseManyCategoriesPage->url);
    	$I->seeElement($TemplateEdgeCaseManyCategoriesPage->content);
    	$content_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($content_width,'752.391px');
    	$I->seeElement($TemplateEdgeCaseManyCategoriesPage->sidebar);
    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');
    	$I->see('asmodeus, broder, buying, Cat A, Cat B, Cat C, championship, chastening, Child 1, Child 2, Child Category 01, Child Category 02, Child Category 03, Child Category 04, Child Category 05, Classic, clerkship, disinclination, disinfection, dispatch, echappee, Edge Case, enphagy, equipollent, fatuity, Foo A, Foo A, Foo Parent, gaberlunzie, Grandchild Category, illtempered, insubordination, lender, Markup, Media, monosyllable, packthread, palter, papilionaceous, Parent, Parent Category, personable, Post Formats, propylaeum, pustule, quartern, scholarship, selfconvicted, showshoe, sloyd, sub, sublunary, tamtam, Unpublished, weakhearted, ween, wellhead, wellintentioned, whetstone, years');
    	$I->see('This post has many categories.');
    }

    public function manyTags(AcceptanceTester $I,TemplateEdgeCaseManyTags $TemplateEdgeCaseManyTagsPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($TemplateEdgeCaseManyTagsPage->url);
    	$I->seeElement($TemplateEdgeCaseManyTagsPage->content);
    	$content_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#primary'))->getCSSValue('width');
    	});
    	$I->assertEquals($content_width,'752.391px');
    	$I->seeElement($TemplateEdgeCaseManyTagsPage->sidebar);
    	$sidebar_width = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
    		return $webdriver->findElement(WebDriverBy::cssSelector('#secondary'))->getCSSValue('width');
    	});
    	$I->assertEquals($sidebar_width,'387.594px');
    	$I->see('Tagged with: 8BIT, alignment, Articles, captions, categories, chat, Codex, comments, content, css, dowork, edge case, embeds, excerpt, Fail, featured image, FTW, Fun, gallery, html, image, jetpack, layout, link, Love, markup, Mothership, Must Read, Nailed It, Pictures, Post Formats, quote, shortcode, standard, Success, Swagger, Tags, template, title, twitter, Unseen, video, videopress, WordPress, wordpress.tv');
    	$I->see('This post has many tags.');

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
