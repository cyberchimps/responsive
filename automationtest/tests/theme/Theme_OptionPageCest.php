<?php


require_once '_bootstrap.php';

require_once('Data.php');

class Theme_OptionPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Theme Option Page');
        $name=Data::uniqueName();

        $I->amOnPage('/wp-admin');
        $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
        $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->amOnPage('/wp-admin/themes.php?page=cyberchimps-theme-options');
$I->wait(10);
$I->click('#cyberchimps_header_heading-tab > span');
$I->wait(5);

$I->see('Header Options');










}


}
