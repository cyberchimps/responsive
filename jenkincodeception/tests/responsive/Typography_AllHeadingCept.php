<?php
require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
$Data = Data::uniqueName();
$FinalTaglinevalue=_customizeSiteIdentityPage::$taglineValue.$Data;


$I->wantTo('Test all filed inside typography->Body');
// admin Login

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
// typography -> body Tab
$I->waitForElementVisible(_typographyBodyPage::$TypographyTabSelector,20);

$I->click(_typographyBodyPage::$TypographyTabSelector);
$I->waitForElementVisible(_typographyHeadingPage::$AllHeadingTypographySelector,20);
$I->click(_typographyHeadingPage::$AllHeadingTypographySelector);
$I->waitForElementVisible(_typographyHeadingPage::$FontStyleSelector,20);

$I->see(_typographyBodyPage::$Font_Family_Text);
$I->see(_typographyBodyPage::$Font_Weight_Text);
$I->see(_typographyBodyPage::$Font_Style_Text);
$I->see(_typographyBodyPage::$Text_Transform_Text);
$I->see(_typographyBodyPage::$Line_Height_Text);
$I->see(_typographyBodyPage::$Letter_Spacing_Text);
$I->see(_typographyBodyPage::$Font_Color_Text);
$I->click(_typographyHeadingPage::$FontStyleSelector);
$I->waitForText(_typographyBodyPage::$Normal_Font_Text,20);
$I->see(_typographyBodyPage::$Normal_Font_Text);
$I->see(_typographyBodyPage::$Italic_Font_Text);
$I->selectOption(_typographyHeadingPage::$FontStyleSelector,_typographyBodyPage::$Italic_Font_Text);
$I->wait(5);
$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(5);
$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
$I->seeInSource('Italic');














?>
