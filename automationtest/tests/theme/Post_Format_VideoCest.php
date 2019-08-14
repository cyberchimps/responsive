<?php



require_once('Data.php');

class Post_Format_VideoCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Post Format Test: Audio Enclosure links work properly.');

$I->amOnPage('/2010/06/03/post-format-video-wordpresstv/');
$I->wait(10);
$I->see('Post Format: Video (WordPress.tv)');
$I->see('3rd June, 2010');
$I->see('Classic, Post Formats');
$I->see('Tags: embeds, Post Formats, video, wordpress.tv');

$I->see('Posted as per the instructions in the Codex.');
// $I->seeElement(Locator::find('svg', ['height' => '120']));
// $I->seeElement(Locator::find('svg', ['width' => '120']));

// $fff=$I->grabAttributeFrom('#video > div > div > div.__vd_r56th9_video-shim > div > div.__vd_r56th9_play-shim-icon > svg', 'width');







}


}
