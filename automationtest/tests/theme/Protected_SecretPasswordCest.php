<?php



require_once('Data.php');

class Protected_SecretPasswordCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Password input form displays properly.
When correct password (secret) is entered, the post and comments are displayed.');

$I->amOnPage('/2012/01/04/template-password-protected/');
$I->wait(10);
$I->see('Tags: password, template');
$I->see('This content is password protected. To view it please enter your password below:');
$I->see('Protected: Template: Password Protected (the password is “enter”)');
$I->see('4th January, 2012');
$I->dontSee('This content, comments, pingbacks, and trackbacks should not be visible until the password is entered.');
$I->dontSee('This comment should not be visible until the password is entered.');

$I->fillField('input[name="post_password"]','enter');
$I->click('input[name="Submit"]');
$I->wait(6);
$I->see('This content, comments, pingbacks, and trackbacks should not be visible until the password is entered.');
$I->see('This comment should not be visible until the password is entered.');





// $fff=$I->grabAttributeFrom('#video > div > div > div.__vd_r56th9_video-shim > div > div.__vd_r56th9_play-shim-icon > svg', 'width');







}


}
