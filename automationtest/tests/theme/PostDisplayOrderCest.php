<?php
use \Codeception\Util\Locator;

require_once('Data.php');



class PostDisplayOrderCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function DraftPost_Test(AcceptanceTester $I){
        $name=Data::uniqueName();


        $I->wantTo('Create post With Long Title test');

$I->amOnPage('/');

$I->wait(5);
$I->see('TEMPLATE: STICKY');
$I->see('LONG POST TITLE WITH LONG NON-BREAKING STRING: IF YOU SAY IT LOUD ENOUGH, YOU’LL ALWAYS SOUND PRECOCIOUS; SUPERCALIFRAGILISTICEXPIALIDOCIOUS!');
$I->see('HELLO WORLD!');
$I->see('BLOCK: IMAGE');
$I->see('BLOCK: COVER');


// $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
// $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
// $I->click('#wp-submit');
// $I->wait(5);
// $I->amOnPage('/wp-admin/edit.php');
// $I->wait(5);
// $I->click('Add New');
// $I->wait(5);
// $I->fillField('#post-title-0', 'Long Post Title with long non-breaking string: If you say it loud enough, you’ll always sound precocious; Supercalifragilisticexpialidocious!');
// $I->click('Publish');
//
// $I->wait(16);
//





}


}
