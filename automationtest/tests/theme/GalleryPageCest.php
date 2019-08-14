<?php

use \Codeception\Util\Locator;



class GalleryPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function GalleryPage_Test(AcceptanceTester $I){


        $I->wantTo('Test Gallery image');

$I->amOnPage('/2010/09/10/post-format-gallery/');
$I->wait(5);
// $I->seeLink('#gallery-1 > dl:nth-child(1) > dt > a', '/test2019/2010/09/10/post-format-gallery/canola2/');
// $page=$I->grabPageSource();
// $image1="/2010/09/10/post-format-gallery/canola2/";
// $image2='2011/01/dsc20050727_091048_222.jpg';
// //For Piwiwk Text
//
// if (\strpos($page, $image1) !== false) {
//     echo "   image1  \e[1;32mPASSED\e[0m";
//
// }
//
// else {
//     echo " image1  \e[1;31mFAILED!!!\e[0m";
//
// }
// //Matomo Text
// if (\strpos($page, $image2) !== false) {
//     echo "  image2 \e[1;32mPASSED\e[0m";
//
// }
// else {
//     echo " image2  \e[1;31mFAILED!!!\e[0m";
//
//
// }

$I->seeElement(Locator::find('img', ['alt' => 'canola']));
$I->seeElement(Locator::find('img', ['alt' => 'Golden Gate Bridge']));






}


}
