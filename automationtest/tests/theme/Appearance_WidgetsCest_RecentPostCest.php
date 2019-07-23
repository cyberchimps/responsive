<?php



require_once('Data.php');
require_once '_bootstrap.php';


class Appearance_WidgetsCest_RecentPostCest
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
$I->click('#widget-19_recent-posts-2 > div.widget-top > div.widget-title.ui-sortable-handle > h3');
$I->wait(5);

$I->fillField('#widget-recent-posts-2-title','Your are watching currently updated  recent post');
$I->click('#widget-recent-posts-2-savewidget');
$I->wait(5);
$I->amOnPage('/blog/');
$I->wait(5);
$I->see('Your are watching currently updated  recent post');
$I->amOnPage('/wp-admin/widgets.php');
$I->wait(5);
$I->click('#widget-19_recent-posts-2 > div.widget-top > div.widget-title.ui-sortable-handle > h3');
$I->wait(5);

$I->clearField('#widget-recent-posts-2-title');
$I->click('#widget-recent-posts-2-savewidget');
$I->wait(5);
$I->amOnPage('/blog/');
$I->wait(5);
$I->dontSee('Your are watching currently updated  recent post');













}


}
