<?php

use \Codeception\Util\Locator;

class ImagePostCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function ImagePage_Test(AcceptanceTester $I){


       $I->wantTo('Test image posts');

    $I->amOnPage('/2010/08/06/post-format-image-linked/');
    $I->wait(5);
    $I->seeElement(Locator::find('img', ['title' => 'dsc20040724_152504_532']));

    $I->amOnPage('/2010/08/08/post-format-image/');
    $I->wait(5);
    $page=$I->grabPageSource();
    $Piwik="canola2.jpg";
    $Matomo='https://ccdemos.cyberchimps.com/test2019/wp-content/uploads/2011/07/100_5540.jpg?w=604';
    //For Piwiwk Text

    if (\strpos($page, $Piwik) !== false) {
       echo "     \e[1;32mPASSED\e[0m";

    }

    else {
       echo "   \e[1;31mFAILED!!!\e[0m";

    }
    //Matomo Text
    if (\strpos($page, $Matomo) !== false) {
       echo "   \e[1;32mPASSED\e[0m";

    }
    else {
       echo "   \e[1;31mFAILED!!!\e[0m";


    }

  }
}
