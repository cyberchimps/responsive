<?php


require_once '_bootstrap.php';

require_once('Data.php');

class FooterWidgetsDisplayCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('All widgets display correctly.');

$I->amOnPage('/level-1/');
$I->wait(10);
$I->scrollTo('#footer-widget-container > div > aside:nth-child(2) > h3');
$I->see('ARCHIVES');
$I->see('CATEGORIES');
$I->see('WORDPRESS');
$I->wait(10);
$I->amOnPage('/wp-admin/');

$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);

$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->amOnPage('/wp-admin/widgets.php');

$I->dragAndDrop('#widget-9_meta-__i__ > div.widget-top > div.widget-title.ui-draggable-handle > h3','#cyberchimps-footer-widgets > div > h2');
$I->wait(15);
$I->amOnPage('/level-1/');

$I->scrollTo('#footer-widget-container > div > aside > h3');

$I->see('META');
// $I->amOnPage('/wp-admin/');
//
// $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
//
// $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
// $I->click('#wp-submit');
// $I->wait(5);
//
// $I->amOnPage('/wp-admin/widgets.php');
//
// $I->click('#cyberchimps-footer-widgets > div.sidebar-name > h2');
// $I->click('div.widget-top > div.widget-title.ui-sortable-handle > h3');
// $I->click('Delete');







}


}
