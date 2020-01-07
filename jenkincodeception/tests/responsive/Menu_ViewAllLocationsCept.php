<?php
require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
// $Data = Data::uniqueName();


$I->wantTo('Test background image  setting');
// admin Login

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
//Sit idenetity Tab
$I->waitForElementVisible(_menuPage::$ManuTabSelector,20);

$I->click(_menuPage::$ManuTabSelector);
$I->waitForElementVisible(_menuPage::$ViewAllLocationsSelector,20);
$I->click(_menuPage::$ViewAllLocationsSelector);
$I->see(_menuPage::$Top_MenuText);
$I->see(_menuPage::$Header_MenuText);
$I->see(_menuPage::$Sub_HeaderMenuText);
$I->see(_menuPage::$Footer_MenuText);
$I->see(_menuPage::$CreateNewMenuButton);
$I->selectOption(_menuPage::$HeaderMenuSelector,'Short');
$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);
$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
$I->see('Home');
$I->see('a Blog page');


// $I->switchToIFrame();
//
// $I->click(_customizeSiteIdentityPage::$SidebarIcon);
//
// $I->waitForElementVisible(_customizedHomePage::$PublishButton,20);
//
// $I->click(_customizedHomePage::$PublishButton);
// $I->wait(10);
// $I->openNewTab();
// $I->amOnPage('/');
// $I->waitForText('a Blog page',20);








?>
