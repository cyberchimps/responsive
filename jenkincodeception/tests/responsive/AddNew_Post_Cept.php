<?php
require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
// $password = Data::uniqueName();



$I->wantTo('Test all filed inside theme customized home option');
// admin Login

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
$I->waitForElementVisible(_customizedHomePage::$HomepageTab,20);

?>
