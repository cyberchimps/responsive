<?php


require_once '_bootstrap.php';

require_once('Data.php');

class Appearance_WidgetsCest_SearchCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Appearance WidgetsCest Recent Post');
        $name=Data::uniqueName();

        $I->amOnPage('/wp-admin');
        $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
        $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->amOnPage('/wp-admin/widgets.php');
$I->wait(5);
$I->click('div.widget-top > div.widget-title.ui-sortable-handle > h3');
$I->wait(5);

$I->fillField('#widget-search-2-title','Search result field');
$I->click('#widget-search-2-savewidget');
$I->wait(5);
$I->amOnPage('/blog/');
$I->wait(5);
$I->see('Search result field');
$I->amOnPage('/wp-admin/widgets.php');
$I->wait(5);
$I->click('div.widget-top > div.widget-title.ui-sortable-handle > h3');
$I->wait(5);

$I->clearField('#widget-search-2-title');
$I->click('#widget-search-2-savewidget');
$I->wait(5);
$I->amOnPage('/blog/');
$I->wait(5);
$I->dontSee('Search result field');













}


}
