<?php
use \Codeception\Util\Locator;


require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);

$I->wantTo('Test all filed inside Layout setting');
// admin Login


$re = '/rgb(a|)\(\s{0,1}(\d+)\s{0,1}\,\s{0,1}(\d+)\s{0,1}\,\s{0,1}(\d+)\)/m';

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
$I->waitForElementVisible('#accordion-panel-panel-colors-background > h3',20);
$I->click('#accordion-panel-panel-colors-background > h3');
$I->waitForElementVisible('#accordion-section-section-colors-body > h3',20);
$I->click('#accordion-section-section-colors-body > h3');
$I->waitForElementVisible('#customize-control-astra-settings-link-color > div > div > button > span.wp-color-result-text',20);
$I->click('#customize-control-astra-settings-link-color > div > div > button > span.wp-color-result-text');
$I->fillField('#customize-control-astra-settings-link-color > div > div > span > label > input','#dd3333');
$I->click('#customize-control-astra-settings-text-color > div > div > button > span.wp-color-result-text');
$I->wait(4);
$I->fillField('#customize-control-astra-settings-text-color > div > div > span > label > input','#8224e3');
$I->click('#customize-control-astra-settings-site-layout-outside-bg-obj > div > div.background-color > div > button > span.wp-color-result-text');
$I->fillField('#customize-control-astra-settings-site-layout-outside-bg-obj > div > div.background-color > div > span > label > input','#eeee22');

// $I->click('#customize-control-astra-settings-site-layout-outside-bg-obj > div > div.background-image > div > div.actions > button.button.background-image-upload-button');
// $I->wait(5);
//
// $I->attachFile("input[type='file']", 'Pixel.png');
// $I->wait(10);
// $I->click("//button[@class='button media-button button-primary button-large media-button-select']");
// $I->wait(10);





// $I->click(_customizedHomePage::$PublishButton);
// $I->wait(10);

$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);

$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
//Link Color
$linkcolor = $I->executeJS("return jQuery('#menu-item-1769 > a').css('color');");
preg_match_all($re, $linkcolor, $matches, PREG_SET_ORDER, 0);

$d1= sprintf("#%02x%02x%02x", $matches[0][2], $matches[0][3], $matches[0][4]);


// Print the entire match result
var_dump($d1);
//Text Color
$textcolor = $I->executeJS("return jQuery('#recent-posts-2 > h2').css('color');");
var_dump($textcolor);
preg_match_all($re, $textcolor, $text, PREG_SET_ORDER, 0);
var_dump($text);

$text1= sprintf("#%02x%02x%02x", $text[0][2], $text[0][3], $text[0][4]);
echo "text color $text1";
// background images

// $backgroundimage = $I->executeJS("return jQuery('body').css('background-image');");
// echo "back ground image $backgroundimage";

// $I->seeInSource('/wp-content/uploads/');
$I->dontSeeInSource('/wp-content/uploads/');
// preg_match_all($re, $backgroundimage, $text, PREG_SET_ORDER, 0);
//
// $text1= sprintf("#%02x%02x%02x", $backgroundimage[0][2], $backgroundimage[0][3], $backgroundimage[0][4]);




// background color
$contentcolor = $I->executeJS("return jQuery('body').css('background-color');");
preg_match_all($re, $contentcolor, $text, PREG_SET_ORDER, 0);

$contentcolor1= sprintf("#%02x%02x%02x", $text[0][2], $text[0][3], $text[0][4]);
echo "background color $contentcolor1";


// Print the entire match result


$I->switchToIFrame();

$I->assertEquals($d1,'#dd3333', "Link color should be match");
$I->assertEquals($text1,'#8224e3', "Text color should be match");
$I->assertEquals($contentcolor1,'#eeee22', "background  color should be match");










?>
