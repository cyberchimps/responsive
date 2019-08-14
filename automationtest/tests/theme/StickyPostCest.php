<?php


require_once '_bootstrap.php';


class StickyPostCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function StickyPost_Test(AcceptanceTester $I){


        $I->wantTo('Test Sticky post in frontend');

        $I->amOnPage('/wp-admin');
        $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
        $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->amOnPage('/wp-admin/edit.php');
$I->wait(5);
$I->fillField('#post-search-input','Sticky');
$I->pressKey('#post-search-input',WebDriverKeys::ENTER);
$I->wait(5);
$I->see('Sticky');
$I->moveMouseOver('td.title.column-title.has-row-actions.column-primary.page-title > strong > a');
$I->click('View');
$I->wait(5);
$I->see('Template: Sticky');
$I->see('This is a sticky post.');
$I->see('Theme Buster');
$I->see('7th January, 2012');
$I->see('Classic, Uncategorized');













}


}
