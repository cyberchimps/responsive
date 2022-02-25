<?php
require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
$Data = Data::uniqueName();
$FinalTaglinevalue=_customizeSiteIdentityPage::$taglineValue.$Data;


$I->wantTo('Test All functionality inside layout->page');
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
$I->waitForElementVisible(_customizeLayoutPage::$PageSelector,20);

$I->click(_customizeLayoutPage::$PageSelector);

$I->waitForElementVisible(_customizeLayoutPage::$PageTitlePostIcon,20);
$I->see('Title');
$I->see('Title');
$I->see('Featured Image');
$I->click(_customizeLayoutPage::$PageSidebarPosition);
$I->waitForText(_customizeLayoutPage::$DefaultValueText,20);
$I->see(_customizeLayoutPage::$DefaultValueText);

$I->see(_customizeLayoutPage::$RightSidebarValueText);
$I->see(_customizeLayoutPage::$LeftSidebarText);
$I->see(_customizeLayoutPage::$RightsidebarHalfpageText);
$I->see(_customizeLayoutPage::$LeftsidebarHalfpageText);
$I->see(_customizeLayoutPage::$NoSidebarText);
$I->amOnPage('/page-image-alignment/');
$I->click(_customizeLayoutPage::$customizedButton);
$I->waitForElementVisible(_customizeLayoutPage::$LayoutTab,20);

$I->click(_customizeLayoutPage::$LayoutTab);
$I->waitForElementVisible(_customizeLayoutPage::$ContainerSelector,20);
$I->click(_customizeLayoutPage::$PageSelector);
$I->waitForElementVisible(_customizeLayoutPage::$PageTitlePostIcon,20);
$I->click(_customizeLayoutPage::$PageTitlePostIcon);
$I->click(_customizeLayoutPage::$PageContentIcon);
$I->click(_customizeLayoutPage::$PageFeatureImageIcon);

$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);
$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
$I->dontSeeInSource('entry-title post-title');
$I->dontSee('Welcome to image alignment! The best way to demonstrate the ebb and flow of the various image positioning options is to nestle them snuggly among an ocean of words. Grab a paddle and let’s get started.');




















?>
