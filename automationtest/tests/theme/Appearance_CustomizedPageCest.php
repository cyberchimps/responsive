<?php



require_once('Data.php');

class Appearance_CustomizedPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Appearance Customized Page');
        $name=Data::uniqueName();

$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->moveMouseOver('#menu-appearance');
$I->click('#menu-appearance > ul > li:nth-child(3)');
$I->wait(5);
$I->see('Site Identity');










}


}
