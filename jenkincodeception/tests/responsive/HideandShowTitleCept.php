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
$I->waitForElementVisible(_customizeSiteIdentityPage::$SiteIdentityTab,20);
$I->click(_customizeSiteIdentityPage::$SiteIdentityTab);
//Site Title
$I->waitForElementVisible(_customizeSiteIdentityPage::$Site_Title,20);
$I->see(_customizeSiteIdentityPage::$SiteTitleText);
$I->fillField(_customizeSiteIdentityPage::$Site_Title,_customizeSiteIdentityPage::$Titlealue);
$I->waitForElementVisible(_customizeSiteIdentityPage::$TaglineFieldSelector,20);
$I->see(_customizeSiteIdentityPage::$taglineText);

$I->fillField(_customizeSiteIdentityPage::$TaglineFieldSelector,$FinalTaglinevalue);
$I->click('#_customize-input-res_hide_site_title');
$I->click('#_customize-input-res_hide_tagline');

$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);
$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
$I->dontSee(_customizeSiteIdentityPage::$Titlealue);


$I->dontSee($FinalTaglinevalue);







?>
