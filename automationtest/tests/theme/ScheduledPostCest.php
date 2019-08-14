<?php


require_once '_bootstrap.php';


class ScheduledPostCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function ScheduledPost_Test(AcceptanceTester $I){


$I->wantTo('Test Scheduled post in frontend');
$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->amOnPage('/wp-admin/edit.php');
$I->wait(5);
$I->fillField('#post-search-input','Scheduled');
$I->pressKey('#post-search-input',WebDriverKeys::ENTER);
$I->wait(5);
$I->see('Scheduled');
$I->moveMouseOver('td.title.column-title.has-row-actions.column-primary.page-title > strong > a');
$I->click('Preview');
$I->wait(5);
$I->see('Scheduled');

$I->see('It should not be displayed by the theme.');











}


}
