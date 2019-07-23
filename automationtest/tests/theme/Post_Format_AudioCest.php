<?php



require_once('Data.php');

class Post_Format_AudioCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Post Format Test: Audio Enclosure links work properly.');

$I->amOnPage('/2010/07/02/post-format-audio/');
$I->wait(10);
$I->see('Post Format: Audio');
$I->see('2nd July, 2010');
$I->see('Classic, Post Formats');
$I->see('Link:');

$I->see('St. Louis Blues');

$I->see('Audio shortcode:');
$I->click('St. Louis Blues');
$I->seeInCurrentUrl('/wp-content/uploads/2012/07/originaldixielandjazzbandwithalbernard-stlouisblues.mp3');


$I->closeTab();









}


}
