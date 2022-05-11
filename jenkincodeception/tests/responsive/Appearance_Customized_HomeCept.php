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
$I->click(_customizedHomePage::$HomepageTab);
// $I->waitForText(_customizedHomePage::$SlidedeckshortcodeText,20);
// //sortcode
// $I->see(_customizedHomePage::$SlidedeckshortcodeText);
// $I->fillField(_customizedHomePage::$SlidedeckshortcodeField,_customizedHomePage::$sortcodeName);
// headline
$I->see(_customizedHomePage::$headlineText);
$I->fillField(_customizedHomePage::$headlineFieldSelector,_customizedHomePage::$headlinName);
//SubHeadline
$I->see(_customizedHomePage::$SubheadlineText);
$I->fillField(_customizedHomePage::$SubheadlineFieldSelector,_customizedHomePage::$SubheadlinName);

//Content Area
$I->see(_customizedHomePage::$ContentAreaText);
$I->fillField(_customizedHomePage::$ContentAreaFieldSelector,_customizedHomePage::$ContentAreaName);

//Call to Action (URL)
$I->see(_customizedHomePage::$CallToActionURLText);
$I->fillField(_customizedHomePage::$CallToActionURLFieldSelector,_customizedHomePage::$CallToActionURLName);

//Call to Action (Text)

$I->see(_customizedHomePage::$CallToActionText);
$I->fillField(_customizedHomePage::$CallToActionTextFieldSelector,_customizedHomePage::$CallToActionTextName);

//Call to Action Button Style
$I->see(_customizedHomePage::$CallToActionButtonText);
// $grabValaue=$I->grabTextFrom(_customizedHomePage::$CallToActionButtonFieldSelector);
// print_r($grabValaue);
$I->selectOption(_customizedHomePage::$CallToActionButtonFieldSelector,_customizedHomePage::$CallToActionButonValue1);

$I->seeOptionIsSelected(_customizedHomePage::$CallToActionButtonFieldSelector,_customizedHomePage::$CallToActionButonValue1);
$I->selectOption(_customizedHomePage::$CallToActionButtonFieldSelector,_customizedHomePage::$CallToActionButonValue2);

$I->seeOptionIsSelected(_customizedHomePage::$CallToActionButtonFieldSelector,_customizedHomePage::$CallToActionButonValue2);

//Featured Content
$I->see(_customizedHomePage::$FeaturedContentText);
$I->fillField(_customizedHomePage::$FeaturedContentFieldSelector,_customizedHomePage::$FeaturedContentName);

//About Title
$I->see(_customizedHomePage::$AboutTitleText);
$I->fillField(_customizedHomePage::$AboutTitleFieldSelector,_customizedHomePage::$AboutTitleName);

//About Text
$I->see(_customizedHomePage::$AboutText);
$I->fillField(_customizedHomePage::$AboutTextFieldSelector,_customizedHomePage::$AboutTextName);

//Call to Action (URL) second time
$I->see(_customizedHomePage::$CallToActionURLText1);
$I->fillField(_customizedHomePage::$CallToActionURLFieldSelector1,_customizedHomePage::$CallToActionURLName1);

//Call to Action (Text) second time
$I->see(_customizedHomePage::$CallToActionText1);
$I->fillField(_customizedHomePage::$CallToActionTextFieldSelector1,_customizedHomePage::$CallToActionTextName1);

// Enable Feature Section radio
$I->see(_customizedHomePage::$EnableFeatureCheckbox);
$I->see(_customizedHomePage::$PostFeature1);
$I->see(_customizedHomePage::$PostFeature2);
$I->see(_customizedHomePage::$PostFeature3);

// Enable Testimonial Section
$I->see(_customizedHomePage::$TestimonialSection);
$I->see(_customizedHomePage::$TestimonialTitleText);
$I->fillField(_customizedHomePage::$TestimonialTitleFieldSelector,_customizedHomePage::$TestimonialTitleName);

//Enable Team Section
$I->see(_customizedHomePage::$EnableTeamSectionCheckbox);
$I->see(_customizedHomePage::$TeamMember1);
$I->see(_customizedHomePage::$TeamMember2);
$I->see(_customizedHomePage::$TeamMember3);
$I->see(_customizedHomePage::$teamTitleText);
$I->fillField(_customizedHomePage::$TeamTitleFieldselector,_customizedHomePage::$teamTitleName);

//Click to disable home page widgets
$I->see(_customizedHomePage::$DisableHomePageWidgetCheckbox);

//  Enable Contact Section

$I->see(_customizedHomePage::$EnableContactSectionCheckbox);
$I->see(_customizedHomePage::$ContactsectionTitleText);
$I->fillField(_customizedHomePage::$ContactsectionTitleFieldSelector,_customizedHomePage::$ContactsectionTitleName);
$I->see(_customizedHomePage::$ContactsectionSUBTitleText);
$I->fillField(_customizedHomePage::$ContactsectionSUBTitleFieldSelector,_customizedHomePage::$ContactsectionSUBTitleName);

$I->see(_customizedHomePage::$AddressText);
$I->fillField(_customizedHomePage::$AddressFieldSelector,_customizedHomePage::$AddressFieldName);

$I->see(_customizedHomePage::$AddressText);
$I->fillField(_customizedHomePage::$AddressFieldSelector,_customizedHomePage::$AddressFieldName);

$I->see(_customizedHomePage::$EmailText);
$I->fillField(_customizedHomePage::$EmailFieldSelector,_customizedHomePage::$EmailFieldName);

$I->see(_customizedHomePage::$PhoneText);
$I->fillField(_customizedHomePage::$PhoneFieldSelector,_customizedHomePage::$PhoneFieldName);

$I->see(_customizedHomePage::$ContactformshortcodeText);
$I->fillField(_customizedHomePage::$ContactSortcodeFieldselector,_customizedHomePage::$ContactSortcodeName);

//Publish Button
$I->click(_customizedHomePage::$PublishButton);
?>
