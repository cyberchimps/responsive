<?php


require_once '_bootstrap.php';


class StaticFrontPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Site_Title_Test(AcceptanceTester $I){


$I->wantTo('Test Static front page for Home page and Post page');
$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);

$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->amOnPage('/wp-admin/options-reading.php');
$I->wait(5);
$I->click("input[name='show_on_front']");
$I->selectOption('#page_on_front','Lorem Ipsum');
$I->selectOption('#page_for_posts','Lorem Ipsum');
$I->click("input[name='submit']");
$I->wait(5);
$I->amOnPage('/');
$I->wait(5);
$I->see('LOREM IPSUM');
$I->see('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet, nisi orci ullamcorper massa, et adipiscing orci velit quis magna. Praesent sit amet ligula id orci venenatis auctor. Phasellus porttitor, metus non tincidunt dapibus, orci pede pretium neque, sit amet adipiscing ipsum lectus et libero. Aenean bibendum. Curabitur mattis quam id urna. Vivamus dui. Donec nonummy lacinia lorem. Cras risus arcu, sodales ac, ultrices ac, mollis quis, justo. Sed a libero. Quisque risus erat, posuere at, tristique non, lacinia quis, eros.');





}


}
