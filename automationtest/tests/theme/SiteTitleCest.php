<?php




class SiteTitleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Site_Title_Test(AcceptanceTester $I){



$I->amOnPage('/wp-admin/');
$I->fillField('#user_login','admin');

$I->fillField('#user_pass','rupesh1395');
$I->click('#wp-submit');
$I->wait(5);
$I->click('#menu-settings > a > div.wp-menu-name');
$I->wait(5);
$I->fillField('#blogname','Move mouse over the first element matched by the given locator. If the first parameter null then the page is used. If the second and third parameters are given, then the mouse is moved to an offset of the element’s top-left corner. Otherwise, the mouse is moved to the center of the element.');
$I->click("input[name='submit']");
$I->wait(5);
$I->amOnPage('/wp-admin/options-reading.php');
$I->fillField('#posts_per_page','5');

$I->click("input[name='submit']");


$I->amOnPage('/');
$I->see('Move mouse over the first element matched by the given locator. If the first parameter null then the page is used. If the second and third parameters are given, then the mouse is moved to an offset of the element’s top-left corner. Otherwise, the mouse is moved to the center of the element.');
$I->amOnPage('/wp-admin/options-general.php');
$I->fillField('#blogname','Theme Title Test');
$I->click("input[name='submit']");
$I->wait(5);
$I->amOnPage('/wp-admin/options-reading.php');
$I->fillField('#posts_per_page','5');
$I->click("input[name='submit']");
$I->wait(5);

$I->amOnPage('/');
$I->see('Theme Title Test');








}


}
