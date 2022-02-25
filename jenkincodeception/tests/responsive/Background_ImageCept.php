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
$I->waitForElementVisible(_additionalCssPage::$BackgroundImageTabSelector,20);

$I->click(_additionalCssPage::$BackgroundImageTabSelector);
$I->waitForText(_additionalCssPage::$BackgroundImage_Text,20);
$I->see(_additionalCssPage::$BackgroundImage_Text);





?>
