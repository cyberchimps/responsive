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
$I->waitForElementVisible(_customizeLayoutPage::$SinglePostSelector,20);

$I->click(_customizeLayoutPage::$SinglePostSelector);
$I->waitForElementVisible(_customizeLayoutPage::$SidebarPositionSelector,20);
$I->see(_customizeLayoutPage::$SidebarPositionText);
$I->waitForElementVisible(_customizeLayoutPage::$SidebarPositionSelector,20);

$I->click(_customizeLayoutPage::$SidebarPositionSelector);
$I->waitForText(_customizeLayoutPage::$DefaultValueText,20);
$I->see(_customizeLayoutPage::$DefaultValueText);

$I->see(_customizeLayoutPage::$RightSidebarValueText);
$I->see(_customizeLayoutPage::$LeftSidebarText);
$I->see(_customizeLayoutPage::$RightsidebarHalfpageText);
$I->see(_customizeLayoutPage::$LeftsidebarHalfpageText);
$I->see(_customizeLayoutPage::$NoSidebarText);
$I->see('Post Elements');
$I->see('Meta');
$I->see('Title');
$I->see('Content');
$I->see('Featured Image');
$I->see('Meta Elements');
$I->see('Categories');
$I->see('Author');
$I->see('Comments');
$I->see('Date');
$I->amOnPage("/block-category-common/");
$I->click('#wp-admin-bar-customize > a');
$I->waitForElementVisible(_customizeLayoutPage::$LayoutTab,20);

$I->click(_customizeLayoutPage::$LayoutTab);
$I->waitForElementVisible(_customizeLayoutPage::$ContainerSelector,20);
$I->see(_customizeLayoutPage::$ContainerText);
$I->see(_customizeLayoutPage::$FooterText);
$I->see(_customizeLayoutPage::$BlogEntriesText);
$I->see(_customizeLayoutPage::$SinglePostText);
$I->waitForElementVisible(_customizeLayoutPage::$SinglePostSelector,20);

$I->click(_customizeLayoutPage::$SinglePostSelector);
$I->waitForElementVisible(_customizeLayoutPage::$SinglePostTitleicon,10);
$I->click(_customizeLayoutPage::$SingleMetaDateIcon);
$I->click(_customizeLayoutPage::$SingleMetaAuthorIcon);
$I->click(_customizeLayoutPage::$SingleMetaCategoriesIcon);
$I->click(_customizeLayoutPage::$SingleMetaCommentsIcon);

$I->wait(10);

$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);
$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
$I->dontSee('Posted on');
$I->dontSeeInSource('author vcard');
$I->dontSee('No Comments ↓');
$I->dontSee('Posted in');





















?>
