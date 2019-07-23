<?php
require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
// $Data = Data::uniqueName();


$I->wantTo('Test all filed inside Additional css setting');
// admin Login

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
//Sit idenetity Tab
$I->waitForElementVisible(_additionalCssPage::$AdditoanCssTab,20);

$I->click(_additionalCssPage::$AdditoanCssTab);

$I->waitForElementVisible(_additionalCssPage::$CodeMirrorfieldSelector,20);
$I->click(_additionalCssPage::$CodeMirrorfieldSelector);
$I->moveMouseOver(_additionalCssPage::$CodeMirrorfieldSelector);

$I->wait(10);

$I->fillField(_additionalCssPage::$CodeMirrorfieldSelector,'heloo');
$I->wait(10);




?>
