<?php
use \Codeception\Util\Locator;




require_once('Data.php');

class Captioned_Image_AlignmentCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I)
    {


        $I->wantTo('Captioned Image Alignment Tests
Images are aligned properly: Center, Left, Right, None.
Check caption styles on first image.
Images should not have a border unless it is part of design');

$I->amOnPage('/about/page-image-alignment/');
$I->wait(10);
$I->see('The image above happens to be centered.');
$I->see('The rest of this paragraph is filler for the sake of seeing the text wrap around the 150×150 image, which is left aligned.');
$I->see('And just when you thought we were done, we’re going to do them all over again with captions!');
// Align Center image
$I->seeElement(Locator::find('img', ['title' => 'Image Alignment 580x300']));
$I->seeElement(Locator::find('img', ['alt' => 'Image Alignment 580x300']));

$I->seeElement(Locator::find('img', ['width' => '580']));
$I->seeElement(Locator::find('img', ['height' => '300']));

$I->see('Look at 580×300 getting some caption love.');


// Align Left  image
$I->seeElement(Locator::find('img', ['title' => 'Image Alignment 150x150']));
$I->seeElement(Locator::find('img', ['alt' => 'Image Alignment 150x150']));

$I->seeElement(Locator::find('img', ['width' => '150']));
$I->seeElement(Locator::find('img', ['height' => '150']));


$I->see('Bigger caption than the image usually is.');


//And now for a massively large image. It also has no alignment.

$I->seeElement(Locator::find('img', ['title' => 'Image Alignment 1200x400']));
$I->seeElement(Locator::find('img', ['alt' => 'Image Alignment 1200x400']));

$I->seeElement(Locator::find('img', ['width' => '1200']));
$I->seeElement(Locator::find('img', ['height' => '400']));
$I->see('Comment for massive image for your eyeballs.');




// Align Right  image
$I->seeElement(Locator::find('img', ['title' => 'Image Alignment 300x200']));
$I->seeElement(Locator::find('img', ['alt' => 'Image Alignment 300x200']));

$I->seeElement(Locator::find('img', ['width' => '300']));
$I->seeElement(Locator::find('img', ['height' => '200']));

// $I->seeElement(Locator::find('img', ['class' => 'size-full wp-image-905 ']));
$I->see('Feels good to be right all the time.');




}


}
