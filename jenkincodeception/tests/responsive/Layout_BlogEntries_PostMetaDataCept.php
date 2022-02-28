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
$I->waitForElementVisible(_customizeLayoutPage::$BlogEntriesSelector,20);

$I->click(_customizeLayoutPage::$BlogEntriesSelector);
$I->see('Default Blog Posts Index Layout');
$I->waitForElementVisible(_customizeLayoutPage::$BlogEntriesSidebar,20);

$I->click(_customizeLayoutPage::$BlogEntriesSidebar);
$I->waitForText(_customizeLayoutPage::$DefaultValueText,20);
$I->see(_customizeLayoutPage::$DefaultValueText);

$I->see(_customizeLayoutPage::$RightSidebarValueText);
$I->see(_customizeLayoutPage::$LeftSidebarText);
$I->see(_customizeLayoutPage::$RightsidebarHalfpageText);
$I->see(_customizeLayoutPage::$LeftsidebarHalfpageText);
$I->see(_customizeLayoutPage::$NoSidebarText);
$I->see(_customizeLayoutPage::$BlogcloumnText);
$I->see('Post Elements');
$I->see('Meta');
$I->see('Title');
$I->see('Content');
$I->see('Featured Image');
$I->see('Post Meta');
$I->see('Categories');
$I->see('Author');
$I->see('Comments');
$I->see('Date');
$I->click(_customizeLayoutPage::$PostMetaAuthorHideselector);
$I->click(_customizeLayoutPage::$PostMetaDateHideselector);
$I->click(_customizeLayoutPage::$PostMetaCategoryHideselector);
$I->click(_customizeLayoutPage::$PostMetaCommentsHideselector);

$I->wait(10);

$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);
$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);

$I->dontSee('Posted in');
$I->dontSee('1 Comment ↓');
$I->dontSee('Posted on');
$I->see('Template: Sticky');
$I->dontSeeInSource('author vcard');





















?>
