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
$I->waitForElementVisible(_typographyHeadingPage::$LinkTypographySelector,20);
$I->click(_typographyHeadingPage::$LinkTypographySelector);
$I->waitForText(_typographyHeadingPage::$LinkColor_Text,20);
$I->see(_typographyHeadingPage::$LinkColor_Text);

$I->see(_typographyHeadingPage::$Link_Hover_Text);
$I->click(_typographyHeadingPage::$SelectLinkColorSelector);
$I->click(_typographyHeadingPage::$SelectLinkHoverColorSelector);



?>
