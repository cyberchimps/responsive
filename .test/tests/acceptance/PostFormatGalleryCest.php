<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PostFormatGallery;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostFormatGalleryCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, PostFormatGallery $PostFormatGalleryPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PostFormatGalleryPage->url);

    	$I->seeElement($PostFormatGalleryPage->image1);
    	$I->seeElement($PostFormatGalleryPage->image2);
    	$I->seeElement($PostFormatGalleryPage->image3);

    	$I->click($PostFormatGalleryPage->image1);
        $I->seeInTitle('canola2');
    	$I->moveBack();

    	$I->click($PostFormatGalleryPage->image2);
    	$I->seeInTitle('dsc20050727_091048_222');
        $I->moveBack();

    	$I->click($PostFormatGalleryPage->image3);
    	$I->seeInTitle('dsc20050813_115856_52');
        $I->moveBack();

    	$I->click($PostFormatGalleryPage->image4);
        $I->seeInTitle('Bell on Wharf');
        $I->moveBack();

        $I->click($PostFormatGalleryPage->image5);
        $I->seeInTitle('Golden Gate Bridge');
        $I->moveBack();

        $I->click($PostFormatGalleryPage->image6);
        $I->seeInTitle('Sunburst Over River');
        $I->moveBack();

        $I->click($PostFormatGalleryPage->image7);
        $I->seeInTitle('Boardwalk');
        $I->moveBack();

        $I->click($PostFormatGalleryPage->image8);
        $I->seeInTitle('Yachtsody in Blue');
        $I->moveBack();

        $I->click($PostFormatGalleryPage->image9);
        $I->seeInTitle('Rain Ripples');
        $I->moveBack();

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
