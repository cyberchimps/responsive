<?php
use \Codeception\Util\Locator;




require_once('Data.php');

class Floats_ThumbnailImageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I)
    {


        $I->wantTo('Clearing Floats image test');

$I->amOnPage('/about/clearing-floats/');
$I->wait(10);
$I->see('Clearing Floats');
// float thumbnail image
$I->seeElement(Locator::find('img', ['title' => 'Camera']));

$I->seeElement(Locator::find('img', ['width' => '160']));

$I->seeElement(Locator::find('img', ['class' => 'alignleft size-thumbnail wp-image-827']));





}


}
