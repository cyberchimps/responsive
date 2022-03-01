<?php
require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
$Data = Data::uniqueName();
$FinalTaglinevalue=_customizeSiteIdentityPage::$taglineValue.$Data;


$I->wantTo('Test all filed inside Layout setting');
// admin Login

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
//Sit idenetity Tab
$I->waitForElementVisible(_customizeLayoutPage::$LayoutTab,20);

$I->click(_customizeLayoutPage::$LayoutTab);
$I->waitForElementVisible(_customizeLayoutPage::$ContainerSelector,20);
$I->see(_customizeLayoutPage::$ContainerText);
$I->see(_customizeLayoutPage::$FooterText);
$I->see(_customizeLayoutPage::$BlogEntriesText);
$I->see(_customizeLayoutPage::$SinglePostText);
$I->see(_customizeLayoutPage::$PageText);
$I->click(_customizeLayoutPage::$ContainerSelector);
$I->see(_customizeLayoutPage::$LayoutText);
$I->click(_customizeLayoutPage::$LayoutWidthSlector);
$I->waitForText(_customizeLayoutPage::$BoxedText,10);

$I->see(_customizeLayoutPage::$BoxedText);
$I->see(_customizeLayoutPage::$FullwidthText);









?>
